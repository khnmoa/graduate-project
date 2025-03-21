<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('subsystems', function (Blueprint $table) {
            $table->string('name')->unique()->after('id'); // إضافة عمود فريد
        });
    }

    public function down(): void
    {
        Schema::table('subsystems', function (Blueprint $table) {
            $table->dropUnique(['name']); // حذف القيود الفريدة
            $table->dropColumn('name');   // حذف العمود عند التراجع
        });
    }
};