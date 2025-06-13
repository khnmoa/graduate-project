<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class SolarRadiationController extends Controller
{
    public function egyptRadiation(Request $request)
    {
        // استلام التاريخ من المستخدم أو استخدام تاريخ امبارح
        $inputDate = $request->input('date');
        $date = $inputDate ? Carbon::parse($inputDate)->format('Ymd') : Carbon::yesterday()->format('Ymd');

        //  ودول مدن مصرية رئيسية مع إحداثياتها لمقارنه الاشعاع
        //عشان ابحث في postman عن التاريخ القديم بكتب الصيغه جديه {"date": "2025-06-10"} مع تغير طبعا التاريخ

        $locations = [
            'Cairo' => ['lat' => 30.0444, 'lon' => 31.2357],
            'Giza' => ['lat' => 30.0131, 'lon' => 31.2089],
            'Alexandria' => ['lat' => 31.2001, 'lon' => 29.9187],
            'Aswan' => ['lat' => 24.0889, 'lon' => 32.8998],
            'Luxor' => ['lat' => 25.6872, 'lon' => 32.6396],
            'Sinai' => ['lat' => 28.1099, 'lon' => 33.6656],
            'Marsa Matrouh' => ['lat' => 31.3543, 'lon' => 27.2373],
            'Paris' => ['lat' => 48.8566, 'lon' => 2.3522],
            'Rio de Janeiro' => ['lat' => -22.9068, 'lon' => -43.1729],
            'Tokyo' => ['lat' => 35.6895, 'lon' => 139.6917],
            'Cape Town' => ['lat' => -33.9249, 'lon' => 18.4241],
            'Toronto' => ['lat' => 43.651070, 'lon' => -79.347015],
            'Sydney' => ['lat' => -33.8688, 'lon' => 151.2093],
            'New York' => ['lat' => 40.7128, 'lon' => -74.0060],
        ];

        $results = [];

        foreach ($locations as $city => $coords) {
            $url = "https://power.larc.nasa.gov/api/temporal/daily/point?parameters=ALLSKY_SFC_SW_DWN&community=RE&longitude={$coords['lon']}&latitude={$coords['lat']}&start={$date}&end={$date}&format=JSON";

            $response = Http::get($url);

            if ($response->successful()) {
                $data = $response->json();
                $value = $data['properties']['parameter']['ALLSKY_SFC_SW_DWN'][$date] ?? null;

                $results[$city] = [
                    'latitude' => $coords['lat'],
                    'longitude' => $coords['lon'],
                    'radiation' => $value,
                    'date' => Carbon::parse($date)->toDateString()
                ];
            } else {
                $results[$city] = [
                    'error' => 'Data not available',
                ];
            }
        }

        return response()->json($results);
    }
}
