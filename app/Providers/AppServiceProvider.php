<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

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
        // Kustomisasi template email reset password
        ResetPassword::toMailUsing(function (object $notifiable, string $token) {
            $url = url(route('password.reset', [
                'token' => $token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));

            return (new MailMessage)
                ->subject('Reset Kata Sandi - Pajaken')
                ->view('emails.auth.reset-password', [
                    'url' => $url,
                    'notifiable' => $notifiable
                ]);
        });

        // Membagikan data notifikasi ke layout app (navbar)
        View::composer('layouts.app', function ($view) {
            if (Auth::check()) {
                $notifications = Notification::where('user_id', Auth::id())
                    ->orderBy('created_at', 'desc')
                    ->limit(5) // Tampilkan 5 terbaru di dropdown
                    ->get();

                $unreadNotificationsCount = Notification::where('user_id', Auth::id())
                    ->whereNull('read_at')
                    ->count();

                $view->with(compact('notifications', 'unreadNotificationsCount'));
            }
        });
    }
}
