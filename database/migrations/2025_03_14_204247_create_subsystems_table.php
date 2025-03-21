<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subsystems', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // ربط العلاقات مع الجداول الفرعية لكل جزء من النظام
            $table->foreignId('communication_id')->nullable()->constrained('communications')->onDelete('cascade');
            $table->foreignId('obc_id')->nullable()->constrained('obcs')->onDelete('cascade');
            $table->foreignId('power_id')->nullable()->constrained('powers')->onDelete('cascade');
            $table->foreignId('gps_id')->nullable()->constrained('gps')->onDelete('cascade');
            $table->foreignId('control_id')->nullable()->constrained('controls')->onDelete('cascade');
            $table->foreignId('payload_id')->nullable()->constrained('payloads')->onDelete('cascade');
            $table->foreignId('thermal_id')->nullable()->constrained('thermals')->onDelete('cascade');
            $table->foreignId('telemetry_id')->nullable()->constrained('telemetries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subsystems');
    }
};
