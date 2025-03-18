<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * This function creates the 'gps' table with the required columns.
     */
    public function up(): void
    {
        Schema::create('gps', function (Blueprint $table) {
            $table->id(); // Primary key (Auto-incrementing ID)
            
            $table->timestamp('time')->useCurrent(); // Records the current timestamp automatically
            
            $table->float('latitude'); // Stores the latitude value
            $table->float('longitude'); // Stores the longitude value
            $table->float('altitude'); // Stores the altitude value
            $table->float('velocity'); // Stores the speed value
            
            $table->timestamps(); // Automatically creates 'created_at' and 'updated_at' timestamps
        });
    }

    /**
     * Reverse the migrations.
     * This function deletes the 'gps' table when rolling back the migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('gps');
    }
};