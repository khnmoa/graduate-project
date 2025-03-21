<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Command;
use App\Models\Subsystem;

class CommandController extends Controller
{
    /**
     * عرض جميع الأوامر مع العلاقات المرتبطة بها
     */
    public function index()
    {
        return response()->json(Command::with([
            'communication', 'obc', 'power', 'gps',
            'control', 'payload', 'thermal', 'telemetry'
        ])->get());
    }

    /**
     * عرض الأوامر الخاصة بـ Subsystem معين
     */
    public function getCommandsBySubsystem($subsystem)
    {
        $commands = Command::with([
            'communication', 'obc', 'power', 'gps',
            'control', 'payload', 'thermal', 'telemetry'
        ])->where('subsystem_id', $subsystem)->get();  // تغيير 'subsystem' إلى 'subsystem_id'

        return response()->json($commands);
    }

    /**
     * تخزين أمر جديد في قاعدة البيانات
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|integer|unique:commands,code',
            'name' => 'required|string',
            'description' => 'required|string',
            'subsystem' => 'required|string',
            'communication_id' => 'nullable|exists:communications,id',
            'obc_id' => 'nullable|exists:obcs,id',
            'power_id' => 'nullable|exists:powers,id',
            'gps_id' => 'nullable|exists:gps,id',
            'control_id' => 'nullable|exists:controls,id',
            'payload_id' => 'nullable|exists:payloads,id',
            'thermal_id' => 'nullable|exists:thermals,id',
            'telemetry_id' => 'nullable|exists:telemetries,id',
        ]);

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
    public function show(string $id)
    {
        $command = Command::with([
            'communication', 'obc', 'power', 'gps',
            'control', 'payload', 'thermal', 'telemetry'
        ])->findOrFail($id);  // استخدام findOrFail لعدم الحاجة للتحقق يدويًا

        return response()->json($command);
    }

    /**
     * تحديث أمر معين
     */
    public function update(Request $request, $id)
    {
        $command = Command::findOrFail($id);  // استخدام findOrFail لعدم الحاجة للتحقق يدويًا

        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'subsystem' => 'sometimes|string',
            'communication_id' => 'nullable|exists:communications,id',
            'obc_id' => 'nullable|exists:obcs,id',
            'power_id' => 'nullable|exists:powers,id',
            'gps_id' => 'nullable|exists:gps,id',
            'control_id' => 'nullable|exists:controls,id',
            'payload_id' => 'nullable|exists:payloads,id',
            'thermal_id' => 'nullable|exists:thermals,id',
            'telemetry_id' => 'nullable|exists:telemetries,id',
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
    public function destroy(string $id)
    {
        $command = Command::findOrFail($id);  // استخدام findOrFail لعدم الحاجة للتحقق يدويًا

        $command->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Command deleted successfully'
        ]);
    }
}
