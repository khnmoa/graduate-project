<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\UpdateGpsData;
use App\Console\Commands\UpdateControlData;
use App\console\Commands\InsertObcData;

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
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
            'mission.access' => \App\Http\Middleware\CheckMissionAccess::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })

    // هنا أضفنا الجدولة
    ->withSchedule(function (Schedule $schedule) {
        $schedule->command(UpdateGpsData::class)->everyMinute();
        $schedule->command(UpdateControlData::class)->everyMinute();
        $schedule->command(InsertObcData::class)->everyMinute();
        
    })

    ->create();

return $app;
