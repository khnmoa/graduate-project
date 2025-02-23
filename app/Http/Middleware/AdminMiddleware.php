<?php

  
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // dd(auth()->user());
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        return response()->json(['message' => 'Unauthorized'], 403);
    }
}





// class AdminMiddleware
// {
//     public function handle(Request $request, Closure $next): Response
//     {
//         // \Log::info('User Role:', ['users' => auth()->user()]);
//         if (!$request->user() || $request->user()->role !== 'admin') {
//             return response()->json(['message' => 'Unauthorized'], 403);
//         }
        
//         return $next($request);
//     }
// }
