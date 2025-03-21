<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('commands', function (Blueprint $table) {
            $table->unsignedBigInteger('subsystem_name')->after('description'); // إضافة العمود
            $table->foreign('subsystem_name')->references('name')->on('subsystems')->onDelete('cascade'); // إضافة المفتاح الأجنبي
        });
    }

    public function down(): void
    {
        Schema::table('commands', function (Blueprint $table) {
            $table->dropForeign(['subsystem_name']);
            $table->dropColumn('subsystem_name');
        });
    }
};