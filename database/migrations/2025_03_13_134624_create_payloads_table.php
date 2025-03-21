<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('payloads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('telemetry_id'); // ربط مع جدول التيلمتريس
            $table->integer('memory_size');
            $table->boolean('compression_ratio'); // هل يوجد ضغط أم لا
            $table->float('compression_ratio_value')->nullable(); // قيمة الضغط (تكون نل لو compression_ratio = false)
            $table->enum('payload_type', ['Panchromatic', 'Infrared', 'Multispectrum']);
            $table->timestamps();

            // إضافة Foreign Key تربط بـ telemetries
            $table->foreign('telemetry_id')->references('id')->on('telemetries')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('payloads');
    }
};
