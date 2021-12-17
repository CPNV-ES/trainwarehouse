<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++)
        {
            \DB::table('trains')->insert([
                'manufacturer' => \Str::random(10),
                'constructed' => date("Y-m-d H:i:s", mt_rand(1262055681,1262055681)),
                'start_service' => date("Y-m-d H:i:s", mt_rand(1262055681,1262055681)),
                'end_service' => date("Y-m-d H:i:s", mt_rand(1262055681,1262055681)),
                'car' => rand(1, 5),
                'capacity' => rand(1, 200),
                'capacity_first' => rand(1, 200),
                'capacity_second' => rand(1, 200),
                'name' => \Str::random(10),
                'length_m' => rand(1, 200),
                'width_mm' => rand(1, 200),
                'height_mm' => rand(1, 200),
                'max_speed' => rand(1, 200),
                'weight_t' => rand(1, 200),
                'power_output_ac' => rand(1, 200),
                'power_output_dc' => rand(1, 200),
                'tractive_force' => rand(1, 200),
                'uic_classification' => \Str::random(10),
                'track_gauge_mm' => rand(1, 200),
            ]);
        }
    }
}
