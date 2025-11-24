<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display SuperAdmin dashboard
     */
    public function index()
    {
        // Get dashboard metrics
        $metrics = [
            'total_sellers' => \App\Models\User::sellers()->count(),
            'active_subscriptions' => 0, // Will be implemented when Subscription model is ready
            'monthly_revenue' => 0, // Will be calculated from subscription payments
            'system_health' => 'Healthy', // Can be enhanced with actual health checks
        ];

        // Get recent seller registrations (last 10)
        $recentSellers = \App\Models\User::sellers()
            ->latest()
            ->take(10)
            ->get();

        // Get all plans with subscription counts
        $plans = \App\Models\Plan::active()
            ->visible()
            ->orderBy('sort_order')
            ->get();

        return view('superadmin.dashboard', compact('metrics', 'recentSellers', 'plans'));
    }
}
