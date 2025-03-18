<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Control;

class ControlController extends Controller
{
    // ✅ جلب جميع بيانات الجدول
    public function index()
    {
        return response()->json(Control::all(), 200);
        return response()->json([
            'message' => 'control API is working!',
            'status' => true
        ]);
    }

    // ✅ تخزين بيانات جديدة
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'gyroscope_x' => 'required|numeric',
            'gyroscope_y' => 'required|numeric',
            'gyroscope_z' => 'required|numeric',
            'magnetometer_x' => 'required|numeric',
            'magnetometer_y' => 'required|numeric',
            'magnetometer_z' => 'required|numeric',
            'system_status' => 'required|in:Active,Standby,Error',
            'control_mode' => 'required|string|max:255',
            'time' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $control = Control::create($validatedData);
        return response()->json($control, 201);
    }

    // ✅ جلب بيانات عنصر معين عبر الـ ID
    public function show($id)
    {
        $control = Control::find($id);
        if (!$control) {
            return response()->json(['message' => 'Record not found'], 404);
        }
        return response()->json($control, 200);
    }

    // ✅ تعديل بيانات عنصر معين
    public function update(Request $request, $id)
    {
        $control = Control::find($id);
        if (!$control) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $validatedData = $request->validate([
            'gyroscope_x' => 'nullable|numeric',
            'gyroscope_y' => 'nullable|numeric',
            'gyroscope_z' => 'nullable|numeric',
            'magnetometer_x' => 'nullable|numeric',
            'magnetometer_y' => 'nullable|numeric',
            'magnetometer_z' => 'nullable|numeric',
            'system_status' => 'nullable|in:Active,Standby,Error',
            'control_mode' => 'nullable|string|max:255',
            'time' => 'nullable|date_format:Y-m-d H:i:s',
        ]);

        $control->update($validatedData);
        return response()->json($control, 200);
    }

    // ✅ حذف عنصر معين
    public function destroy($id)
    {
        $control = Control::find($id);
        if (!$control) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $control->delete();
        return response()->json(['message' => 'Record deleted'], 200);
    }
}