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
    public function __construct()
    {
        // تأمين جميع الطلبات بالمصادقة ما عدا التسجيل وتسجيل الدخول
        // $this->middleware('auth:sanctum')->except(['register', 'login']);
        // حماية مسارات الأدمن
        // $this->middleware(\App\Http\Middleware\AdminMiddleware::class)->only(['index', 'store', 'update', 'destroy']);
    }

    // إضافة مستخدم جديد (التسجيل)
    public function register(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|string|email|max:255|unique:users,email',
            'password'     => 'required|string|min:6|confirmed',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role'         => 'nullable|string',
            'nationality'  => 'nullable|string',
            'mission'      => 'nullable|string',
        ]);

        // تخزين الصورة إن وجدت
        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('profiles', 'public')
            : null;

        // إنشاء المستخدم
        $user = User::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'image'        => $imagePath,
            'role'         => $request->role ?? 'user',
            'nationality'  => $request->nationality,
            'mission'      => $request->mission,
        ]);

        // إنشاء التوكن
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'message' => 'تم التسجيل بنجاح',
            'user'    => $user,
            'token'   => $token,
        ], 201);
    }

    // تسجيل الدخول
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|string|email|max:255|exists:users,email',
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
            'user'    => $user,
            'token'   => $token,
        ]);
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
            'user'    => $request->user(),
        ]);
    }

    // جلب جميع المستخدمين (للأدمن فقط)
    public function index()
    {
        if (!Gate::allows('manage-users')) {
            return response()->json(['message' => 'غير مصرح لك'], 403);
        }

        return response()->json(User::all());
    }

    // إضافة مستخدم جديد (للأدمن فقط)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'role'     => 'required|in:user,admin'
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role'     => $validated['role'],
        ]);

        return response()->json([
            'message' => 'تم إنشاء المستخدم بنجاح',
            'user'    => $user,
        ], 201);
    }

    // تحديث بيانات مستخدم (للأدمن فقط)
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'     => 'sometimes|string|max:255',
            'email'    => 'sometimes|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|string|min:6',
            'role'     => 'sometimes|in:user,admin'
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        return response()->json([
            'message' => 'تم تحديث المستخدم بنجاح',
            'user'    => $user,
        ]);
    }

    // حذف مستخدم (للأدمن فقط)
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'message' => 'تم حذف المستخدم بنجاح',
        ]);
    }
}
