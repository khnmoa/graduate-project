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

class CheckMissionAccess
{
    public function handle(Request $request, Closure $next, string $requiredMission): Response
    {
        $user = Auth::user();

        // التحقق مما إذا كان المستخدم مسجل ولديه المهمة المطلوبة
        if (!$user || $user->mission !== $requiredMission) {
            return response()->json([
                'message' => 'Unauthorized access',
                'error' => 'You do not have permission to access this resource'
            ], 403);
        }

        return $next($request);
}
}