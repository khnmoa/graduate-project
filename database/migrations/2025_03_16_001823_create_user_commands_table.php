<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_commands', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // ربط بالـ users
            $table->integer('command_code'); // كود الأمر
            $table->string('command_name'); // اسم الأمر
            $table->text('command_description'); // وصف الأمر
            $table->enum('time_type', ['time tag', 'real time']); // نوع الوقت
            $table->timestamp('time')->nullable(); // الوقت المحدد من المستخدم
            $table->timestamps();

            // إضافة Foreign Key للـ command_code من جدول commands
            $table->foreign('command_code')->references('code')->on('commands')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_commands');
    }
};
