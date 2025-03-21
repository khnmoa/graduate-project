<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subsystem;

class SubsystemController extends Controller
{
    // جلب كل الـ subsystems
    public function index()
    {
        return response()->json(Subsystem::all(), 200);
    }

    // إنشاء Subsystem جديد
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'communication_id' => 'nullable|exists:communications,id',
            'obc_id' => 'nullable|exists:obcs,id',
            'power_id' => 'nullable|exists:powers,id',
            'gps_id' => 'nullable|exists:gps,id',
            'control_id' => 'nullable|exists:controls,id',
            'payload_id' => 'nullable|exists:payloads,id',
            'thermal_id' => 'nullable|exists:thermals,id',
            'telemetry_id' => 'nullable|exists:telemetries,id',
        ]);

        $subsystem = Subsystem::create($validatedData);

        return response()->json($subsystem, 201);
    }

    // جلب Subsystem واحد
    public function show($id)
    {
        $subsystem = Subsystem::find($id);
        if (!$subsystem) {
            return response()->json(['message' => 'Subsystem not found'], 404);
        }
        return response()->json($subsystem, 200);
    }

    // تحديث Subsystem
    public function update(Request $request, $id)
    {
        $subsystem = Subsystem::find($id);
        if (!$subsystem) {
            return response()->json(['message' => 'Subsystem not found'], 404);
        }

        $validatedData = $request->validate([
            'communication_id' => 'nullable|exists:communications,id',
            'obc_id' => 'nullable|exists:obcs,id',
            'power_id' => 'nullable|exists:powers,id',
            'gps_id' => 'nullable|exists:gps,id',
            'control_id' => 'nullable|exists:controls,id',
            'payload_id' => 'nullable|exists:payloads,id',
            'thermal_id' => 'nullable|exists:thermals,id',
            'telemetry_id' => 'nullable|exists:telemetries,id',
        ]);

        $subsystem->update($validatedData);

        return response()->json($subsystem, 200);
    }

    // حذف Subsystem
    public function destroy($id)
    {
        $subsystem = Subsystem::find($id);
        if (!$subsystem) {
            return response()->json(['message' => 'Subsystem not found'], 404);
        }

        $subsystem->delete();
        return response()->json(['message' => 'Subsystem deleted'], 200);
    }
}
