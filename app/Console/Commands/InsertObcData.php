<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Obc;
use Carbon\Carbon;

class InsertObcData extends Command
{
    protected $signature = 'insert:obc-data';
    protected $description = 'Insert 5 random rows into obcs table';

    public function handle()
    {
        for ($i = 0; $i < 5; $i++) {
            $powerId = rand(1, 40);
            $telemetryId = rand(1, 77);
            $communicationsId = rand(1, 20);
            Obc::create([
                'power_id' => $powerId,
                'telemetry_id' => $telemetryId,
                'communications_id' => $communicationsId,
                'time' => Carbon::now(),
                'cpu_usage' => rand(10, 100) / 1.0,
                'memory_usage' => rand(10, 100) / 1.0,
                'cpu_temperature' => rand(20, 80) / 1.0,
                'memory_temperature' => rand(20, 80) / 1.0,
                'uptime' => rand(1000, 90000),
                'error_logs' => 'No errors',
                'firmware_version' => 'v'.rand(1, 10).'.'.rand(0, 9),
                'operating_mode' => collect(['Safe', 'Normal', 'Critical'])->random(),
                'subsystem_name' => 'obc',
            ]);
        }

        $this->info('5 new rows inserted successfully in obcs table!');
    }
}
