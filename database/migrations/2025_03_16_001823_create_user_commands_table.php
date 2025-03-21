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
        Schema::create('user_commands', function (Blueprint $table) {
            $table->id();

            // ربط المستخدم
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // تفاصيل الأمر
            $table->integer('command_code'); // مفتاح الأمر من جدول commands
            $table->string('command_name');  // الاسم الظاهر للأمر
            $table->text('command_description'); // وصف إضافي

            // نوع الوقت والوقت المحدد (اختياري)
            $table->enum('time_type', ['time tag', 'real time']);
            $table->timestamp('time')->nullable();

            $table->timestamps();

            // علاقة foreign key مع جدول commands
            $table->foreign('command_code')->references('code')->on('commands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_commands');
    }
};
