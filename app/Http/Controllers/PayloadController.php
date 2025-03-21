<?php

namespace App\Http\Controllers;

use App\Models\Payload;
use Illuminate\Http\Request;

class PayloadController extends Controller {
    public function index() {
        return response()->json(Payload::with('telemetry')->get(), 200);
    }

    public function show($id) {
        $payload = Payload::with('telemetry')->find($id);
        if (!$payload) {
            return response()->json(['message' => 'Payload not found'], 404);
        }
        return response()->json($payload, 200);
    }

    public function store(Request $request) {
        $request->validate([
            'telemetry_id' => 'required|exists:telemetries,id',
            'memory_size' => 'required|integer',
            'compression_ratio' => 'required|boolean',
            'compression_ratio_value' => 'nullable|numeric',
            'payload_type' => 'required|in:Panchromatic,Infrared,Multispectrum',
        ]);

        $payload = Payload::create($request->all());
        return response()->json($payload, 201);
    }

    public function update(Request $request, $id) {
        $payload = Payload::find($id);
        if (!$payload) {
            return response()->json(['message' => 'Payload not found'], 404);
        }

        $request->validate([
            'memory_size' => 'integer',
            'compression_ratio' => 'boolean',
            'compression_ratio_value' => 'nullable|numeric',
            'payload_type' => 'in:Panchromatic,Infrared,Multispectrum',
        ]);

        $payload->update($request->all());
        return response()->json($payload, 200);
    }

    public function destroy($id) {
        $payload = Payload::find($id);
        if (!$payload) {
            return response()->json(['message' => 'Payload not found'], 404);
        }

        $payload->delete();
        return response()->json(['message' => 'Payload deleted successfully'], 200);
    }
}