<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{
    /**
     * عرض جميع المهام وفقًا لدور المستخدم مع إمكانية البحث والتصفية.
     */
    public function index(Request $request): JsonResponse
    {
        $user = auth()->user();
        $query = Task::query();

        // تحديد المهام بناءً على دور المستخدم
        if ($user->role === 'admin') {
            // Admin يرى جميع المهام
            // لا يوجد شرط user_id هنا
        } else {
            // المستخدم العادي يرى فقط المهام الخاصة به
            $query->where('user_id', $user->id);
        }

        // --- وظائف البحث والتصفية الجديدة ---

        // البحث بتاريخ الدخول (باليوم) user_logged_in_at
        if ($request->has('date')) {
            $query->whereDate('user_logged_in_at', $request->input('date'));
        }

        // البحث بوقت الدخول (بالساعة/الدقيقة) user_logged_in_at
        // يمكنك استخدام 'H:i' للبحث بالساعة والدقيقة فقط (مثل 10:30)
        // أو 'H:i:s' للبحث بالساعة والدقيقة والثانية (مثل 10:30:00)
        if ($request->has('time')) {
            $query->whereTime('user_logged_in_at', $request->input('time'));
        }

        // البحث بـ user_command_id (الـForeign Key الجديد)
        if ($request->has('user_command_id')) {
            $query->where('user_command_id', $request->input('user_command_id'));
        }

        // البحث عن Actions محددة داخل الـJSON column (actions_taken)
        // مثال: ?action=create_task
        if ($request->has('action')) {
            $query->whereJsonContains('actions_taken', $request->input('action'));
        }

        // البحث بـstatus
        if ($request->has('status') && in_array($request->input('status'), ['Pending', 'In Progress', 'Completed'])) {
            $query->where('status', $request->input('status'));
        }

        // البحث بـtitle أو mission
        if ($request->has('search')) {
            $searchTerm = '%' . $request->input('search') . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', $searchTerm)
                  ->orWhere('mission', 'like', $searchTerm);
            });
        }

        // Pagination
        $tasks = $query->paginate($request->input('per_page', 10)); // الافتراضي 10 مهام لكل صفحة

        return response()->json([
            'success' => true,
            'data' => $tasks
        ], 200);
    }

    /**
     * إنشاء مهمة جديدة (للمستخدمين الإداريين فقط).
     */
    public function store(Request $request): JsonResponse
    
    {


        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        try {
            $validated = $request->validate([
                'user_id' => 'required|exists:users,id',
                'mission' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'status' => 'required|in:Pending,In Progress,Completed',
                // كولوم user_command_id يمكن إضافته هنا عند إنشاء المهمة
                'user_command_id' => 'nullable|exists:user_commands,id',
                // هذه الكولومز لا يتم إرسالها من الـfrontend عند الإنشاء عادةً
                // 'user_logged_in_at' => 'nullable|date',
                // 'user_logged_out_at' => 'nullable|date',
                // 'actions_taken' => 'nullable|json',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'خطأ في بيانات الإدخال.',
                'errors' => $e->errors()
            ], 422);
        }

        $task = Task::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'تم إنشاء المهمة بنجاح',
            'data' => $task
        ], 201);
    }

    /**
     * عرض مهمة واحدة.
     */
    public function show(Task $task): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $task
        ], 200);
    }

    /**
     * تحديث المهمة.
     */
    public function update(Request $request, Task $task): JsonResponse
    {
        try {
            $validated = $request->validate([
                'user_id' => 'sometimes|exists:users,id',
                'mission' => 'sometimes|string|max:255',
                'title' => 'sometimes|string|max:255',
                'description' => 'nullable|string',
                'status' => 'sometimes|in:Pending,In Progress,Completed',
                // الكولومز الجديدة اللي ممكن تتحدث:
                'user_logged_in_at' => 'nullable|date',
                'user_logged_out_at' => 'nullable|date',
                // عشان تستقبل الـactions_taken كـ JSON string من الـfrontend
                'actions_taken' => 'nullable|json',
                'user_command_id' => 'nullable|exists:user_commands,id',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'خطأ في بيانات الإدخال.',
                'errors' => $e->errors()
            ], 422);
        }

        // لو فيه actions_taken جاي كـstring، حوله لـarray عشان يتخزن صح كـJSON
        if (isset($validated['actions_taken']) && is_string($validated['actions_taken'])) {
            $validated['actions_taken'] = json_decode($validated['actions_taken'], true);
        }


        $task->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'تم تحديث المهمة بنجاح',
            'data' => $task
        ], 200);
    }

    /**
     * حذف المهمة.
     */
    public function destroy(Task $task): JsonResponse
    {
        // ممكن تضيف صلاحية هنا لو عايز، مثلاً إن بس الـadmin هو اللي يقدر يحذف
        // if (auth()->user()->role !== 'admin') {
        //     abort(403, 'Unauthorized');
        // }

        $task->delete();

        return response()->json([
            'success' => true,
            'message' => 'تم حذف المهمة بنجاح'
        ], 200);
    }


    // الـMethod دي مش محتاجينها تاني بما إن index بتعمل نفس الوظيفة وأكثر
    // public function getTasksByDate(Request $request)
    // {
    //     return response()->json(['message' => 'تم استدعاء الميثود بنجاح']);
    // }
}