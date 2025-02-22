<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app = Application::configure(basePath: dirname(__DIR__)) // حفظ التطبيق في متغير
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->api(prepend: [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        ]);

        $middleware->alias([
            'verified' => \App\Http\Middleware\EnsureEmailIsVerified::class,
        ]);

        // $middleware->append(\App\Http\Middleware\AdminMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

// إضافة Middleware بعد إنشاء التطبيق
$app->router->aliasMiddleware('mission.access', \App\Http\Middleware\CheckMissionAccess::class);

return $app; // تأكد من إعادة التطبيق
