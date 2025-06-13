<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Command;

class CommandController extends Controller
{
    /**
     * عرض جميع الأوامر مع العلاقات المرتبطة بها
     */
    public function index()
    {
        $commands = Command::with([
            'communication', 'obc', 'power', 'gps',
            'control', 'payload', 'thermal', 'telemetry'
        ])->get();

        return response()->json($commands);
    }

    /**
     * عرض الأوامر الخاصة بـ Subsystem معين
     */
    public function getCommandsBySubsystem($subsystemId)
    {
        $commands = Command::with([
            'communication', 'obc', 'power', 'gps',
            'control', 'payload', 'thermal', 'telemetry'
        ])->where('subsystem_id', $subsystemId)->get();

        return response()->json($commands);
    }

    /**
     * تخزين أمر جديد في قاعدة البيانات
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|integer|unique:commands,code',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'subsystem' => 'required|exists:subsystems,id', // تعديل الاسم ليصبح subsystem بدلاً من subsystem_name
            'time' => 'nullable|date' // إضافة التحقق من الوقت
        ]);

        // تخزين الأمر الجديد في قاعدة البيانات
        $command = Command::create($validatedData);

        return response()->json([
            'status' => 'success',
            'message' => 'Command added successfully',
            'command' => $command
        ], 201);
    }

    /**
     * عرض أمر معين بواسطة الـ ID
     */
    public function show($id)
    {
        $command = Command::with([
            'communication', 'obc', 'power', 'gps',
            'control', 'payload', 'thermal', 'telemetry'
        ])->findOrFail($id);

        return response()->json($command);
    }

    /**
     * تحديث أمر معين
     */
    public function update(Request $request, $id)
    {
        $command = Command::findOrFail($id);

        $validatedData = $request->validate([
            'code' => 'sometimes|integer|unique:commands,code,' . $id,
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'subsystem' => 'sometimes|exists:subsystems,id',
            'time' => 'sometimes|date' // إضافة إمكانية تحديث الوقت
        ]);

        $command->update($validatedData);

        return response()->json([
            'status' => 'success',
            'message' => 'Command updated successfully',
            'command' => $command
        ]);
    }

    /**
     * حذف أمر معين
     */
    public function destroy($id)
    {
        $command = Command::findOrFail($id);
        $command->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Command deleted successfully'
        ]);
    }
}
