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
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PowerController;
use App\Http\Controllers\SubsystemController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\UserCommandController;
use App\Http\Controllers\SSPController;



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

Route::post('login', [UserController::class, 'login'])->name('login');




// حماية عمليات تسجيل الخروج وعرض الملف الشخصي
Route::middleware('auth:sanctum')->group(function () {
    Route::post('register', [UserController::class, 'register']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::get('profile', [UserController::class, 'showProfile']);
    Route::get('getUsers', [UserController::class, 'getUsers']);
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
    Route::middleware('auth:sanctum', AdminMiddleware::class)->group(function () {
        Route::get('/users', [UserController::class, 'index']);
        Route::post('/users', [UserController::class, 'store']);
        Route::put('/users/{user}', [UserController::class, 'update']);
        Route::delete('/users/{user}', [UserController::class, 'destroy']);
    });


    // يمكن لأي مستخدم البحث عن المستخدمين
    Route::get('/users/search', [UserController::class, 'search']);
});



// // Route::apiResource('tasks', TaskController::class);
// Route::middleware(['auth:sanctum', 'admin'])->group(function () {
//     Route::post('/tasks', [TaskController::class, 'store']); // الأدمن فقط يمكنه تعيين المهام
//     Route::put('/tasks/{user}', [TaskController::class, 'update']);
//     Route::delete('/tasks/{user}', [TaskController::class, 'destroy']);
// });

// حماية مهام الأدمن فقط
Route::middleware(['auth:sanctum', AdminMiddleware::class])->group(function () {
    Route::post('/tasks', [TaskController::class, 'store']); // الأدمن فقط يمكنه تعيين المهام
    Route::put('/tasks/{task}', [TaskController::class, 'update']);
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
});


// 🔹 حماية البحث عن المهام بالتاريخ

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tasks/by-date', [TaskController::class, 'getTasksByDate']);
});


Route::get('powers', [PowerController::class, 'index']);
Route::post('powers', [PowerController::class, 'store']);
Route::get('powers/{id}', [PowerController::class, 'show']);
Route::put('powers/{id}', [PowerController::class, 'update']);
Route::delete('powers/{id}', [PowerController::class, 'destroy']);



// subsystems
Route::prefix('subsystems')->group(function () {
    Route::get('/', [SubsystemController::class, 'index']); // جلب كل الـ subsystems
    Route::post('/', [SubsystemController::class, 'store']); // إنشاء جديد
    Route::get('/{id}', [SubsystemController::class, 'show']); // جلب واحد حسب الـ id
    Route::put('/{id}', [SubsystemController::class, 'update']); // تحديث
    Route::delete('/{id}', [SubsystemController::class, 'destroy']); // حذف


});

Route::get('/commands', [CommandController::class, 'index']);
Route::get('/commands/subsystem/{subsystem}', [CommandController::class, 'getCommandsBySubsystem']);
Route::get('/commands/{id}', [CommandController::class, 'show']);
Route::post('/commands', [CommandController::class, 'store']);
Route::put('/commands/{id}', [CommandController::class, 'update']);
Route::delete('/commands/{id}', [CommandController::class, 'destroy']);



Route::get('/subsystems', [SubsystemController::class, 'index']);
Route::post('/subsystems', [SubsystemController::class, 'store']);
Route::get('/subsystems/{id}', [SubsystemController::class, 'show']);
Route::put('/subsystems/{id}', [SubsystemController::class, 'update']);
Route::delete('/subsystems/{id}', [SubsystemController::class, 'destroy']);









// Route::middleware('auth:api')->group(function () {
//     // عرض جميع الأوامر التي سجلها المستخدم
    Route::get('/user-commands', [UserCommandController::class, 'index']);

    // إضافة أمر جديد اختاره المستخدم
    Route::post('/user-commands', [UserCommandController::class, 'store']);

    // حذف أمر معين من جدول user_commands
    Route::delete('/user-commands/{id}', [UserCommandController::class, 'destroy']);

    // جلب الأوامر الخاصة بمستخدم معين
    Route::get('/user-commands/{user_id}', [UserCommandController::class, 'getUserCommands']);
// });





Route::post('/encode-packet', [SSPController::class, 'encodePacket']);
Route::post('/decode-packet', [SSPController::class, 'decodePacket']);




