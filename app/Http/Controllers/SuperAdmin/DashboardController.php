<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Plan;
use App\Models\SystemSetting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display SuperAdmin dashboard
     */
    public function index()
    {
        // Dashboard metrics
        $totalSellers = User::where('role', 'seller')->count();
        $activeSubscriptions = 0; // Placeholder until Subscription model is created
        $monthlyRevenue = 0; // Placeholder until SubscriptionPayment model is created
        
        $recentSellers = User::where('role', 'seller')
            ->latest()
            ->take(5)
            ->get();
        
        $plans = Plan::all();

        // Admin management data
        $admins = User::where('role', 'admin')
            ->orderBy('created_at', 'desc')
            ->get();

        // Get system settings
        $settings = SystemSetting::firstOrCreate([]);

        return view('superadmin.dashboard', compact(
            'totalSellers',
            'activeSubscriptions',
            'monthlyRevenue',
            'recentSellers',
            'plans',
            'admins',
            'settings'
        ));
    }
}
