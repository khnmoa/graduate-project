<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PayloadSeeder extends Seeder
{
    public function run()
    {
        DB::table('payloads')->insert([
            ['telemetry_id' => 1, 'memory_size' => 256, 'compression_ratio' => 1, 'compression_ratio_value' => 2.3, 'payload_type' => 'Panchromatic', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 2, 'memory_size' => 300, 'compression_ratio' => 0, 'compression_ratio_value' => 0, 'payload_type' => 'Infrared', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 3, 'memory_size' => 350, 'compression_ratio' => 1, 'compression_ratio_value' => 3.5, 'payload_type' => 'Multispectrum', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 4, 'memory_size' => 512, 'compression_ratio' => 0, 'compression_ratio_value' => 0, 'payload_type' => 'Panchromatic', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 5, 'memory_size' => 256, 'compression_ratio' => 1, 'compression_ratio_value' => 2.2, 'payload_type' => 'Infrared', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 6, 'memory_size' => 300, 'compression_ratio' => 0, 'compression_ratio_value' => 0, 'payload_type' => 'Multispectrum', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 7, 'memory_size' => 350, 'compression_ratio' => 1, 'compression_ratio_value' => 3.0, 'payload_type' => 'Panchromatic', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 8, 'memory_size' => 400, 'compression_ratio' => 0, 'compression_ratio_value' => 0, 'payload_type' => 'Infrared', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 9, 'memory_size' => 512, 'compression_ratio' => 1, 'compression_ratio_value' => 4.1, 'payload_type' => 'Multispectrum', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 10, 'memory_size' => 256, 'compression_ratio' => 0, 'compression_ratio_value' => 0, 'payload_type' => 'Panchromatic', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 11, 'memory_size' => 300, 'compression_ratio' => 1, 'compression_ratio_value' => 2.1, 'payload_type' => 'Infrared', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 12, 'memory_size' => 350, 'compression_ratio' => 0, 'compression_ratio_value' => 0, 'payload_type' => 'Multispectrum', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 13, 'memory_size' => 400, 'compression_ratio' => 1, 'compression_ratio_value' => 3.2, 'payload_type' => 'Panchromatic', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 14, 'memory_size' => 512, 'compression_ratio' => 0, 'compression_ratio_value' => 0, 'payload_type' => 'Infrared', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 15, 'memory_size' => 256, 'compression_ratio' => 1, 'compression_ratio_value' => 2.5, 'payload_type' => 'Multispectrum', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 16, 'memory_size' => 300, 'compression_ratio' => 0, 'compression_ratio_value' => 0, 'payload_type' => 'Panchromatic', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 17, 'memory_size' => 350, 'compression_ratio' => 1, 'compression_ratio_value' => 3.6, 'payload_type' => 'Infrared', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 18, 'memory_size' => 400, 'compression_ratio' => 0, 'compression_ratio_value' => 0, 'payload_type' => 'Multispectrum', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 19, 'memory_size' => 512, 'compression_ratio' => 1, 'compression_ratio_value' => 4.0, 'payload_type' => 'Panchromatic', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 20, 'memory_size' => 256, 'compression_ratio' => 0, 'compression_ratio_value' => 0, 'payload_type' => 'Infrared', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 21, 'memory_size' => 300, 'compression_ratio' => 1, 'compression_ratio_value' => 2.7, 'payload_type' => 'Multispectrum', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 22, 'memory_size' => 350, 'compression_ratio' => 0, 'compression_ratio_value' => 0, 'payload_type' => 'Panchromatic', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 23, 'memory_size' => 400, 'compression_ratio' => 1, 'compression_ratio_value' => 3.3, 'payload_type' => 'Infrared', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 24, 'memory_size' => 512, 'compression_ratio' => 0, 'compression_ratio_value' => 0, 'payload_type' => 'Multispectrum', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 25, 'memory_size' => 256, 'compression_ratio' => 1, 'compression_ratio_value' => 2.9, 'payload_type' => 'Panchromatic', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 26, 'memory_size' => 300, 'compression_ratio' => 0, 'compression_ratio_value' => 0, 'payload_type' => 'Infrared', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 27, 'memory_size' => 350, 'compression_ratio' => 1, 'compression_ratio_value' => 3.1, 'payload_type' => 'Multispectrum', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 28, 'memory_size' => 400, 'compression_ratio' => 0, 'compression_ratio_value' => 0, 'payload_type' => 'Panchromatic', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 29, 'memory_size' => 512, 'compression_ratio' => 1, 'compression_ratio_value' => 4.2, 'payload_type' => 'Infrared', 'subsystem_name' => 'Payload'],
            ['telemetry_id' => 30, 'memory_size' => 256, 'compression_ratio' => 0, 'compression_ratio_value' => 0, 'payload_type' => 'Multispectrum', 'subsystem_name' => 'Payload'],
                ['telemetry_id' => 31, 'memory_size' => 256, 'compression_ratio' => 1, 'compression_ratio_value' => 2.4, 'payload_type' => 'Panchromatic', 'subsystem_name' => 'Payload'],
                ['telemetry_id' => 32, 'memory_size' => 300, 'compression_ratio' => 0, 'compression_ratio_value' => 0, 'payload_type' => 'Infrared', 'subsystem_name' => 'Payload'],
                ['telemetry_id' => 33, 'memory_size' => 350, 'compression_ratio' => 1, 'compression_ratio_value' => 3.7, 'payload_type' => 'Multispectrum', 'subsystem_name' => 'Payload'],
                ['telemetry_id' => 34, 'memory_size' => 512, 'compression_ratio' => 0, 'compression_ratio_value' => 0, 'payload_type' => 'Panchromatic', 'subsystem_name' => 'Payload'],
                ['telemetry_id' => 35, 'memory_size' => 256, 'compression_ratio' => 1, 'compression_ratio_value' => 2.6, 'payload_type' => 'Infrared', 'subsystem_name' => 'Payload'],
                ['telemetry_id' => 36, 'memory_size' => 300, 'compression_ratio' => 0, 'compression_ratio_value' => 0, 'payload_type' => 'Multispectrum', 'subsystem_name' => 'Payload'],
                ['telemetry_id' => 37, 'memory_size' => 350, 'compression_ratio' => 1, 'compression_ratio_value' => 3.8, 'payload_type' => 'Panchromatic', 'subsystem_name' => 'Payload'],
                ['telemetry_id' => 38, 'memory_size' => 400, 'compression_ratio' => 0, 'compression_ratio_value' => 0, 'payload_type' => 'Infrared', 'subsystem_name' => 'Payload'],
                ['telemetry_id' => 39, 'memory_size' => 512, 'compression_ratio' => 1, 'compression_ratio_value' => 4.3, 'payload_type' => 'Multispectrum', 'subsystem_name' => 'Payload'],
                ['telemetry_id' => 40, 'memory_size' => 256, 'compression_ratio' => 0, 'compression_ratio_value' => 0, 'payload_type' => 'Panchromatic', 'subsystem_name' => 'Payload'],
         
        ]);
    }
}