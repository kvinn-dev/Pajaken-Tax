<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminVehicleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReminderController;

Route::redirect('/', '/login');

Route::middleware(['auth'])->group(function () {
    // User Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllRead'])->name('notifications.markAllRead');

    Route::middleware('role:user')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/dashboard/verify-nik', [DashboardController::class, 'verifyNik'])->name('verify.nik');
        Route::post('/dashboard/reset-nik', [DashboardController::class, 'resetNik'])->name('reset.nik');

        Route::get('/about', [DashboardController::class, 'about'])->name('about.index');
        
        Route::get('/cek-pajak', [DashboardController::class, 'taxCheck'])->name('tax-check.index');
        // Rute dummy untuk menghindari error saat tombol "Bayar" ditekan
        Route::get('/pembayaran/{id}', function() { return "Halaman Pembayaran sedang dikembangkan."; })->name('payment.create');
        
        // Reminder Resource
        Route::get('/pengingat', [ReminderController::class, 'index'])->name('reminder.index');
        Route::post('/pengingat', [ReminderController::class, 'store'])->name('reminder.store');
    });

    // Admin Routes
    Route::middleware('role:admin')->prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
        
        Route::get('/vehicles', [AdminVehicleController::class, 'index'])->name('admin.vehicles.index');
        Route::post('/vehicles', [AdminVehicleController::class, 'store'])->name('admin.vehicles.store');
        Route::get('/notifications', function() { return "Halaman Push Notifikasi sedang dikembangkan."; })->name('admin.notifications.index');
    });
});

require __DIR__.'/auth.php';
