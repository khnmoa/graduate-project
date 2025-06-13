<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Gps;
use Carbon\Carbon;

class UpdateGpsData extends Command
{
    protected $signature = 'update:gps-data';
    protected $description = 'Update GPS data in the database';

    public function handle()
    {
        for ($i = 1; $i <= 5; $i++) {
            $telemetryId = rand(1, 77);

            $gps = Gps::create([
                'telemetry_id' => $telemetryId,
                'latitude' => fake()->latitude(),
                'longitude' => fake()->longitude(),
                'altitude' => rand(100, 1000),
                'velocity' => rand(10, 200),
                'time' => Carbon::now(),
                'subsystem_name' => 'gps',
            ]);
        }

        $this->info("enter a 5 new rows");
    }
}