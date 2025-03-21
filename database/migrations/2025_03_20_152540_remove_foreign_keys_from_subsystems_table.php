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
        Schema::table('subsystems', function (Blueprint $table) {
            $table->dropForeign(['communication_id']);
            $table->dropForeign(['obc_id']);
            $table->dropForeign(['power_id']);
            $table->dropForeign(['gps_id']);
            $table->dropForeign(['control_id']);
            $table->dropForeign(['payload_id']);
            $table->dropForeign(['thermal_id']);
            $table->dropForeign(['telemetry_id']);
    
            // حذف الأعمدة بعد إزالة المفاتيح الخارجية
            $table->dropColumn([
                'communication_id',
                'obc_id',
                'power_id',
                'gps_id',
                'control_id',
                'payload_id',
                'thermal_id',
                'telemetry_id'
            ]);
        });
    }


    public function down(): void
{
    Schema::table('subsystems', function (Blueprint $table) {
        $table->foreignId('communication_id')->nullable()->constrained('communications')->onDelete('cascade');
        $table->foreignId('obc_id')->nullable()->constrained('obcs')->onDelete('cascade');
        $table->foreignId('power_id')->nullable()->constrained('powers')->onDelete('cascade');
        $table->foreignId('gps_id')->nullable()->constrained('gps')->onDelete('cascade');
        $table->foreignId('control_id')->nullable()->constrained('controls')->onDelete('cascade');
        $table->foreignId('payload_id')->nullable()->constrained('payloads')->onDelete('cascade');
        $table->foreignId('thermal_id')->nullable()->constrained('thermals')->onDelete('cascade');
        $table->foreignId('telemetry_id')->nullable()->constrained('telemetries')->onDelete('cascade');
    });
}
};

