<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class UserController extends Controller

{
   // إضافة مستخدم جديد  
public function register(Request $request){
    $request -> validate([
        'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role' => 'nullable|string',
            'nationality' => 'nullable|string',
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
    $request -> validate([
    'email' => 'required|string|email|max:255|exists:users,email',
    'password' => 'required|string|min:6',
    ]);
    if(Auth::attempt($request->only('email','password')));
    return Response()->json([
       'message' => 'invalid email or password'
    ],
      401 
);
$user=  User::where('email',$request->email)->FirstOrFail(); 
$token = $user->createToken('authToken')->plainTextToken;
return response()->json([
    'message' => 'login successful',
    'user' => $user,
    'token' => $token,
], 201);
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



   

     
  




        

