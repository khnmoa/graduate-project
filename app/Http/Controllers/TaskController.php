<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    // عرض جميع المهام وفقًا لدور المستخدم
    public function index(): JsonResponse
    {
        $user = auth()->user();

        // إذا كان المستخدم Admin، يرى جميع المهام
        if ($user->role === 'admin') {
            $tasks = Task::all();
        } else {
            // المستخدم العادي يرى فقط المهام الخاصة به
            $tasks = Task::where('user_id', $user->id)->get();
        }

        return response()->json([
            'success' => true,
            'data' => $tasks
        ], 200);
    }

    // إنشاء مهمة جديدة (للمستخدمين الإداريين فقط)
    public function store(Request $request): JsonResponse
    {
     
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'mission' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Pending,In Progress,Completed'
        ]);

        $task = Task::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'تم إنشاء المهمة بنجاح',
            'data' => $task
        ], 201);
    }

    // عرض مهمة واحدة
    public function show(Task $task): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $task
        ], 200);
    }

    // تحديث المهمة
    public function update(Request $request, Task $task): JsonResponse
    {
        $validated = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'mission' => 'sometimes|string|max:255',
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'status' => 'sometimes|in:Pending,In Progress,Completed'
        ]);

        $task->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'تم تحديث المهمة بنجاح',
            'data' => $task
        ], 200);
    }

    // حذف المهمة
    public function destroy(Task $task): JsonResponse
    {
        $task->delete();

        return response()->json([
            'success' => true,
            'message' => 'تم حذف المهمة بنجاح'
        ], 200);
    }
 

    public function getTasksByDate(Request $request)
    {
        // من المفترض أن يحتوي هذا الكود على الاستعلام لاسترجاع المهام حسب التاريخ
        return response()->json(['message' => 'تم استدعاء الميثود بنجاح']);
    }
}






