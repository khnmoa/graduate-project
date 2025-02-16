<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// تسجيل الدخول والتسجيل
Route::post('register', [UserController::class,'register']);
Route::post('login', [UserController::class,'login']);
Route::post('logout', [UserController::class,'logout'])->middleware('auth:sanctum');
// عرض الملف الشخصي للمستخدم
Route::middleware('auth:sanctum')->get('profile', [UserController::class, 'showProfile']);
// اختبار الاتصال
Route::get('/test', function (Request $request) {
    return response()->json([
        'message' => 'تم الاتصال بنجاح!',
        'status' => true
    ]);});

// ** حماية مسارات الأدمن **
// Route::middleware(['auth:sanctum', AdminMiddleware::class])->group(function () {
//     Route::get('/admin/users', [AdminController::class, 'listUsers']);
//     Route::post('/admin/users/{id}', [AdminController::class, 'updateUser']);
// });