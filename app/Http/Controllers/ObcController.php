<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obc;

class bcController extends Controller
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
            'cpu_usage' => 'required|numeric',
            'memory_usage' => 'required|numeric',
            'cpu_temperature' => 'nullable|numeric',
            'memory_temperature' => 'nullable|numeric',
            'uptime' => 'nullable|integer',
            'error_logs' => 'nullable|string',
            'firmware_version' => 'nullable|string',
            'operating_mode' => 'nullable|string',
        ]);

        $Obc = Obc::create($validatedData);
        return response()->json($Obc, 201);
    }

    // Get a single Obc record by ID
    public function show($id)
    {
        $Obc = Obc::find($id);
        if (!$Obc) {
            return response()->json(['message' => 'Record not found'], 404);
        }
        return response()->json($Obc, 200);
    }

    // Update an Obc record
    public function update(Request $request, $id)
    {
        $Obc = Obc::find($id);
        if (!$Obc) {
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

        $Obc->update($validatedData);
        return response()->json($Obc, 200);
    }

    // Delete an Obc record
    public function destroy($id)
    {
        $Obc = Obc::find($id);
        if (!$Obc) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $Obc->delete();
        return response()->json(['message' => 'Record deleted'], 200);
    }
}