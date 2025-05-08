<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Asteroid;

class FetchAsteroidsFromNASA extends Command
{
    protected $signature = 'nasa:fetch-asteroids';
    protected $description = 'Fetch Near Earth Objects data from NASA and store it into the database';

    public function handle()
    {
        $apiKey = env('NASA_API_KEY');
        $startDate = now()->subDay()->format('Y-m-d'); // امبارح
        $endDate = now()->format('Y-m-d');             // النهاردة

        $url = "https://api.nasa.gov/neo/rest/v1/feed?start_date=$startDate&end_date=$endDate&api_key=$apiKey";

        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();

            foreach ($data['near_earth_objects'] as $date => $asteroids) {
                foreach ($asteroids as $asteroidData) {
                    $closeApproachData = $asteroidData['close_approach_data'][0] ?? null;

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
                            'close_approach_date' => $closeApproachData['close_approach_date'] ?? null,
                            'close_approach_date_full' => $closeApproachData['close_approach_date_full'] ?? null,
                            'epoch_date_close_approach' => $closeApproachData['epoch_date_close_approach'] ?? null,
                            'relative_velocity_kilometers_per_second' => $closeApproachData['relative_velocity']['kilometers_per_second'] ?? null,
                            'relative_velocity_kilometers_per_hour' => $closeApproachData['relative_velocity']['kilometers_per_hour'] ?? null,
                            'relative_velocity_miles_per_hour' => $closeApproachData['relative_velocity']['miles_per_hour'] ?? null,
                            'miss_distance_astronomical' => $closeApproachData['miss_distance']['astronomical'] ?? null,
                            'miss_distance_lunar' => $closeApproachData['miss_distance']['lunar'] ?? null,
                            'miss_distance_kilometers' => $closeApproachData['miss_distance']['kilometers'] ?? null,
                            'miss_distance_miles' => $closeApproachData['miss_distance']['miles'] ?? null,
                            'orbiting_body' => $closeApproachData['orbiting_body'] ?? null,
                            'is_sentry_object' => $asteroidData['is_sentry_object'],
                        ]
                    );
                }
            }

            $this->info('Asteroids fetched and stored successfully!');
        } else {
            $this->error('Failed to fetch data from NASA.');
        }
    }
}