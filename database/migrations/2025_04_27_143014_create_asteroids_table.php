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
        Schema::create('asteroids', function (Blueprint $table) {
            $table->id();
            $table->string('neo_reference_id')->nullable();
            $table->string('name')->nullable();
            $table->string('nasa_jpl_url')->nullable();
            $table->float('absolute_magnitude_h')->nullable();
            $table->float('estimated_diameter_min_km')->nullable();
            $table->float('estimated_diameter_max_km')->nullable();
            $table->float('estimated_diameter_min_m')->nullable();
            $table->float('estimated_diameter_max_m')->nullable();
            $table->float('estimated_diameter_min_miles')->nullable();
            $table->float('estimated_diameter_max_miles')->nullable();
            $table->float('estimated_diameter_min_feet')->nullable();
            $table->float('estimated_diameter_max_feet')->nullable();     
            $table->boolean('is_potentially_hazardous_asteroid')->nullable();
            $table->date('close_approach_date')->nullable();
            $table->string('close_approach_date_full')->nullable();
            $table->bigInteger('epoch_date_close_approach')->nullable();
            $table->float('relative_velocity_kilometers_per_second')->nullable();
            $table->float('relative_velocity_kilometers_per_hour')->nullable();
            $table->float('relative_velocity_miles_per_hour')->nullable();
            $table->float('miss_distance_astronomical')->nullable();
            $table->float('miss_distance_lunar')->nullable();
            $table->float('miss_distance_kilometers')->nullable();
            $table->float('miss_distance_miles')->nullable();
            $table->string('orbiting_body')->nullable();
            $table->boolean('is_sentry_object');  


        

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asteroids');
    }
};