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
        Schema::table('tasks', function (Blueprint $table) {
            // كولوم لتسجيل وقت الدخول
            $table->timestamp('user_logged_in_at')->nullable()->after('updated_at');

            // كولوم لتسجيل وقت الخروج
            $table->timestamp('user_logged_out_at')->nullable()->after('user_logged_in_at');

            // كولوم لتسجيل الإجراءات (Actions)
            // ممكن تستخدم JSON عشان تسجل أكتر من action، أو Text لو هتسجلها كـ string مفصول
            $table->json('actions_taken')->nullable()->after('user_logged_out_at');

            // إضافة الـForeign Key لجدول user_commands
            // بفرض إن user_commands ليها id، ولو اسم الكولوم في user_commands مختلف ممكن تعدله
            $table->foreignId('user_command_id')
                  ->nullable() // ممكن تكون المهمة مش مرتبطة بـ user_command محدد
                  ->constrained('user_commands') // اسم الجدول اللي هتعمل عليه FK
                  ->onDelete('set null'); // أو cascade أو restrict حسب سياقك
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('user_logged_in_at');
            $table->dropColumn('user_logged_out_at');
            $table->dropColumn('actions_taken');
            $table->dropForeign(['user_command_id']); // بتشيل الـFK أول
            $table->dropColumn('user_command_id');
        });
    }
};