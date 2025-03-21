<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        $tables = ['communications', 'obcs', 'powers', 'gps', 'controls', 'payloads', 'thermals', 'telemetries'];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->string('subsystem_name')->nullable();
            });
        }
    }

    public function down(): void
    {
        $tables = ['communications', 'obcs', 'powers', 'gps', 'controls', 'payloads', 'thermals', 'telemetries'];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropColumn('subsystem_name');
            });
        }
    }
};
