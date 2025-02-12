<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;

class LoginController extends Controller
{
    public function reg(Request $request)
    {
        // التحقق من صحة البيانات
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:logins',
            'password' => 'required|string|min:6|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role' => 'nullable|string',
            'nationality' => 'nullable|string',
        ]);
          // حفظ الصورة إن وجدت
          $imagePath = null;
          if ($request->hasFile('image')) {
              $imagePath = $request->file('image')->store('profiles', 'public');
          }
          $user = Login::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // تشفير كلمة المرور
            'image' => $imagePath,
            'role' => $request->role ?? 'user',
            'nationality' => $request->nationality,
        ]);
        $token = $user->createToken('Login')->plainTextToken;

        return response()->json([
            'message' => 'تم التسجيل بنجاح',
            'user' => $user ,
            'token' => $token
        ], 201);
    }
    }

        
      