<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('register', [UserController::class,'register']);
Route::post('login', [UserController::class,'login']);
Route::post('logout', [UserController::class,'logout'])->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->get('profile', [UserController::class, 'showProfile']);

Route::get('/test', function (Request $request) {
    return response()->json([
        'message' => 'تم الاتصال بنجاح!',
        'status' => true
    ]);});