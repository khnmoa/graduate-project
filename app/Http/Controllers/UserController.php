<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\AdminMiddleware;

class UserController extends Controller
{

    // إضافة مستخدم جديد (التسجيل)
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role' => 'required|string',
            'nationality' => 'nullable|string',
        ]);
        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('profiles', 'public')
            : null;
        $data['image'] = $imagePath;
        $admin = auth()->user();






        if (!$admin || $admin->role !== 'admin') {
            return response()->json(['message' => 'غير مصرح لك'], 403);
        }



        // if ($admin->role !== 'admin') {
        //     return response()->json(['message' => 'غير مصرح لك'], 403);
        // }
        $data['mission'] = $admin->mission;
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        return self::getUsers();
    }

    // تسجيل الدخول
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|exists:users,email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        // التحقق من كلمة المرور
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة'
            ], 401);
        }

        // تحديث آخر تسجيل دخول
        $user->update(['last_login_at' => now()]);

        // إنشاء التوكن
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'message' => 'تم تسجيل الدخول بنجاح',
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function getUsers()
    {
        $admin = auth()->user();
        $users = User::where('mission', $admin->mission)->where('id','!=',$admin->id)->get();
        return response()->json($users);
    }

    // تسجيل الخروج
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'تم تسجيل الخروج بنجاح',
        ]);
    }

    // عرض ملف المستخدم
    public function showProfile(Request $request)
    {
        return response()->json([
            'message' => 'مرحباً بك!',
            'user' => $request->user(),
        ]);
    }

    public function index(Request $request)
    {
        // جلب الاسم والتاريخ من الطلب
        $search = $request->query('name');
        $date = $request->query('date'); // مثلاً 2024-03-04

        // استعلام المستخدمين مع المهام المرتبطة
        $query = User::with('tasks');

        // البحث بالاسم إذا تم تمريره في الطلب
        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        // البحث بالتاريخ إذا تم تمريره في الطلب
        if ($date) {
            $query->whereDate('created_at', $date);
        }

        // جلب المستخدمين بعد الفلترة
        $users = $query->get();

        return response()->json([
            'status' => true,
            'users' => $users
        ]);
    }


    // إضافة مستخدم جديد (للأدمن فقط)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|in:user,admin'
        ]);
        // الحصول على بيانات الأدمن الحالي
        $admin = auth()->user();
        // إنشاء المستخدم الجديد بنفس مهمة الأدمن
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'mission' => $admin->mission, // تعيين نفس المهمة الخاصة بالأدمن
        ]);

        return response()->json([
            'message' => 'تم إنشاء المستخدم بنجاح',
            'user' => $user,
        ], 201);
    }


    // تحديث بيانات مستخدم (للأدمن فقط)
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|string|min:6',
            'role' => 'sometimes|in:user,admin'
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        return response()->json([
            'message' => 'تم تحديث المستخدم بنجاح',
            'user' => $user,
        ]);
    }

    // حذف مستخدم (للأدمن فقط)
    public function destroy($id)
    {
        $admin = auth()->user();
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'المستخدم غير موجود'], 404);
        }
        if ($admin->role !== 'admin' || $admin->mission !== $user->mission) {
            return response()->json(['message' => 'غير مصرح لك'], 403);
        }
        $user->delete();
        return self::getUsers();
    }
}
