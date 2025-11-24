<!-- Dashboard Metrics Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
    <!-- Total Sellers Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between">
            <div class="flex-1">
                <p class="text-sm font-medium text-gray-600">{{ __('dashboard.total_sellers') }}</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalSellers }}</p>
                <p class="text-sm text-gray-500 mt-1">{{ __('dashboard.active_accounts') }}</p>
            </div>
            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-store text-2xl text-blue-600"></i>
            </div>
        </div>
    </div>

    <!-- Active Subscriptions Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between">
            <div class="flex-1">
                <p class="text-sm font-medium text-gray-600">{{ __('dashboard.active_subscriptions') }}</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $activeSubscriptions }}</p>
                <p class="text-sm text-gray-500 mt-1">{{ __('dashboard.paying_customers') }}</p>
            </div>
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-users text-2xl text-green-600"></i>
            </div>
        </div>
    </div>

    <!-- Monthly Revenue Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between">
            <div class="flex-1">
                <p class="text-sm font-medium text-gray-600">{{ __('dashboard.monthly_revenue') }}</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">RM {{ number_format($monthlyRevenue, 2) }}</p>
                <p class="text-sm text-gray-500 mt-1">{{ __('dashboard.this_month') }}</p>
            </div>
            <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-dollar-sign text-2xl text-yellow-600"></i>
            </div>
        </div>
    </div>

    <!-- System Health Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between">
            <div class="flex-1">
                <p class="text-sm font-medium text-gray-600">{{ __('dashboard.system_health') }}</p>
                <p class="text-3xl font-bold text-green-600 mt-2">{{ __('dashboard.healthy') }}</p>
                <p class="text-sm text-gray-500 mt-1">{{ __('dashboard.all_systems_operational') }}</p>
            </div>
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-heartbeat text-2xl text-green-600"></i>
            </div>
        </div>
    </div>
</div>

<!-- Recent Seller Registrations & Subscription Plans -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <!-- Recent Seller Registrations -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('dashboard.recent_seller_registrations') }}</h3>
        <div class="space-y-4">
            @foreach($recentSellers as $seller)
            <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-0">
                <div>
                    <p class="font-medium text-gray-900">{{ $seller->name }}</p>
                    <p class="text-sm text-gray-500">{{ $seller->email }}</p>
                </div>
                <div class="text-right">
                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                        {{ ucfirst($seller->status) }}
                    </span>
                    <p class="text-xs text-gray-500 mt-1">{{ $seller->created_at->format('M d, Y') }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Subscription Plans -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('dashboard.subscription_plans') }}</h3>
        <div class="space-y-4">
            @foreach($plans as $plan)
            <div class="p-4 border border-gray-200 rounded-lg hover:border-blue-300 transition">
                <div class="flex items-center justify-between mb-2">
                    <h4 class="font-semibold text-gray-900">{{ $plan->name }}</h4>
                    <span class="text-lg font-bold text-blue-600">RM {{ number_format($plan->price, 2) }}{{ __('dashboard.per_month') }}</span>
                </div>
                <p class="text-sm text-gray-600">{{ $plan->description }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('dashboard.quick_actions') }}</h3>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <button @click="activeSection = 'admins'; showAddModal = true" class="p-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition text-center">
            <i class="fas fa-user-plus text-2xl text-blue-600 mb-2"></i>
            <p class="text-sm font-medium text-gray-700">{{ __('dashboard.add_new_admin') }}</p>
        </button>
        <button class="p-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-green-500 hover:bg-green-50 transition text-center">
            <i class="fas fa-store text-2xl text-green-600 mb-2"></i>
            <p class="text-sm font-medium text-gray-700">{{ __('dashboard.create_seller') }}</p>
        </button>
        <button class="p-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-yellow-500 hover:bg-yellow-50 transition text-center">
            <i class="fas fa-tags text-2xl text-yellow-600 mb-2"></i>
            <p class="text-sm font-medium text-gray-700">{{ __('dashboard.manage_plans') }}</p>
        </button>
        <button class="p-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-purple-500 hover:bg-purple-50 transition text-center">
            <i class="fas fa-cog text-2xl text-purple-600 mb-2"></i>
            <p class="text-sm font-medium text-gray-700">{{ __('dashboard.system_settings') }}</p>
        </button>
    </div>
</div>
