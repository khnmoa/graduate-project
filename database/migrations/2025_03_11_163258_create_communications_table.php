<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('communications', function (Blueprint $table) {
            $table->id(); // Primary key

            // مفتاح أجنبي مرتبط بـ telemetries
            $table->foreignId('telemetry_id')
                  ->constrained('telemetries')
                  ->onDelete('cascade');

            // الأعمدة الأخرى
            $table->timestamp('time')->useCurrent(); // وقت التسجيل
            $table->string('signal_strength'); // قوة الإشارة
            $table->float('data_rate'); // معدل نقل البيانات (Mbps)
            $table->float('latency'); // زمن التأخير (ms)
            $table->enum('status', ['Active', 'Interrupted', 'Failed']); // حالة الاتصال

            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('communications');
    }
};
