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
    
    // Admin Management
    Route::resource('admins', AdminController::class)->except(['show', 'create', 'edit']);
    Route::patch('/admins/{admin}/reset-password', [AdminController::class, 'resetPassword'])->name('admins.resetPassword');
    
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
