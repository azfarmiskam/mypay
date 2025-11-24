<?php

use App\Http\Controllers\SuperAdmin\DashboardController;
use App\Http\Controllers\SuperAdmin\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// SuperAdmin Routes
Route::middleware(['web', 'auth', 'superadmin'])->prefix('superadmin')->name('superadmin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profile
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    // Admin Management routes
    Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');
    Route::post('/admins', [AdminController::class, 'store'])->name('admins.store');
    Route::put('/admins/{admin}', [AdminController::class, 'update'])->name('admins.update');
    Route::delete('/admins/{admin}', [AdminController::class, 'destroy'])->name('admins.destroy');
    Route::post('/admins/{admin}/reset-password', [AdminController::class, 'resetPassword'])->name('admins.resetPassword');
    
    // Super Admin Management routes
    Route::post('/superadmins', [AdminController::class, 'storeSuperAdmin'])->name('superadmins.store');
    Route::put('/superadmins/{admin}', [AdminController::class, 'updateSuperAdmin'])->name('superadmins.update');
    Route::delete('/superadmins/{admin}', [AdminController::class, 'destroySuperAdmin'])->name('superadmins.destroy');
    
    // System Settings
    // Route::get('/settings', [SystemSettingsController::class, 'index'])->name('settings.index');
    // Route::post('/settings', [SystemSettingsController::class, 'update'])->name('settings.update');
    
    // Seller Management
    // Route::resource('sellers', SellerController::class);
    
    // Plan Management
    // Route::resource('plans', PlanController::class);
    
    // Analytics
    // Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics.index');
});
