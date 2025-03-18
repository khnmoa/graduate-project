<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Telemetry;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class TelemetryController extends Controller
{
    /**
     * عرض جميع بيانات التيليماتري
     */
    public function index()
    {
        return response()->json([
            'message' => 'Telemetry API is working!',
            'status' => true
        ]);

        $telemetries = Telemetry::all();
        return response()->json($telemetries, Response::HTTP_OK);
    }

    /**
     * إنشاء سجل جديد في التيليماتري
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'time' => 'required|date',
            'sensor_telemetry' => 'nullable|numeric',
            'sensor_gps' => 'nullable|numeric',
            'sensor_communication' => 'nullable|numeric',
            'sensor_thermal' => 'nullable|numeric',
            'sensor_payload' => 'nullable|numeric',
            'sensor_control' => 'nullable|numeric',
            'sensor_obc' => 'nullable|numeric',
            'status' => 'required|in:Valid,Incomplete,Error'
        ]);

        $telemetry = Telemetry::create($validatedData);

        return response()->json($telemetry, Response::HTTP_CREATED);
    }

    /**
     * عرض سجل معين في التيليماتري
     */
    public function show($id)
    {
        $telemetry = Telemetry::find($id);

        if (!$telemetry) {
            return response()->json(['message' => 'Data not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($telemetry, Response::HTTP_OK);
    }

    /**
     * تحديث بيانات سجل معين
     */
    public function update(Request $request, $id)
    {
        $telemetry = Telemetry::find($id);

        if (!$telemetry) {
            return response()->json(['message' => 'Data not found'], Response::HTTP_NOT_FOUND);
        }

        $validatedData = $request->validate([
            'time' => 'sometimes|date',
            'sensor_telemetry' => 'nullable|numeric',
            'sensor_gps' => 'nullable|numeric',
            'sensor_communication' => 'nullable|numeric',
            'sensor_thermal' => 'nullable|numeric',
            'sensor_payload' => 'nullable|numeric',
            'sensor_control' => 'nullable|numeric',
            'sensor_obc' => 'nullable|numeric',
            'status' => 'sometimes|in:Valid,Incomplete,Error'
        ]);

        $telemetry->update($validatedData);

        return response()->json($telemetry, Response::HTTP_OK);
    }

    /**
     * حذف سجل معين
     */
    public function destroy($id)
    {
        $telemetry = Telemetry::find($id);

        if (!$telemetry) {
            return response()->json(['message' => 'Data not found'], Response::HTTP_NOT_FOUND);
        }

        $telemetry->delete();

        return response()->json(['message' => 'Data deleted successfully'], Response::HTTP_OK);
    }
}
