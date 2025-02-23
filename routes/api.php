<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProgrationController;
use App\Http\Controllers\ControlController;
use App\Http\Controllers\TelemetryController;
use App\Http\Controllers\PayloadController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/




// اختبار الاتصال
Route::get('/test', function (Request $request) {
    return response()->json([
        'message' => 'تم الاتصال بنجاح!',
        'status' => true
    ]);
});

// تسجيل الدخول والتسجيل
Route::post('register', [UserController::class, 'register']);
// Route::post('login', [UserController::class, 'login']);
Route::post('login', [UserController::class, 'login'])->name('login');




// حماية عمليات تسجيل الخروج وعرض الملف الشخصي
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [UserController::class, 'logout']);
    Route::get('profile', [UserController::class, 'showProfile']);
});




// حماية كل API بناءً على المهمة المسجلة في قاعدة البيانات
Route::middleware(['auth:sanctum', 'mission.access:Progration'])->group(function () {
    Route::get('/progration', [ProgrationController::class, 'index']);
});



Route::middleware(['auth:sanctum', 'mission.access:Control'])->group(function () {
    Route::get('/control', [ControlController::class, 'index']);
});

Route::middleware(['auth:sanctum', 'mission.access:Telemetry'])->group(function () {
    Route::get('/telemetry', [TelemetryController::class, 'index']);
});

Route::middleware(['auth:sanctum', 'mission.access:Payload'])->group(function () {
    Route::get('/payload', [PayloadController::class, 'index']);
});



// Route::get('/test-progration', [ProgrationController::class, 'index']);

// حماية المسارات بمصادقة Sanctum
Route::middleware('auth:sanctum')->group(function () {
    //  حماية المسارات للأدمن فقط
    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::get('/users', [UserController::class, 'index']);  
        Route::post('/users', [UserController::class, 'store']); 
        Route::put('/users/{user}', [UserController::class, 'update']);
        Route::delete('/users/{user}', [UserController::class, 'destroy']);
    });

    // يمكن لأي مستخدم البحث عن المستخدمين
    Route::get('/users/search', [UserController::class, 'search']);
});


// Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
//     return response()->json($request->user());
// });
// Route::middleware(['auth:sanctum','admin'])->get('/users',[UserController::class, 'index']);

