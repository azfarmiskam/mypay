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
<body class="font-sans antialiased bg-gray-50" x-data="{ sidebarOpen: true }">
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

            <!-- Navigation -->
            <nav class="px-4">
                <!-- Dashboard -->
                <div class="relative group">
                    <a href="{{ route('superadmin.dashboard') }}" class="flex items-center px-4 py-3 mb-2 rounded-lg bg-blue-700 text-white">
                        <i class="fas fa-chart-line w-5"></i>
                        <span x-show="sidebarOpen" class="ml-3 font-medium transition-opacity duration-300">Dashboard</span>
                    </a>
                    <div x-show="!sidebarOpen" class="absolute left-full ml-2 px-3 py-2 bg-gray-900 text-white text-sm rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap top-0">
                        Dashboard
                    </div>
                </div>

                <!-- System Settings -->
                <div class="relative group">
                    <a href="#" class="flex items-center px-4 py-3 mb-2 rounded-lg text-blue-100 hover:bg-blue-700 transition">
                        <i class="fas fa-cog w-5"></i>
                        <span x-show="sidebarOpen" class="ml-3 transition-opacity duration-300">System Settings</span>
                    </a>
                    <div x-show="!sidebarOpen" class="absolute left-full ml-2 px-3 py-2 bg-gray-900 text-white text-sm rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap top-0">
                        System Settings
                    </div>
                </div>

                <!-- Admins -->
                <div class="relative group">
                    <a href="#" class="flex items-center px-4 py-3 mb-2 rounded-lg text-blue-100 hover:bg-blue-700 transition">
                        <i class="fas fa-users-cog w-5"></i>
                        <span x-show="sidebarOpen" class="ml-3 transition-opacity duration-300">Admins</span>
                    </a>
                    <div x-show="!sidebarOpen" class="absolute left-full ml-2 px-3 py-2 bg-gray-900 text-white text-sm rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap top-0">
                        Admins
                    </div>
                </div>

                <!-- Sellers -->
                <div class="relative group">
                    <a href="#" class="flex items-center px-4 py-3 mb-2 rounded-lg text-blue-100 hover:bg-blue-700 transition">
                        <i class="fas fa-store w-5"></i>
                        <span x-show="sidebarOpen" class="ml-3 transition-opacity duration-300">Sellers</span>
                    </a>
                    <div x-show="!sidebarOpen" class="absolute left-full ml-2 px-3 py-2 bg-gray-900 text-white text-sm rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap top-0">
                        Sellers
                    </div>
                </div>

                <!-- Plans -->
                <div class="relative group">
                    <a href="#" class="flex items-center px-4 py-3 mb-2 rounded-lg text-blue-100 hover:bg-blue-700 transition">
                        <i class="fas fa-tags w-5"></i>
                        <span x-show="sidebarOpen" class="ml-3 transition-opacity duration-300">Plans</span>
                    </a>
                    <div x-show="!sidebarOpen" class="absolute left-full ml-2 px-3 py-2 bg-gray-900 text-white text-sm rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap top-0">
                        Plans
                    </div>
                </div>

                <!-- Analytics -->
                <div class="relative group">
                    <a href="#" class="flex items-center px-4 py-3 mb-2 rounded-lg text-blue-100 hover:bg-blue-700 transition">
                        <i class="fas fa-chart-bar w-5"></i>
                        <span x-show="sidebarOpen" class="ml-3 transition-opacity duration-300">Analytics</span>
                    </a>
                    <div x-show="!sidebarOpen" class="absolute left-full ml-2 px-3 py-2 bg-gray-900 text-white text-sm rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap top-0">
                        Analytics
                    </div>
                </div>
            </nav>

            <!-- User Section -->
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-blue-700">
                <div class="flex items-center" :class="sidebarOpen ? 'justify-start' : 'justify-center'">
                    <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-user text-white"></i>
                    </div>
                    <div x-show="sidebarOpen" class="ml-3 flex-1 transition-opacity duration-300">
                        <p class="text-sm font-medium">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-blue-300">SuperAdmin</p>
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
                        <h2 class="text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h2>
                        <p class="text-sm text-gray-600 mt-1">@yield('page-description', 'Welcome back!')</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button class="relative p-2 text-gray-600 hover:text-gray-800">
                            <i class="fas fa-bell text-xl"></i>
                            <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-800">{{ now()->format('l, F j, Y') }}</p>
                            <p class="text-xs text-gray-600">{{ now()->format('g:i A') }}</p>
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

    @stack('scripts')
</body>
</html>
