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
        Schema::table('commands', function (Blueprint $table) {
            // تأكدي من وجود الأعمدة قبل حذفها لتجنب الأخطاء
            if (Schema::hasColumn('commands', 'communication_id')) {
                $table->dropForeign(['communication_id']);
                $table->dropColumn('communication_id');
            }

            if (Schema::hasColumn('commands', 'obc_id')) {
                $table->dropForeign(['obc_id']);
                $table->dropColumn('obc_id');
            }

            if (Schema::hasColumn('commands', 'power_id')) {
                $table->dropForeign(['power_id']);
                $table->dropColumn('power_id');
            }

            if (Schema::hasColumn('commands', 'gps_id')) {
                $table->dropForeign(['gps_id']);
                $table->dropColumn('gps_id');
            }

            if (Schema::hasColumn('commands', 'control_id')) {
                $table->dropForeign(['control_id']);
                $table->dropColumn('control_id');
            }

            if (Schema::hasColumn('commands', 'payload_id')) {
                $table->dropForeign(['payload_id']);
                $table->dropColumn('payload_id');
            }

            if (Schema::hasColumn('commands', 'thermal_id')) {
                $table->dropForeign(['thermal_id']);
                $table->dropColumn('thermal_id');
            }

            if (Schema::hasColumn('commands', 'telemetry_id')) {
                $table->dropForeign(['telemetry_id']);
                $table->dropColumn('telemetry_id');
            }

            // إضافة subsystem_name إذا مش موجود
            if (!Schema::hasColumn('commands', 'subsystem_name')) {
                $table->string('subsystem_name');
                $table->foreign('subsystem_name')->references('name')->on('subsystems')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('commands', function (Blueprint $table) {
            // حذف العلاقة والعمود subsystem_name
            if (Schema::hasColumn('commands', 'subsystem_name')) {
                $table->dropForeign(['subsystem_name']);
                $table->dropColumn('subsystem_name');
            }

            // استرجاع الأعمدة القديمة
            $table->unsignedBigInteger('communication_id')->nullable();
            $table->unsignedBigInteger('obc_id')->nullable();
            $table->unsignedBigInteger('power_id')->nullable();
            $table->unsignedBigInteger('gps_id')->nullable();
            $table->unsignedBigInteger('control_id')->nullable();
            $table->unsignedBigInteger('payload_id')->nullable();
            $table->unsignedBigInteger('thermal_id')->nullable();
            $table->unsignedBigInteger('telemetry_id')->nullable();
        });
    }
};
