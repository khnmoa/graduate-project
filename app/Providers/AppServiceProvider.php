<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Http\Middleware\AdminMiddleware;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // إنشاء رابط إعادة تعيين كلمة المرور
        ResetPassword::createUrlUsing(function (object $notifiable, string $token) {
            return config('app.frontend_url') . "/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        });

        // تعريف Gate للتحقق من صلاحيات المستخدم
        Gate::define('manage-users', function (User $user) {
            return $user->role === 'admin';
        });

        // تسجيل middleware باسم "admin"
        $this->app['router']->aliasMiddleware('admin', AdminMiddleware::class);
    }
}
