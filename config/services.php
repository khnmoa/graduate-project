<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Asteroid;

class SyncAsteroids extends Command
{
    protected $signature = 'nasa:sync-asteroids';
    protected $description = 'Sync asteroids data from NASA API';

    public function handle()
    {
        $apiKey = env('NASA_API_KEY');
        $startDate = now()->toDateString();
        $endDate = now()->addDays(7)->toDateString();

        $url = "https://api.nasa.gov/neo/rest/v1/feed?start_date=$startDate&end_date=$endDate&detailed=false&api_key=$apiKey";

        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();

            foreach ($data['near_earth_objects'] as $date => $asteroids) {
                foreach ($asteroids as $asteroidData) {
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
                            'close_approach_date_full' => $closeApproach['close_approach_date_full'],
                            'epoch_date_close_approach' => $closeApproach['epoch_date_close_approach'],
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
            }

            $this->info('Asteroids synced successfully.');
        } else {
            $this->error('Failed to fetch data from NASA API.');
        }
    }
}

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

];
