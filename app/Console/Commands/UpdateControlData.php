<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Control; 
use Carbon\Carbon;

class UpdateControlData extends Command
{
    protected $signature = 'update:control-data';
    protected $description = 'Insert control data every minute';

    public function handle()
    {
        for ($i = 1; $i <= 5; $i++) {
            $telemetryId = rand(1, 77);


            Control::create([
                'telemetry_id' => $telemetryId,
                'gyroscope_x' => rand(-1000, 1000) / 10,
                'gyroscope_y' => rand(-1000, 1000) / 10,
                'gyroscope_z' => rand(-1000, 1000) / 10,
                'magnetometer_x' => rand(-1000, 1000) / 10,
                'magnetometer_y' => rand(-1000, 1000) / 10,
                'magnetometer_z' => rand(-1000, 1000) / 10,
                'system_status' => collect(['Active', 'Standby', 'Error'])->random(),
                'control_mode' => collect(['Manual', 'Automatic', 'Hybrid'])->random(),
                'time' => Carbon::now(),
                'subsystem_name' => 'control',
            ]);
        }

        $this->info("5 new rows inserted successfully!");
    }
}

