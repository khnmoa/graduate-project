<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProgrationController;
use App\Http\Controllers\ControlController;
use App\Http\Controllers\TelemetryController;
use App\Http\Controllers\PayloadController;

use Illuminate\Support\Facades\Log;
// class CheckMissionAccess
// {
//     public function handle(Request $request, Closure $next, string $requiredMission): Response
//     {
//         $user = Auth::user();

//         // التحقق مما إذا كان المستخدم مسجل ولديه المهمة المطلوبة
//         if (!$user || $user->mission !== $requiredMission) {
//             return response()->json([
//                 'message' => 'Unauthorized access',
//                 'error' => 'You do not have permission to access this resource'
//             ], 403);
//         }

//         return $next($request);
// }
// }







// 
//     public function handle(Request $request, Closure $next): mixed
//     {
//         $user = Auth::user();
//         $currentMission = $request->route()->getName(); // جلب اسم الـ Route الحالية

//         // تسجيل القيم للتحقق
//         Log::info('User Mission:', ['mission' => $user->mission ?? 'NULL']);
//         Log::info('Current Route:', ['route' => $currentMission ?? 'NULL']);

//         // التأكد من وجود المستخدم ومقارنة اسم المهمة
//         if (!$user || strtolower(trim($user->mission)) !== strtolower(trim($currentMission))) {
//             return response()->json([
//                 'message' => 'Unauthorized access',
//                 'error' => 'You do not have permission to access this page'
//             ], 403);
//         }

//         return $next($request);
//     }
//

class CheckMissionAccess
{
    public function handle(Request $request, Closure $next, string $requiredMission): Response
    {
        $user = Auth::user();

        // التحقق مما إذا كان المستخدم مسجل ولديه المهمة المطلوبة
        if (!$user || strcasecmp(trim($user->mission), trim($requiredMission)) !== 0) {
            return response()->json([
                'message' => 'Unauthorized access',
                'error' => 'You do not have permission to access this resource'
            ], 403);
        }

        // ✅ أضيفي هذا السطر لضمان إرجاع Response في كل الحالات
        return $next($request);
    }
}


   