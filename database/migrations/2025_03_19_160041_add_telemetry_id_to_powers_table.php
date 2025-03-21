<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('powers', function (Blueprint $table) {
            $table->unsignedBigInteger('telemetry_id')->after('id'); // إضافة العمود
            $table->foreign('telemetry_id')->references('id')->on('telemetries')->onDelete('cascade'); // إضافة المفتاح الأجنبي
        });
    }

    public function down(): void
    {
        Schema::table('powers', function (Blueprint $table) {
            $table->dropForeign(['telemetry_id']); // حذف المفتاح الأجنبي عند التراجع
            $table->dropColumn('telemetry_id'); // حذف العمود نفسه
        });
    }
};
