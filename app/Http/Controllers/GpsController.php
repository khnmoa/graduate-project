<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gps;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GpsController extends Controller
{
    /**
     * Display a listing of GPS records.
     */
    public function index()
    {
        $gpsData = Gps::all();
        return response()->json($gpsData, Response::HTTP_OK);
    }

    /**
     * Store a newly created GPS record in storage.
     */
    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'time' => 'required|date',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'altitude' => 'required|numeric',
            'velocity' => 'required|numeric',
        ]);

        // Create a new GPS record
        $gps = Gps::create($validatedData);

        return response()->json($gps, Response::HTTP_CREATED);
    }

    /**
     * Display the specified GPS record.
     */
    public function show($id)
    {
        $gps = Gps::find($id);

        if (!$gps) {
            return response()->json(['message' => 'GPS record not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($gps, Response::HTTP_OK);
    }

    /**
     * Update the specified GPS record.
     */
    public function update(Request $request, $id)
    {
        $gps = Gps::find($id);

        if (!$gps) {
            return response()->json(['message' => 'GPS record not found'], Response::HTTP_NOT_FOUND);
        }

        // Validate request data
        $validatedData = $request->validate([
            'time' => 'sometimes|date',
            'latitude' => 'sometimes|numeric',
            'longitude' => 'sometimes|numeric',
            'altitude' => 'sometimes|numeric',
            'velocity' => 'sometimes|numeric',
        ]);

        // Update GPS record
        $gps->update($validatedData);

        return response()->json($gps, Response::HTTP_OK);
    }

    /**
     * Remove the specified GPS record from storage.
     */
    public function destroy($id)
    {
        $gps = Gps::find($id);

        if (!$gps) {
            return response()->json(['message' => 'GPS record not found'], Response::HTTP_NOT_FOUND);
        }

        $gps->delete();
        return response()->json(['message' => 'GPS record deleted'], Response::HTTP_OK);
    }
}