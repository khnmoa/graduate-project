<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NasaApiController extends Controller
{
    public function getAsteroids(Request $request)
    {
        $apiKey = env('NASA_API_KEY'); // جلب مفتاح API من ملف البيئة
        $response = Http::get("https://api.nasa.gov/neo/rest/v1/neo/browse?api_key={$apiKey}");

        // تحقق من استجابة API
        if ($response->successful()) {
            return response()->json($response->json()); // إرجاع البيانات بتنسيق JSON
        } else {
            return response()->json(['error' => 'Unable to fetch data'], 500);
}
}
}
