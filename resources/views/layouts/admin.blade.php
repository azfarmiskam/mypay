<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard') - {{ config('app.name', 'MyPay') }} Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Compiled Assets (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-50" x-data="{
    sidebarOpen: true,
    activeSection: '{{ session('activeSection', 'dashboard') }}',
    showAddModal: false,
    showEditModal: false,
    showDeleteModal: false,
    editAdmin: {},
    deleteAdmin: {}
}">
    <div class="min-h-screen">
        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'w-64' : 'w-20'" class="fixed inset-y-0 left-0 bg-gradient-to-b from-blue-900 to-blue-800 text-white shadow-xl z-50 transition-all duration-300">
            <!-- Logo -->
            <div class="flex items-center justify-center h-16 bg-blue-950 border-b border-blue-700 px-4">
                <h1 class="text-2xl font-bold">
                    <span class="text-blue-300">My</span><span class="text-white">Pay</span>
                </h1>
            </div>

            <!-- Toggle Button -->
            <div class="flex justify-end px-4 py-1">
                <button @click="sidebarOpen = !sidebarOpen" class="p-1.5 rounded-md hover:bg-blue-700 transition">
                    <i :class="sidebarOpen ? 'fas fa-chevron-left' : 'fas fa-chevron-right'" class="text-white text-xs"></i>
                </button>
            </div>

            <!-- Navigation Menu -->
            <nav class="flex-1 px-4 py-2">
                <!-- Dashboard -->
                <div class="relative group">
                    <button @click="activeSection = 'dashboard'" class="w-full flex items-center px-4 py-3 mb-2 rounded-lg text-blue-100 hover:bg-blue-700 transition" :class="{ 'bg-blue-700': activeSection === 'dashboard' }">
                        <i class="fas fa-chart-line w-5"></i>
                        <span x-show="sidebarOpen" class="ml-3 font-medium transition-opacity duration-300">{{ __('dashboard.dashboard') }}</span>
                    </button>
                    <div x-show="!sidebarOpen" class="absolute left-full ml-2 px-3 py-2 bg-gray-900 text-white text-sm rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap top-0">
                        {{ __('dashboard.dashboard') }}
                    </div>
                </div>

                <!-- System Settings -->
                <div class="relative group">
                    <button @click="activeSection = 'settings'" class="w-full flex items-center px-4 py-3 mb-2 rounded-lg text-blue-100 hover:bg-blue-700 transition" :class="{ 'bg-blue-700': activeSection === 'settings' }">
                        <i class="fas fa-cog w-5"></i>
                        <span x-show="sidebarOpen" class="ml-3 transition-opacity duration-300">{{ __('dashboard.system_settings') }}</span>
                    </button>
                    <div x-show="!sidebarOpen" class="absolute left-full ml-2 px-3 py-2 bg-gray-900 text-white text-sm rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap top-0">
                        {{ __('dashboard.system_settings') }}
                    </div>
                </div>

                <!-- Admins -->
                <div class="relative group">
                    <button @click="activeSection = 'admins'" class="w-full flex items-center px-4 py-3 mb-2 rounded-lg text-blue-100 hover:bg-blue-700 transition" :class="{ 'bg-blue-700': activeSection === 'admins' }">
                        <i class="fas fa-users-cog w-5"></i>
                        <span x-show="sidebarOpen" class="ml-3 transition-opacity duration-300">{{ __('dashboard.admins') }}</span>
                    </button>
                    <div x-show="!sidebarOpen" class="absolute left-full ml-2 px-3 py-2 bg-gray-900 text-white text-sm rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap top-0">
                        {{ __('dashboard.admins') }}
                    </div>
                </div>

                <!-- Sellers -->
                <div class="relative group">
                    <button @click="activeSection = 'sellers'" class="w-full flex items-center px-4 py-3 mb-2 rounded-lg text-blue-100 hover:bg-blue-700 transition" :class="{ 'bg-blue-700': activeSection === 'sellers' }">
                        <i class="fas fa-store w-5"></i>
                        <span x-show="sidebarOpen" class="ml-3 transition-opacity duration-300">{{ __('dashboard.sellers') }}</span>
                    </button>
                    <div x-show="!sidebarOpen" class="absolute left-full ml-2 px-3 py-2 bg-gray-900 text-white text-sm rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap top-0">
                        {{ __('dashboard.sellers') }}
                    </div>
                </div>

                <!-- Plans -->
                <div class="relative group">
                    <button @click="activeSection = 'plans'" class="w-full flex items-center px-4 py-3 mb-2 rounded-lg text-blue-100 hover:bg-blue-700 transition" :class="{ 'bg-blue-700': activeSection === 'plans' }">
                        <i class="fas fa-tags w-5"></i>
                        <span x-show="sidebarOpen" class="ml-3 transition-opacity duration-300">{{ __('dashboard.plans') }}</span>
                    </button>
                    <div x-show="!sidebarOpen" class="absolute left-full ml-2 px-3 py-2 bg-gray-900 text-white text-sm rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap top-0">
                        {{ __('dashboard.plans') }}
                    </div>
                </div>

                <!-- Analytics -->
                <div class="relative group">
                    <button @click="activeSection = 'analytics'" class="w-full flex items-center px-4 py-3 mb-2 rounded-lg text-blue-100 hover:bg-blue-700 transition" :class="{ 'bg-blue-700': activeSection === 'analytics' }">
                        <i class="fas fa-chart-bar w-5"></i>
                        <span x-show="sidebarOpen" class="ml-3 transition-opacity duration-300">{{ __('dashboard.analytics') }}</span>
                    </button>
                    <div x-show="!sidebarOpen" class="absolute left-full ml-2 px-3 py-2 bg-gray-900 text-white text-sm rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap top-0">
                        {{ __('dashboard.analytics') }}
                    </div>
                </div>
            </nav>

            <!-- User Section -->
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-blue-700">
                <div class="flex items-center" :class="sidebarOpen ? 'justify-start' : 'justify-center'">
                    <!-- Avatar (clickable) -->
                    <button @click="$dispatch('open-profile-modal')" class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center flex-shrink-0 hover:ring-2 hover:ring-blue-400 transition">
                        @if(auth()->user()->avatar)
                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Avatar" class="w-full h-full rounded-full object-cover">
                        @else
                            <i class="fas fa-user text-white"></i>
                        @endif
                    </button>
                    <div x-show="sidebarOpen" class="ml-3 flex-1 transition-opacity duration-300">
                        <p class="text-sm font-medium">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-blue-300">{{ __('dashboard.superadmin') }}</p>
                    </div>
                    <form x-show="sidebarOpen" method="POST" action="{{ route('logout') }}" class="transition-opacity duration-300">
                        @csrf
                        <button type="submit" class="text-blue-300 hover:text-white">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div :class="sidebarOpen ? 'ml-64' : 'ml-20'" class="transition-all duration-300">
            <!-- Top Bar -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="px-8 py-4 flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">@yield('page-title', __('dashboard.dashboard'))</h2>
                        <p class="text-sm text-gray-600 mt-1">@yield('page-description', __('dashboard.welcome_back'))</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <!-- Language Switcher -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="flex items-center space-x-2 px-3 py-2 rounded-lg hover:bg-gray-100 transition">
                                <i class="fas fa-globe text-gray-600"></i>
                                <span class="text-sm font-medium text-gray-700">{{ strtoupper(app()->getLocale()) }}</span>
                                <i class="fas fa-chevron-down text-xs text-gray-500"></i>
                            </button>
                            <div x-show="open" @click.away="open = false" x-cloak class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-2 z-50">
                                <a href="{{ route('lang.switch', 'en') }}" class="flex items-center px-4 py-2 hover:bg-gray-100 transition {{ app()->getLocale() == 'en' ? 'bg-blue-50' : '' }}">
                                    <span class="mr-2">🇬🇧</span>
                                    <span class="text-sm">English</span>
                                </a>
                                <a href="{{ route('lang.switch', 'ms') }}" class="flex items-center px-4 py-2 hover:bg-gray-100 transition {{ app()->getLocale() == 'ms' ? 'bg-blue-50' : '' }}">
                                    <span class="mr-2">🇲🇾</span>
                                    <span class="text-sm">Bahasa Melayu</span>
                                </a>
                                <a href="{{ route('lang.switch', 'id') }}" class="flex items-center px-4 py-2 hover:bg-gray-100 transition {{ app()->getLocale() == 'id' ? 'bg-blue-50' : '' }}">
                                    <span class="mr-2">🇮🇩</span>
                                    <span class="text-sm">Bahasa Indonesia</span>
                                </a>
                                <a href="{{ route('lang.switch', 'zh') }}" class="flex items-center px-4 py-2 hover:bg-gray-100 transition {{ app()->getLocale() == 'zh' ? 'bg-blue-50' : '' }}">
                                    <span class="mr-2">🇨🇳</span>
                                    <span class="text-sm">中文</span>
                                </a>
                            </div>
                        </div>

                        <!-- Notifications -->
                        <button class="relative p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition">
                            <i class="fas fa-bell text-xl"></i>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>

                        <!-- Current Time with Tooltip -->
                        <div class="relative group">
                            <div class="text-sm text-gray-600 cursor-pointer">
                                <i class="far fa-clock mr-2"></i>
                                <span id="current-time"></span>
                            </div>
                            <!-- Tooltip (appears below) -->
                            <div class="absolute right-0 top-full mt-2 px-4 py-3 bg-gray-900 text-white text-sm rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap shadow-lg z-50">
                                <div class="font-semibold" id="tooltip-day"></div>
                                <div id="tooltip-date"></div>
                                <div class="text-blue-300 mt-1" id="tooltip-time"></div>
                                <!-- Arrow pointing up -->
                                <div class="absolute bottom-full right-4 w-0 h-0 border-l-4 border-r-4 border-b-4 border-transparent border-b-gray-900"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-8">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        // Update time every second
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('en-US', {
                hour: '2-digit',
                minute: '2-digit',
                hour12: true
            });

            // Update clock display
            document.getElementById('current-time').textContent = timeString;

            // Update tooltip
            const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

            const dayName = days[now.getDay()];
            const monthName = months[now.getMonth()];
            const date = now.getDate();
            const year = now.getFullYear();

            const fullTimeString = now.toLocaleTimeString('en-US', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: true
            });

            document.getElementById('tooltip-day').textContent = dayName;
            document.getElementById('tooltip-date').textContent = `${monthName} ${date}, ${year}`;
            document.getElementById('tooltip-time').textContent = fullTimeString;
        }

        updateTime();
        setInterval(updateTime, 1000);
    </script>
    
    <!-- Profile Modal -->
    @include('components.profile-modal')
    
    @stack('scripts')
</body>
</html>
