<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obc;

class BcController extends Controller
{
    // Get all Obc records
    public function index()
    {
        return response()->json(Obc::all(), 200);
    }

    // Store new Obc data
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // إذا كان مطلوبًا التأكد من علاقات خارجية Uncomment السطور التالية:
            'power_id' => 'required|exists:powers,id',
            'telemetry_id' => 'required|exists:telemetries,id',
            'communications_id' => 'required|exists:communications,id',
            'time' => 'required|date',

            'cpu_usage' => 'required|numeric',
            'memory_usage' => 'required|numeric',
            'cpu_temperature' => 'nullable|numeric',
            'memory_temperature' => 'nullable|numeric',
            'uptime' => 'nullable|integer',
            'error_logs' => 'nullable|string',
            'firmware_version' => 'nullable|string',
            'operating_mode' => 'nullable|string',
        ]);

        $obc = Obc::create($validatedData);
        return response()->json($obc, 201);
    }

    // Get a single Obc record by ID
    public function show($id)
    {
        $obc = Obc::find($id);
        if (!$obc) {
            return response()->json(['message' => 'Record not found'], 404);
        }
        return response()->json($obc, 200);
    }

    // Update an Obc record
    public function update(Request $request, $id)
    {
        $obc = Obc::find($id);
        if (!$obc) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $validatedData = $request->validate([
            'cpu_usage' => 'nullable|numeric',
            'memory_usage' => 'nullable|numeric',
            'cpu_temperature' => 'nullable|numeric',
            'memory_temperature' => 'nullable|numeric',
            'uptime' => 'nullable|integer',
            'error_logs' => 'nullable|string',
            'firmware_version' => 'nullable|string',
            'operating_mode' => 'nullable|string',
        ]);

        $obc->update($validatedData);
        return response()->json($obc, 200);
    }

    // Delete an Obc record
    public function destroy($id)
    {
        $obc = Obc::find($id);
        if (!$obc) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $obc->delete();
        return response()->json(['message' => 'Record deleted'], 200);
    }
}
