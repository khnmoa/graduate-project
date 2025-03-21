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
        Schema::create('thermals', function (Blueprint $table) {
            $table->id(); // Primary key (Auto-incrementing ID)

            // إضافة مفتاح أجنبي لربط الاتصال ببيانات القياس عن بعد
            $table->foreignId('telemetry_id')->constrained('telemetries')->onDelete('cascade');

            $table->timestamp('time')->useCurrent(); // Records current timestamp automatically
            $table->float('internal_temperature'); // Stores the internal temperature value
            $table->float('external_temperature'); // Stores the external temperature value
            $table->float('battery_temperature'); // Stores the battery temperature value
            $table->enum('cooling_status', ['Active', 'Standby', 'Failed']); // Cooling system status
            $table->boolean('radiator_status'); // Is the radiator working? (true/false)
            $table->boolean('thermal_alert'); // Temperature exceeded safety limit? (true/false)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thermals');
    }
};
