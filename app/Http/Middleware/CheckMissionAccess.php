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
  // استخراج المهام المسموحة للمستخدم (تحويلها إلى مصفوفة في حال كانت متعددة)
        $userMissions = explode(',', $user->mission); // يدعم القيم المتعددة مثل "Control,Telemetry"

        // التحقق مما إذا كانت المهمة المطلوبة موجودة ضمن مهام المستخدم أو الأدمن
        if (!in_array(trim($requiredMission), array_map('trim', $userMissions))) {
            return response()->json([
                'message' => 'Unauthorized access',
                'error' => 'You do not have permission to access this resource'
            ], 403);
        }

        // ✅  هذا السطر لضمان إرجاع  في كل الحالات
        return $next($request);
    }
}



      
  