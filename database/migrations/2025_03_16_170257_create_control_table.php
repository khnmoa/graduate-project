<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('control', function (Blueprint $table) {
            $table->id(); // Primary key
            
            // Gyroscope data
            $table->float('gyroscope_x');
            $table->float('gyroscope_y');
            $table->float('gyroscope_z');

            // Magnetometer data
            $table->float('magnetometer_x');
            $table->float('magnetometer_y');
            $table->float('magnetometer_z');

            // New fields
            $table->enum('system_status', ['Active', 'Standby', 'Error']); // System status
            $table->string('control_mode'); // Rotation mode
            $table->dateTime('time'); // Time of data record

            $table->timestamps(); // created_at & updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('control');
    }
};
