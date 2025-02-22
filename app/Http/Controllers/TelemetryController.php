<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TelemetryController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Telemetry API is working!',
            'status' => true
        ]);
    }
}
