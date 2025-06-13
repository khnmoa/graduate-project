<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // نستخدم UserSeeder عشان نضيف بيانات المستخدمين
        $this->call([
            UserSeeder::class,
            SubsystemSeeder::class,
            // نستخدم TelemetrySeeder عشان نضيف بيانات التليمتري
            TelemetrySeeder::class,
            ThermalSeeder::class,
            PowerSeeder::class,
            PayloadSeeder::class,
            communicationSeeder::class,
        ]);
    }
}
