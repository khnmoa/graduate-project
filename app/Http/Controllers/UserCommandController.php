<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserCommand;
use App\Models\Command;
use App\Models\User;

use App\Models\Subsystem;



class UserCommandController extends Controller
{
    // إرجاع جميع الأوامر التي سجلها المستخدم
    public function index()
    {
        return response()->json(UserCommand::all());
    }

    // إضافة أمر جديد اختاره المستخدم
    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'command_code' => 'required|exists:commands,code',
            'time_type' => 'required|in:time tag,real time',
            'time' => 'required|date'
        ]);

        // جلب بيانات الأمر من جدول commands
        $command = Command::where('code', $request->command_code)->first();

        // إدخال البيانات في جدول user_commands
        $userCommand = UserCommand::create([
            'user_id' => $request->user_id,
            'command_code' => $command->code,
            'command_name' => $command->name,
            'command_description' => $command->description,
            'time_type' => $request->time_type,
            'time' => $request->time
        ]);

        return response()->json([
            'message' => 'Command assigned to user successfully',
            'data' => $userCommand
        ], 201);
    }

    // حذف أمر معين من جدول user_commands
    public function destroy($id)
    {
        $userCommand = UserCommand::find($id);
        if (!$userCommand) {
            return response()->json(['message' => 'Command not found'], 404);
        }

        $userCommand->delete();
        return response()->json(['message' => 'Command deleted successfully']);
    }

    // جلب الأوامر الخاصة بمستخدم معين
    public function getUserCommands($user_id)
    {
        $commands = UserCommand::where('user_id', $user_id)->get();
        return response()->json($commands);
    }
}
