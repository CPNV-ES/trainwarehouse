<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExportDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:export';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export SQL dump of database with data to a service';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return string
     */
    public function handle()
    {
        $config = [
            'host' => env('DB_HOST'),
            'port' => env('DB_PORT'),
            'user' => 'root',
            'password' => env('DB_PASSWORD'),
            'result-file' => storage_path('database/backup/'. date('Y-m-d_H-i-s') . '_' . time() . '.sql'),
        ];

        $this->info('Exporting database...');
        
        $params = '';

        foreach($config as $key=>$param) {
            $params .= ' --' . $key . ($key==='password' ? '='  : ' ' ) . $param;
        }
        
        shell_exec('mysqldump ' . env('DB_DATABASE')  . $params);

        if(file_exists($config['result-file'])) {
            $this->info('Database exported successfully!');
            return 'File as been exported';
        } else {
            $this->error('Database export failed!');
            return false;
        }
    }
}
