<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Power;

class PowerSeeder extends Seeder
{
    public function run()
    {
        // قائمة البيانات للإدخال
        $entries = [
            ['telemetry_id' => 1, 'user_id' => 5, 'Battery_voltage' => 12.1, 'Battery_level' => 78, 'Time_at' => '2025-03-20 10:00:00'],
            ['telemetry_id' => 2, 'user_id' => 12, 'Battery_voltage' => 11.8, 'Battery_level' => 72, 'Time_at' => '2025-03-20 12:00:00'],
            ['telemetry_id' => 3, 'user_id' => 7, 'Battery_voltage' => 12.3, 'Battery_level' => 85, 'Time_at' => '2025-03-21 08:30:00'],
            ['telemetry_id' => 4, 'user_id' => 3, 'Battery_voltage' => 12.0, 'Battery_level' => 75, 'Time_at' => '2025-03-21 09:00:00'],
            ['telemetry_id' => 5, 'user_id' => 2, 'Battery_voltage' => 11.9, 'Battery_level' => 80, 'Time_at' => '2025-03-21 10:00:00'],
            ['telemetry_id' => 6, 'user_id' => 9, 'Battery_voltage' => 12.4, 'Battery_level' => 70, 'Time_at' => '2025-03-21 11:00:00'],
            ['telemetry_id' => 7, 'user_id' => 6, 'Battery_voltage' => 12.2, 'Battery_level' => 90, 'Time_at' => '2025-03-21 12:00:00'],
            ['telemetry_id' => 8, 'user_id' => 10, 'Battery_voltage' => 11.7, 'Battery_level' => 65, 'Time_at' => '2025-03-22 10:30:00'],
            ['telemetry_id' => 9, 'user_id' => 11, 'Battery_voltage' => 12.6, 'Battery_level' => 85, 'Time_at' => '2025-03-22 11:30:00'],
            ['telemetry_id' => 10, 'user_id' => 8, 'Battery_voltage' => 12.5, 'Battery_level' => 88, 'Time_at' => '2025-03-22 12:30:00'],
            ['telemetry_id' => 11, 'user_id' => 4, 'Battery_voltage' => 11.6, 'Battery_level' => 78, 'Time_at' => '2025-03-22 13:30:00'],
            ['telemetry_id' => 12, 'user_id' => 1, 'Battery_voltage' => 12.7, 'Battery_level' => 92, 'Time_at' => '2025-03-23 09:00:00'],
            ['telemetry_id' => 13, 'user_id' => 13, 'Battery_voltage' => 12.3, 'Battery_level' => 82, 'Time_at' => '2025-03-23 10:00:00'],
            ['telemetry_id' => 14, 'user_id' => 14, 'Battery_voltage' => 11.5, 'Battery_level' => 70, 'Time_at' => '2025-03-23 11:00:00'],
            ['telemetry_id' => 15, 'user_id' => 15, 'Battery_voltage' => 12.4, 'Battery_level' => 74, 'Time_at' => '2025-03-23 12:00:00'],
            ['telemetry_id' => 16, 'user_id' => 16, 'Battery_voltage' => 12.0, 'Battery_level' => 60, 'Time_at' => '2025-03-23 13:00:00'],
            ['telemetry_id' => 17, 'user_id' => 17, 'Battery_voltage' => 11.8, 'Battery_level' => 65, 'Time_at' => '2025-03-24 08:30:00'],
            ['telemetry_id' => 18, 'user_id' => 18, 'Battery_voltage' => 12.5, 'Battery_level' => 80, 'Time_at' => '2025-03-24 09:30:00'],
            ['telemetry_id' => 19, 'user_id' => 19, 'Battery_voltage' => 11.7, 'Battery_level' => 85, 'Time_at' => '2025-03-24 10:30:00'],
            ['telemetry_id' => 20, 'user_id' => 20, 'Battery_voltage' => 12.2, 'Battery_level' => 88, 'Time_at' => '2025-03-24 11:30:00'],
            ['telemetry_id' => 21, 'user_id' => 21, 'Battery_voltage' => 12.1, 'Battery_level' => 75, 'Time_at' => '2025-03-24 12:30:00'],
            ['telemetry_id' => 22, 'user_id' => 22, 'Battery_voltage' => 12.6, 'Battery_level' => 92, 'Time_at' => '2025-03-25 09:00:00'],
            ['telemetry_id' => 23, 'user_id' => 23, 'Battery_voltage' => 12.3, 'Battery_level' => 90, 'Time_at' => '2025-03-25 10:00:00'],
            ['telemetry_id' => 24, 'user_id' => 24, 'Battery_voltage' => 12.7, 'Battery_level' => 80, 'Time_at' => '2025-03-25 11:00:00'],
            ['telemetry_id' => 25, 'user_id' => 25, 'Battery_voltage' => 12.4, 'Battery_level' => 65, 'Time_at' => '2025-03-25 12:00:00'],
            ['telemetry_id' => 26, 'user_id' => 26, 'Battery_voltage' => 12.0, 'Battery_level' => 70, 'Time_at' => '2025-03-25 13:00:00'],
            ['telemetry_id' => 27, 'user_id' => 27, 'Battery_voltage' => 11.9, 'Battery_level' => 72, 'Time_at' => '2025-03-26 08:00:00'],
            ['telemetry_id' => 28, 'user_id' => 28, 'Battery_voltage' => 12.3, 'Battery_level' => 82, 'Time_at' => '2025-03-26 09:00:00'],
            ['telemetry_id' => 29, 'user_id' => 29, 'Battery_voltage' => 12.1, 'Battery_level' => 78, 'Time_at' => '2025-03-26 10:00:00'],
            ['telemetry_id' => 30, 'user_id' => 30, 'Battery_voltage' => 11.8, 'Battery_level' => 85, 'Time_at' => '2025-03-26 11:00:00'],
            ['telemetry_id' => 31, 'user_id' => 31, 'Battery_voltage' => 12.5, 'Battery_level' => 88, 'Time_at' => '2025-03-26 12:00:00'],
            ['telemetry_id' => 32, 'user_id' => 32, 'Battery_voltage' => 12.2, 'Battery_level' => 74, 'Time_at' => '2025-03-27 09:00:00'],
            ['telemetry_id' => 33, 'user_id' => 33, 'Battery_voltage' => 12.4, 'Battery_level' => 80, 'Time_at' => '2025-03-27 10:00:00'],
            ['telemetry_id' => 34, 'user_id' => 34, 'Battery_voltage' => 12.6, 'Battery_level' => 75, 'Time_at' => '2025-03-27 11:00:00'],
            ['telemetry_id' => 35, 'user_id' => 35, 'Battery_voltage' => 11.9, 'Battery_level' => 90, 'Time_at' => '2025-03-27 12:00:00'],
            ['telemetry_id' => 36, 'user_id' => 36, 'Battery_voltage' => 12.3, 'Battery_level' => 88, 'Time_at' => '2025-03-27 13:00:00'],
            ['telemetry_id' => 37, 'user_id' => 37, 'Battery_voltage' => 12.0, 'Battery_level' => 82, 'Time_at' => '2025-03-28 08:00:00'],
            ['telemetry_id' => 38, 'user_id' => 38, 'Battery_voltage' => 12.7, 'Battery_level' => 85, 'Time_at' => '2025-03-28 09:00:00'],
            ['telemetry_id' => 39, 'user_id' => 39, 'Battery_voltage' => 12.2, 'Battery_level' => 75, 'Time_at' => '2025-03-28 10:00:00'],
            ['telemetry_id' => 40, 'user_id' => 40, 'Battery_voltage' => 11.8, 'Battery_level' => 70, 'Time_at' => '2025-03-28 11:00:00'],
        ];

        foreach ($entries as $entry) {
            // التأكد من وجود المستخدم
            $user = User::find($entry['user_id']);

            if ($user) {
                // إدخال البيانات في جدول Power
                Power::create([
                    'telemetry_id' => $entry['telemetry_id'],
                    'user_id' => $user->id,
                    'users_name' => $user->name, // يمكنك استخدام users_name من الـ User
                    'Battery_voltage' => $entry['Battery_voltage'],
                    'Battery_level' => $entry['Battery_level'],
                    'Time_at' => $entry['Time_at'],
                    'subsystem_name' => 'power',
                ]);
            }
        }
    }
}