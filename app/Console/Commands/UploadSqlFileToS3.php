<?php

namespace App\Console\Commands;

use http\Exception\InvalidArgumentException;
use Illuminate\Console\Command;
use Aws\S3\S3Client;
use mysql_xdevapi\Exception;
use function PHPUnit\Framework\fileExists;

class UploadSqlFileToS3 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upload:s3 {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload an SQL file to S3';

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
     * @return int
     */
    public function handle()
    {
        $client = new S3Client([
            'region' => env('AWS_DEFAULT_REGION'),
            'version' => 'latest',
            'http' => [
                'verify' => false
            ],
            'credentials' => [
                'key' => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ]
        ]);

        $filePath = $this->argument('file');

        try
        {
            if(!file_exists($filePath)) {
                throw new InvalidArgumentException('File not found');
            }

            $client->putObject([
                'Bucket' => env('AWS_BUCKET'),
                'Key'    => basename($filePath),
                'SourceFile' => $filePath,
            ]);

            $this->info('File has been uploaded');
        }
        catch (\InvalidArgumentException $e)
        {
            $this->error($e->getMessage());
        }
    }
}
