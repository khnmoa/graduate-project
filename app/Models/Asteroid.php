<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asteroid extends Model
{
    use HasFactory;

    protected $fillable = [
        'neo_reference_id',
        'name',
        'nasa_jpl_url',
        'absolute_magnitude_h',
        'estimated_diameter_min_km',
        'estimated_diameter_max_km',
        'estimated_diameter_min_m',
        'estimated_diameter_max_m',
        'estimated_diameter_min_miles',
        'estimated_diameter_max_miles',
        'estimated_diameter_min_feet',
        'estimated_diameter_max_feet',
        'is_potentially_hazardous_asteroid',
        'close_approach_date',
        'close_approach_date_full',
        'epoch_date_close_approach',
        'relative_velocity_kilometers_per_second',
        'relative_velocity_kilometers_per_hour',
        'relative_velocity_miles_per_hour',
        'miss_distance_astronomical',
        'miss_distance_lunar',
        'miss_distance_kilometers',
        'miss_distance_miles',
        'orbiting_body',
        'is_sentry_object',
    ];
}