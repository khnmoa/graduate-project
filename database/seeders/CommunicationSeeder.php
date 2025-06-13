<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommunicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('communications')->insert([
    [
        'telemetry_id' => rand(1, 77), // رقم عشوائي من 1 إلى 77
        'time' => now(),
        'signal_strength' => -52.4,
        'data_rate' => 210.5,
        'latency' => 15.6,
        'status' => 'Active',
        'subsystem_name' => 'communication',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'telemetry_id' => rand(1, 77),
        'time' => now(),
        'signal_strength' => -63.1,
        'data_rate' => 220.8,
        'latency' => 18.2,
        'status' => 'Interrupted',
        'subsystem_name' => 'communication',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'telemetry_id' => rand(1, 77),
        'time' => now(),
        'signal_strength' => -49.8,
        'data_rate' => 265.7,
        'latency' => 13.4,
        'status' => 'Failed',
        'subsystem_name' => 'communication',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'telemetry_id' => rand(1, 77),
        'time' => now(),
        'signal_strength' => -55.9,
        'data_rate' => 275.3,
        'latency' => 12.8,
        'status' => 'Active',
        'subsystem_name' => 'communication',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'telemetry_id' => rand(1, 77),
        'time' => now(),
        'signal_strength' => -48.5,
        'data_rate' => 285.6,
        'latency' => 10.5,
        'status' => 'Interrupted',
        'subsystem_name' => 'communication',
        'created_at' => now(),
        'updated_at' => now()
    ],
     [
        'telemetry_id' => rand(1, 77), // رقم عشوائي من 1 إلى 77
        'time' => now(),
        'signal_strength' => -47.2,
        'data_rate' => 260.8,
        'latency' => 16.1,
        'status' => 'Active',
        'subsystem_name' => 'communication',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'telemetry_id' => rand(1, 77),
        'time' => now(),
        'signal_strength' => -62.8,
        'data_rate' => 210.3,
        'latency' => 14.5,
        'status' => 'Interrupted',
        'subsystem_name' => 'communication',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'telemetry_id' => rand(1, 77),
        'time' => now(),
        'signal_strength' => -54.6,
        'data_rate' => 245.7,
        'latency' => 12.3,
        'status' => 'Failed',
        'subsystem_name' => 'communication',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'telemetry_id' => rand(1, 77),
        'time' => now(),
        'signal_strength' => -51.9,
        'data_rate' => 280.2,
        'latency' => 11.7,
        'status' => 'Active',
        'subsystem_name' => 'communication',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'telemetry_id' => rand(1, 77),
        'time' => now(),
        'signal_strength' => -53.5,
        'data_rate' => 255.9,
        'latency' => 10.8,
        'status' => 'Interrupted',
        'subsystem_name' => 'communication',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'telemetry_id' => rand(1, 77),
        'time' => now(),
        'signal_strength' => -50.1,
        'data_rate' => 230.4,
        'latency' => 13.9,
        'status' => 'Active',
        'subsystem_name' => 'communication',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'telemetry_id' => rand(1, 77),
        'time' => now(),
        'signal_strength' => -60.7,
        'data_rate' => 215.6,
        'latency' => 15.2,
        'status' => 'Interrupted',
        'subsystem_name' => 'communication',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'telemetry_id' => rand(1, 77),
        'time' => now(),
        'signal_strength' => -58.3,
        'data_rate' => 240.0,
        'latency' => 14.0,
        'status' => 'Failed',
        'subsystem_name' => 'communication',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'telemetry_id' => rand(1, 77),
        'time' => now(),
        'signal_strength' => -49.7,
        'data_rate' => 270.1,
        'latency' => 12.5,
        'status' => 'Active',
        'subsystem_name' => 'communication',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'telemetry_id' => rand(1, 77),
        'time' => now(),
        'signal_strength' => -52.9,
        'data_rate' => 260.7,
        'latency' => 11.3,
        'status' => 'Interrupted',
        'subsystem_name' => 'communication',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'telemetry_id' => rand(1, 77),
        'time' => now(),
        'signal_strength' => -55.4,
        'data_rate' => 250.3,
        'latency' => 13.2,
        'status' => 'Active',
        'subsystem_name' => 'communication',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'telemetry_id' => rand(1, 77),
        'time' => now(),
        'signal_strength' => -61.8,
        'data_rate' => 220.5,
        'latency' => 15.6,
        'status' => 'Failed',
        'subsystem_name' => 'communication',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'telemetry_id' => rand(1, 77),
        'time' => now(),
        'signal_strength' => -59.2,
        'data_rate' => 235.0,
        'latency' => 14.8,
        'status' => 'Interrupted',
        'subsystem_name' => 'communication',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'telemetry_id' => rand(1, 77),
        'time' => now(),
        'signal_strength' => -48.9,
        'data_rate' => 265.4,
        'latency' => 12.0,
        'status' => 'Active',
        'subsystem_name' => 'communication',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'telemetry_id' => rand(1, 77),
        'time' => now(),
        'signal_strength' => -53.7,
        'data_rate' => 258.1,
        'latency' => 11.5,
        'status' => 'Interrupted',
        'subsystem_name' => 'communication',
        'created_at' => now(),
        'updated_at' => now()
    ]

        ]);
    }
}

