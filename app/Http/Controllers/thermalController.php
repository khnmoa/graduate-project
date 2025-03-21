<?php

namespace App\Http\Controllers;

use App\Models\Thermal;
use Illuminate\Http\Request;

class ThermalController extends Controller
{
    /**
     * عرض جميع السجلات.
     */
    public function index()
    {
        return response()->json(Thermal::all(), 200);
    }

    /**
     * تخزين بيانات جديدة.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'telemetry_id' => 'required|exists:telemetry,id',


            'internal_temperature' => 'required|numeric',
            'external_temperature' => 'required|numeric',
            'battery_temperature' => 'required|numeric',
            'cooling_status' => 'required|in:Active,Standby,Failed',
            'radiator_status' => 'required|boolean',
            'thermal_alert' => 'required|boolean',
        ]);

        $thermal = Thermal::create($validatedData);

        return response()->json($thermal, 201);
    }

    /**
     * عرض سجل معين.
     */
    public function show($id)
    {
        $thermal = Thermal::find($id);

        if (!$thermal) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        return response()->json($thermal, 200);
    }

    /**
     * تحديث سجل معين.
     */
    public function update(Request $request, $id)
    {
        $thermal = Thermal::find($id);

        if (!$thermal) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $validatedData = $request->validate([
            'internal_temperature' => 'sometimes|numeric',
            'external_temperature' => 'sometimes|numeric',
            'battery_temperature' => 'sometimes|numeric',
            'cooling_status' => 'sometimes|in:Active,Standby,Failed',
            'radiator_status' => 'sometimes|boolean',
            'thermal_alert' => 'sometimes|boolean',
        ]);

        $thermal->update($validatedData);

        return response()->json($thermal, 200);
    }

    /**
     * حذف سجل معين.
     */
    public function destroy($id)
    {
        $thermal = Thermal::find($id);

        if (!$thermal) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $thermal->delete();

        return response()->json(['message' => 'Record deleted successfully'], 200);
    }
}
