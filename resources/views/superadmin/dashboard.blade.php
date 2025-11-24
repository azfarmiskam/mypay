@extends('layouts.admin')

@section('title', 'Super Admin Dashboard')
@section('page-title', 'Super Admin Dashboard')
@section('page-description', 'Welcome back, ' . auth()->user()->name)

@section('content')
<!-- Metrics Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
    <!-- Total Sellers Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="text-center sm:text-left">
                <p class="text-sm font-medium text-gray-600">{{ __('dashboard.total_sellers') }}</p>
                <h3 class="text-3xl font-bold text-gray-900 mt-2">{{ $metrics['total_sellers'] }}</h3>
                <p class="text-xs text-green-600 mt-2">
                    <i class="fas fa-arrow-up"></i> {{ __('dashboard.active_accounts') }}
                </p>
            </div>
            <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-store text-2xl text-blue-600"></i>
            </div>
        </div>
    </div>

    <!-- Active Subscriptions Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="text-center sm:text-left">
                <p class="text-sm font-medium text-gray-600">{{ __('dashboard.active_subscriptions') }}</p>
                <h3 class="text-3xl font-bold text-gray-900 mt-2">{{ $metrics['active_subscriptions'] }}</h3>
                <p class="text-xs text-green-600 mt-2">
                    <i class="fas fa-arrow-up"></i> {{ __('dashboard.paying_customers') }}
                </p>
            </div>
            <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-credit-card text-2xl text-green-600"></i>
            </div>
        </div>
    </div>

    <!-- Monthly Revenue Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="text-center sm:text-left">
                <p class="text-sm font-medium text-gray-600">{{ __('dashboard.monthly_revenue') }}</p>
                <h3 class="text-3xl font-bold text-gray-900 mt-2">RM {{ number_format($metrics['monthly_revenue'], 2) }}</h3>
                <p class="text-xs text-green-600 mt-2">
                    <i class="fas fa-arrow-up"></i> {{ __('dashboard.this_month') }}
                </p>
            </div>
            <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-dollar-sign text-2xl text-yellow-600"></i>
            </div>
        </div>
    </div>

    <!-- System Health Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="text-center sm:text-left">
                <p class="text-sm font-medium text-gray-600">{{ __('dashboard.system_health') }}</p>
                <h3 class="text-3xl font-bold text-green-600 mt-2">{{ __('dashboard.healthy') }}</h3>
                <p class="text-xs text-gray-500 mt-2">
                    <i class="fas fa-check-circle"></i> {{ __('dashboard.all_systems_operational') }}
                </p>
            </div>
            <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-heartbeat text-2xl text-green-600"></i>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Grid -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Recent Sellers (2/3 width) -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">{{ __('dashboard.recent_seller_registrations') }}</h3>
                <a href="#" class="text-sm text-blue-600 hover:text-blue-700 font-medium">{{ __('dashboard.view_analytics') }}</a>
            </div>
            <div class="p-6">
                @if($recentSellers->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <th class="pb-3">{{ __('dashboard.name') }}</th>
                                    <th class="pb-3">{{ __('dashboard.email') }}</th>
                                    <th class="pb-3">Status</th>
                                    <th class="pb-3">{{ __('dashboard.registered') }}</th>
                                    <th class="pb-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($recentSellers as $seller)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                                <span class="text-sm font-medium text-blue-600">{{ substr($seller->name, 0, 1) }}</span>
                                            </div>
                                            <span class="font-medium text-gray-900">{{ $seller->name }}</span>
                                        </div>
                                    </td>
                                    <td class="py-4 text-sm text-gray-600">{{ $seller->email }}</td>
                                    <td class="py-4">
                                        <span class="px-2 py-1 text-xs font-medium rounded-full 
                                            {{ $seller->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                            {{ ucfirst($seller->status) }}
                                        </span>
                                    </td>
                                    <td class="py-4 text-sm text-gray-600">{{ $seller->created_at->diffForHumans() }}</td>
                                    <td class="py-4">
                                        <button class="text-blue-600 hover:text-blue-700 text-sm font-medium">View</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-12">
                        <i class="fas fa-users text-4xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500">{{ __('dashboard.no_sellers_yet') }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Subscription Plans (1/3 width) -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">{{ __('dashboard.subscription_plans') }}</h3>
            </div>
            <div class="p-6 space-y-4">
                @foreach($plans as $plan)
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                    <div>
                        <p class="font-semibold text-gray-900">{{ $plan->name }}</p>
                        <p class="text-sm text-gray-600">RM {{ number_format($plan->price, 2) }}{{ __('dashboard.per_month') }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl font-bold text-blue-600">0</p>
                        <p class="text-xs text-gray-500">subscribers</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-xl shadow-sm p-6 mt-6 text-white">
            <h3 class="text-lg font-semibold mb-4">{{ __('dashboard.quick_actions') }}</h3>
            <div class="space-y-3">
                <a href="#" class="flex items-center p-3 bg-white bg-opacity-20 rounded-lg hover:bg-opacity-30 transition">
                    <i class="fas fa-user-plus w-5"></i>
                    <span class="ml-3 text-sm font-medium">{{ __('dashboard.add_new_admin') }}</span>
                </a>
                <a href="#" class="flex items-center p-3 bg-white bg-opacity-20 rounded-lg hover:bg-opacity-30 transition">
                    <i class="fas fa-store-alt w-5"></i>
                    <span class="ml-3 text-sm font-medium">{{ __('dashboard.create_seller') }}</span>
                </a>
                <a href="#" class="flex items-center p-3 bg-white bg-opacity-20 rounded-lg hover:bg-opacity-30 transition">
                    <i class="fas fa-tags w-5"></i>
                    <span class="ml-3 text-sm font-medium">{{ __('dashboard.manage_plans') }}</span>
                </a>
                <a href="#" class="flex items-center p-3 bg-white bg-opacity-20 rounded-lg hover:bg-opacity-30 transition">
                    <i class="fas fa-cog w-5"></i>
                    <span class="ml-3 text-sm font-medium">{{ __('dashboard.system_settings') }}</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
