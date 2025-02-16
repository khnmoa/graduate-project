<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 


class UserController extends Controller

{
   // إضافة مستخدم جديد  register
public function register(Request $request){
    $request -> validate([
        'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role' => 'nullable|string',
            'nationality' => 'nullable|string',
            'mission' => 'nullable|string', //  إضافة التحقق من المهمة
    ]);
      // تخزين الصورة إن كانت موجودة
      $imagePath = null;
      if ($request->hasFile('image')) {
          $imagePath = $request->file('image')->store('profiles', 'public');
      }
   
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password), // تشفير كلمة المرور
        'image' => $imagePath, // تخزين مسار الصورة
        'role' => $request->role ?? 'user', // إذا لم يتم تقديم الدور، سيتم تعيينه كـ 'user'
        'nationality' => $request->nationality, // إذا لم يتم تقديم الجنسية، سيتم تعيينها كـ null
        'mission' => $request->mission, //  تخزين المهمة
    ]);
 // إنشاء توكن للمستخدم
 $token = $user->createToken('authToken')->plainTextToken;
   // إرجاع استجابة بنجاح التسجيل
   return response()->json([
    'message' => 'تم التسجيل بنجاح',
    'user' => $user,
    'token' => $token,
], 201);
    }

  
 
    
     //login
    
public function login(Request $request)
{
        $request->validate([
            'email' => 'required|string|email|max:255|exists:users,email',
            'password' => 'required|string|min:6',
        ]);
        
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid email or password'
            ], 401);
        }

        $user = Auth::user();// تحديث آخر تسجيل دخول
        $user->update(['last_login_at' => now()]);
        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
            'token' => $token,
        ]);
        
}



// logout
public function logout(Request $request){
    $request ->user()->currentAccessToken()->delete();
    return response()->json([
        'message' => 'logout successful',
      
    ]);
}

public function showProfile(Request $request)
{
    // إرجاع بيانات المستخدم بناءً على التوكن
    return response()->json([
        'message' => 'مرحباً بك!',
        'user' => $request->user(),  // بيانات المستخدم المسترجعة من التوكن
    ]);
}


}




     
  




        

