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
            $table->timestamp('time')->useCurrent(); // Time of data record
            $table->string('signal_strength'); // Signal strength level
            $table->float('data_rate'); // Data transfer rate (Mbps)
            $table->float('latency'); // Latency in milliseconds (ms)
            $table->enum('status', ['Active', 'Interrupted', 'Failed']); // Connection status
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('communications');
    }
};