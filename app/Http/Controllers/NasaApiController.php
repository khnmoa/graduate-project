<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NasaApiController extends Controller
{
    public function getAsteroids(Request $request)
    {
        $apiKey = env('NASA_API_KEY');
        $response = Http::get("https://api.nasa.gov/neo/rest/v1/feed?start_date={$request->start_date}&end_date={$request->end_date}&api_key={$apiKey}");

        if ($response->successful()) {
            return $response->json();
        } else {
            return response()->json(['error' => 'Failed to fetch asteroid data'], 500);
}
    }
}
