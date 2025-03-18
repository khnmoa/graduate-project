<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * This function creates the 'obc' table with the required columns.
     */
    public function up(): void
    {
        Schema::create('obc', function (Blueprint $table) {
            $table->id(); // Primary key (Auto-incrementing ID)

            $table->timestamp('time')->useCurrent(); // Records the current timestamp automatically

            // Performance data
            $table->float('cpu_usage'); // CPU usage percentage
            $table->float('memory_usage'); // Memory usage percentage
            $table->float('cpu_temperature')->nullable(); // CPU temperature in °C (nullable)
            $table->float('memory_temperature')->nullable(); // RAM temperature in °C (nullable)
            $table->integer('uptime')->nullable(); // Time since last reboot (in seconds)

            // Error logs
            $table->string('error_logs')->nullable(); // Stores error logs as a string (nullable)

            // System metadata
            $table->string('firmware_version')->nullable(); // Current firmware version (nullable)
            $table->string('operating_mode')->nullable(); // Current operating mode (Idle, Active, Sleep Mode) (nullable)

            $table->timestamps(); // Automatically creates 'created_at' and 'updated_at' timestamps
        });
    }

    /**
     * Reverse the migrations.
     * This function deletes the 'obc' table when rolling back the migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('obc'); // Deletes the 'obc' table if it exists
    }
};