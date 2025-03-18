<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('telemetry', function (Blueprint $table) {
            $table->id(); 

            // توقيت إدخال البيانات
            $table->timestamp('time')->useCurrent();

            // بيانات المستشعرات المختلفة
            $table->string('sensor_telemetry')->nullable();
            $table->string('sensor_gps')->nullable();
            $table->string('sensor_communication')->nullable();
            $table->string('sensor_thermal')->nullable();
            $table->string('sensor_payload')->nullable();
            $table->string('sensor_control')->nullable();
            $table->string('sensor_obc')->nullable();
            

            // حالة البيانات
            $table->enum('status', ['Valid', 'Incomplete', 'Error'])->default('Valid');

            $table->timestamps();


        });
    }

    public function down(): void
    {
        Schema::dropIfExists('telemetry');
    }
};