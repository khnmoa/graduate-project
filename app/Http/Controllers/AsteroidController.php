<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Asteroid;

class AsteroidController extends Controller
{
    // جلب جميع الكويكبات من قاعدة البيانات
    public function fetchAsteroids(Request $request)
    {
        $asteroids = Asteroid::all();
        return response()->json($asteroids);
    }

    // جلب الكويكبات مباشرة من NASA API وتخزينها
    public function fetchLiveAsteroids(Request $request)
    {
        $apiKey = env('NASA_API_KEY');
        $response = Http::get("https://api.nasa.gov/neo/rest/v1/neo/browse?api_key={$apiKey}");

        if ($response->successful()) {
            $data = $response->json();

            foreach ($data['near_earth_objects'] as $asteroidData) {
                $closeApproach = $asteroidData['close_approach_data'][0] ?? null;
                if (!$closeApproach) continue;

                Asteroid::updateOrCreate(
                    ['neo_reference_id' => $asteroidData['neo_reference_id']],
                    [
                        'name' => $asteroidData['name'],
                        'nasa_jpl_url' => $asteroidData['nasa_jpl_url'],
                        'absolute_magnitude_h' => $asteroidData['absolute_magnitude_h'],
                        'estimated_diameter_min_km' => $asteroidData['estimated_diameter']['kilometers']['estimated_diameter_min'],
                        'estimated_diameter_max_km' => $asteroidData['estimated_diameter']['kilometers']['estimated_diameter_max'],
                        'estimated_diameter_min_m' => $asteroidData['estimated_diameter']['meters']['estimated_diameter_min'],
                        'estimated_diameter_max_m' => $asteroidData['estimated_diameter']['meters']['estimated_diameter_max'],
                        'estimated_diameter_min_miles' => $asteroidData['estimated_diameter']['miles']['estimated_diameter_min'],
                        'estimated_diameter_max_miles' => $asteroidData['estimated_diameter']['miles']['estimated_diameter_max'],
                        'estimated_diameter_min_feet' => $asteroidData['estimated_diameter']['feet']['estimated_diameter_min'],
                        'estimated_diameter_max_feet' => $asteroidData['estimated_diameter']['feet']['estimated_diameter_max'],
                        'is_potentially_hazardous_asteroid' => $asteroidData['is_potentially_hazardous_asteroid'],
                        'close_approach_date' => $closeApproach['close_approach_date'],
                        'close_approach_date_full' => $closeApproach['close_approach_date_full'] ?? null,
                        'epoch_date_close_approach' => $closeApproach['epoch_date_close_approach'] ?? null,
                        'relative_velocity_kilometers_per_second' => $closeApproach['relative_velocity']['kilometers_per_second'],
                        'relative_velocity_kilometers_per_hour' => $closeApproach['relative_velocity']['kilometers_per_hour'],
                        'relative_velocity_miles_per_hour' => $closeApproach['relative_velocity']['miles_per_hour'],
                        'miss_distance_astronomical' => $closeApproach['miss_distance']['astronomical'],
                        'miss_distance_lunar' => $closeApproach['miss_distance']['lunar'],
                        'miss_distance_kilometers' => $closeApproach['miss_distance']['kilometers'],
                        'miss_distance_miles' => $closeApproach['miss_distance']['miles'],
                        'orbiting_body' => $closeApproach['orbiting_body'],
                        'is_sentry_object' => $asteroidData['is_sentry_object'],
                    ]
                );
            }

            return response()->json(['message' => 'Live asteroids fetched and stored successfully.']);
        } else {
            return response()->json(['error' => 'Unable to fetch data from NASA API'], 500);
        }
    }
}
