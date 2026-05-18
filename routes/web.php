<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminVehicleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\AdminNotificationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminPaymentController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::redirect('/dashboard', '/'); // Redirect otomatis jika ada yang akses /dashboard

Route::get('/about', [DashboardController::class, 'about'])->name('about.index');

Route::view('/faq', 'pages.faq')->name('faq');
Route::view('/panduan', 'pages.guide')->name('guide');
Route::view('/syarat-dan-ketentuan', 'pages.terms')->name('terms');
Route::view('/kebijakan-privasi', 'pages.privacy')->name('privacy');

Route::middleware(['auth'])->group(function () {
    // User Routes
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllRead'])->name('notifications.markAllRead');

    Route::middleware('role:user')->group(function () {
        Route::post('/dashboard/verify-nik', [DashboardController::class, 'verifyNik'])->name('verify.nik');
        Route::post('/dashboard/reset-nik', [DashboardController::class, 'resetNik'])->name('reset.nik');

        Route::get('/cek-pajak', [DashboardController::class, 'taxCheck'])->name('tax-check.index');
        Route::get('/pembayaran/{id}', [PaymentController::class, 'create'])->name('payment.create');
        Route::post('/pembayaran/{id}', [PaymentController::class, 'store'])->name('payment.store');
        Route::get('/pembayaran/invoice/{id}', [PaymentController::class, 'show'])->name('payment.show');

        // Reminder Resource
        Route::get('/pengingat', [ReminderController::class, 'index'])->name('reminder.index');
        Route::post('/pengingat', [ReminderController::class, 'store'])->name('reminder.store');
    });

    // Admin Routes
    Route::middleware('role:admin')->prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

        Route::get('/vehicles', [AdminVehicleController::class, 'index'])->name('admin.vehicles.index');
        Route::post('/vehicles', [AdminVehicleController::class, 'store'])->name('admin.vehicles.store');
        Route::resource('notifications', AdminNotificationController::class)->names('admin.notifications');
        Route::get('/payments', [AdminPaymentController::class, 'index'])->name('admin.payments.index');
        Route::post('/payments/{id}/approve', [AdminPaymentController::class, 'approve'])->name('admin.payments.approve');
        Route::post('/payments/{id}/reject', [AdminPaymentController::class, 'reject'])->name('admin.payments.reject');
    });
});

require __DIR__ . '/auth.php';
