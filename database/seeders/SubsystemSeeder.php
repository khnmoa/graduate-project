<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubsystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subsystems')->insert([
            ['name' => 'Telemetry'],
            ['name' => 'Payload'],
            ['name' => 'Control'],
            ['name' => 'Communication'],
            ['name' => 'Propagation'],
            ['name' => 'OBC'],
            ['name' => 'Power'],
            ['name' => 'GPS'],
            ['name' => 'Thermal'],
        ]);
    }
}