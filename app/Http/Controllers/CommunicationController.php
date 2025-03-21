<?php

namespace App\Http\Controllers;

use App\Models\Communication;
use Illuminate\Http\Request;

class CommunicationController extends Controller
{
    // Get all records
    public function index()
    {
        return response()->json(Communication::all(), 200);
    }

    // Get a single record
    public function show($id)
    {
        $communication = Communication::find($id);
        if (!$communication) {
            return response()->json(['message' => 'Record not found'], 404);
        }
        return response()->json($communication, 200);
    }

    // Store a new record
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Uncomment if using foreign key:
            // 'telemetry_id' => 'required|exists:telemetries,id',
            'time' => 'required|date',
            'signal_strength' => 'required|string',
            'data_rate' => 'required|numeric',
            'latency' => 'required|numeric',
            'status' => 'required|in:Active,Interrupted,Failed',
        ]);

        $communication = Communication::create($validatedData);

        return response()->json($communication, 201);
    }

    // Update a record
    public function update(Request $request, $id)
    {
        $communication = Communication::find($id);
        if (!$communication) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $validatedData = $request->validate([
            'time' => 'sometimes|date',
            'signal_strength' => 'sometimes|string',
            'data_rate' => 'sometimes|numeric',
            'latency' => 'sometimes|numeric',
            'status' => 'sometimes|in:Active,Interrupted,Failed',
        ]);

        $communication->update($validatedData);

        return response()->json($communication, 200);
    }

    // Delete a record
    public function destroy($id)
    {
        $communication = Communication::find($id);
        if (!$communication) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $communication->delete();
        return response()->json(['message' => 'Record deleted successfully'], 200);
    }
}
