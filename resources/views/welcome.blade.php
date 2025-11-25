<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyPay - {{ __('landing.hero_title_1') }} {{ __('landing.hero_title_2') }}</title>
    <meta name="description"
        content="{{ __('landing.hero_subtitle') }}">
    <link rel="icon" type="image/png" href="/favicon.png?v={{ time() }}">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico?v={{ time() }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f4ff',
                            100: '#e0e9ff',
                            200: '#c7d6fe',
                            300: '#a5bbfc',
                            400: '#8199f8',
                            500: '#6577f3',
                            600: '#4f5de7',
                            700: '#4148cc',
                            800: '#373ea5',
                            900: '{{ $themeColors["main"] ?? "#1E3A8A" }}',
                            950: '#1e2555',
                        },
                        secondary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '{{ $themeColors["third"] ?? "#60A5FA" }}',
                            500: '{{ $themeColors["secondary"] ?? "#3b82f6" }}',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                            950: '#172554',
                        },
                    },
                }
            }
        }
    </script>
    <style>
        :root {
            --color-main: {{ $themeColors['main'] ?? '#1E3A8A' }};
            --color-secondary: {{ $themeColors['secondary'] ?? '#3b82f6' }};
            --color-third: {{ $themeColors['third'] ?? '#60A5FA' }};
        }
        
        body {
            font-family: 'Inter', system-ui, sans-serif;
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, var(--color-main) 0%, var(--color-third) 100%);
        }

        .bg-gradient-secondary {
            background: linear-gradient(135deg, var(--color-third) 0%, var(--color-secondary) 100%);
        }

        .text-gradient {
            background: linear-gradient(135deg, var(--color-main) 0%, var(--color-third) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        @keyframes wiggle {
            0%, 100% { transform: rotate(-3deg); }
            50% { transform: rotate(3deg); }
        }

        .animate-wiggle {
            animation: wiggle 1s ease-in-out infinite;
        }
    </style>
</head>

<body class="bg-white">
    <!-- Navigation -->
    <nav class="fixed w-full bg-white/95 backdrop-blur-sm shadow-sm z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-gradient-primary rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-xl">M</span>
                    </div>
                    <span class="text-2xl font-bold text-primary-900">MyPay</span>
                </div>
                <div class="hidden md:flex items-center space-x-6">
                    <a href="#features"
                        class="text-gray-700 hover:text-primary-900 font-medium transition">{{ __('landing.nav_features') }}</a>
                    <a href="#pricing" class="text-gray-700 hover:text-primary-900 font-medium transition">{{ __('landing.nav_pricing') }}</a>
                    <a href="#testimonials"
                        class="text-gray-700 hover:text-primary-900 font-medium transition">{{ __('landing.nav_testimonials') }}</a>
                    <x-language-switcher />
                    
                    @auth
                        @if(auth()->user()->role === 'superadmin' || auth()->user()->role === 'admin')
                            <a href="{{ route('superadmin.dashboard') }}" class="text-primary-900 hover:text-primary-700 font-medium transition">Dashboard</a>
                        @else
                            <a href="{{ route('dashboard') }}" class="text-primary-900 hover:text-primary-700 font-medium transition">Dashboard</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="bg-primary-900 text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-primary-800 transition shadow-md hover:shadow-lg">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="/login" class="text-primary-900 hover:text-primary-700 font-medium transition">{{ __('landing.nav_login') }}</a>
                        <a href="/register"
                            class="bg-primary-900 text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-primary-800 transition shadow-md hover:shadow-lg">
                            {{ __('landing.nav_register') }}
                        </a>
                    @endauth
                </div>
                <button class="md:hidden text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 bg-gradient-to-br from-primary-50 via-white to-secondary-50">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="animate-fade-in">
                    <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                        {{ __('landing.hero_title_1') }}
                        <span class="text-gradient">{{ __('landing.hero_title_2') }}</span>
                    </h1>
                    <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                        {{ __('landing.hero_subtitle') }}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/register"
                            class="bg-primary-900 text-white px-8 py-4 rounded-lg font-semibold hover:bg-primary-800 transition shadow-lg hover:shadow-xl text-center">
                            {{ __('landing.hero_cta_start') }}
                        </a>
                        <a href="#features"
                            class="border-2 border-primary-900 text-primary-900 px-8 py-4 rounded-lg font-semibold hover:bg-primary-900 hover:text-white transition text-center">
                            {{ __('landing.hero_cta_learn') }}
                        </a>
                    </div>
                    <div class="mt-8 flex items-center space-x-6 text-sm text-gray-600">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>{{ __('landing.hero_trial') }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>{{ __('landing.hero_no_card') }}</span>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="bg-white rounded-2xl shadow-2xl p-4 transition-all duration-300 hover:rotate-3 hover:scale-105">
                        <img src="/images/dashboard-preview.png"
                            alt="Dashboard Preview" class="rounded-lg w-full">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-primary-900">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center text-white">
                <div>
                    <p class="text-4xl md:text-5xl font-bold mb-2">1,000+</p>
                    <p class="text-secondary-200">{{ __('landing.stats_users') }}</p>
                </div>
                <div>
                    <p class="text-4xl md:text-5xl font-bold mb-2">RM 5J+</p>
                    <p class="text-secondary-200">{{ __('landing.stats_sales') }}</p>
                </div>
                <div>
                    <p class="text-4xl md:text-5xl font-bold mb-2">99.9%</p>
                    <p class="text-secondary-200">{{ __('landing.stats_uptime') }}</p>
                </div>
                <div>
                    <p class="text-4xl md:text-5xl font-bold mb-2">24/7</p>
                    <p class="text-secondary-200">{{ __('landing.stats_support') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">{{ __('landing.features_title') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    {{ __('landing.features_subtitle') }}
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature Cards - 6 features total -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition border border-gray-100">
                    <div class="w-14 h-14 bg-gradient-primary rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __('landing.feature_products_title') }}</h3>
                    <p class="text-gray-600 leading-relaxed">
                        {{ __('landing.feature_products_desc') }}
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition border border-gray-100">
                    <div class="w-14 h-14 bg-gradient-secondary rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __('landing.feature_payment_title') }}</h3>
                    <p class="text-gray-600 leading-relaxed">
                        {{ __('landing.feature_payment_desc') }}
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition border border-gray-100">
                    <div class="w-14 h-14 bg-gradient-primary rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __('landing.feature_whatsapp_title') }}</h3>
                    <p class="text-gray-600 leading-relaxed">
                        {{ __('landing.feature_whatsapp_desc') }}
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition border border-gray-100">
                    <div class="w-14 h-14 bg-gradient-secondary rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __('landing.feature_invoice_title') }}</h3>
                    <p class="text-gray-600 leading-relaxed">
                        {{ __('landing.feature_invoice_desc') }}
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition border border-gray-100">
                    <div class="w-14 h-14 bg-gradient-primary rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __('landing.feature_builder_title') }}</h3>
                    <p class="text-gray-600 leading-relaxed">
                        {{ __('landing.feature_builder_desc') }}
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition border border-gray-100">
                    <div class="w-14 h-14 bg-gradient-secondary rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __('landing.feature_analytics_title') }}</h3>
                    <p class="text-gray-600 leading-relaxed">
                        {{ __('landing.feature_analytics_desc') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-20 bg-gradient-to-br from-gray-50 to-secondary-50" x-data="{
        currency: 'RM',
        rates: {
            'RM': 1,
            'USD': 0.22,
            'RP': 3500,
            'SGD': 0.30
        },
        symbols: {
            'RM': 'RM',
            'USD': '$',
            'RP': 'Rp',
            'SGD': 'S$'
        },
        convert(amount) {
            return Math.round(amount * this.rates[this.currency]);
        },
        format(amount) {
            const converted = this.convert(amount);
            if (this.currency === 'RP') {
                // Format RP dynamically: M for millions, K for thousands
                if (converted >= 1000000) {
                    const inMillions = (converted / 1000000).toFixed(1).replace('.0', '');
                    return this.symbols[this.currency] + inMillions + 'M';
                } else if (converted >= 1000) {
                    const inThousands = Math.round(converted / 1000);
                    return this.symbols[this.currency] + inThousands + 'K';
                } else {
                    return this.symbols[this.currency] + converted;
                }
            }
            return this.symbols[this.currency] + converted.toLocaleString();
        }
    }">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">{{ __('landing.pricing_title') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    {{ __('landing.pricing_subtitle') }}
                </p>
                
                <!-- Currency Switcher -->
                <div class="mt-8 flex justify-center">
                    <div class="inline-flex rounded-lg border border-gray-300 bg-white p-1 shadow-sm">
                        <button @click="currency = 'RM'" 
                                :class="currency === 'RM' ? 'bg-primary-900 text-white' : 'text-gray-700 hover:bg-gray-100'"
                                class="px-4 py-2 rounded-md font-medium transition">
                            RM
                        </button>
                        <button @click="currency = 'USD'" 
                                :class="currency === 'USD' ? 'bg-primary-900 text-white' : 'text-gray-700 hover:bg-gray-100'"
                                class="px-4 py-2 rounded-md font-medium transition">
                            USD
                        </button>
                        <button @click="currency = 'RP'" 
                                :class="currency === 'RP' ? 'bg-primary-900 text-white' : 'text-gray-700 hover:bg-gray-100'"
                                class="px-4 py-2 rounded-md font-medium transition">
                            RP
                        </button>
                        <button @click="currency = 'SGD'" 
                                :class="currency === 'SGD' ? 'bg-primary-900 text-white' : 'text-gray-700 hover:bg-gray-100'"
                                class="px-4 py-2 rounded-md font-medium transition">
                            SGD
                        </button>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-4 gap-8 max-w-7xl mx-auto">
                <!-- Free Plan -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Percuma</h3>
                    <p class="text-gray-600 mb-6">{{ __('landing.pricing_for_starter') }}</p>
                    <div class="mb-6 h-24 flex flex-col justify-center">
                        <span class="text-5xl font-bold text-primary-900" x-text="format(0)"></span>
                        <span class="text-gray-600">{{ __('landing.pricing_per_month') }}</span>
                    </div>
                    <hr class="border-gray-200 mb-6">
                    <ul class="space-y-4 mb-8 min-h-[180px]">
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">3 {{ __('landing.pricing_products') }}</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">1 {{ __('landing.pricing_landing_page') }}</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">20 Email{{ __('landing.pricing_per_month') }}</span>
                        </li>
                    </ul>
                    <a href="/register"
                        class="block w-full text-center bg-gray-100 text-gray-900 py-3 rounded-lg font-semibold hover:bg-gray-200 transition">
                        {{ __('landing.pricing_start_free') }}
                    </a>
                </div>

                <!-- Basic Plan -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Basic</h3>
                    <p class="text-gray-600 mb-6">{{ __('landing.pricing_for_small') }}</p>
                    <div class="mb-6 h-24 flex flex-col justify-center">
                        <span class="text-5xl font-bold text-primary-900" x-text="format(60)"></span>
                        <span class="text-gray-600">{{ __('landing.pricing_per_month') }}</span>
                    </div>
                    <hr class="border-gray-200 mb-6">
                    <ul class="space-y-4 mb-8 min-h-[180px]">
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">15 {{ __('landing.pricing_products') }}</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">{{ __('landing.pricing_whatsapp') }}</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">100 Email{{ __('landing.pricing_per_month') }}</span>
                        </li>
                    </ul>
                    <a href="/register"
                        class="block w-full text-center bg-primary-900 text-white py-3 rounded-lg font-semibold hover:bg-primary-800 transition shadow-md hover:shadow-lg">
                        {{ __('landing.pricing_choose') }} Basic
                    </a>
                </div>

                <!-- Pro Plan (POPULAR) -->
                <div class="bg-gradient-primary rounded-2xl p-8 shadow-2xl transform md:scale-105 relative transition-all duration-300 hover:scale-110">
                    <div
                        class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-secondary-400 text-white px-4 py-1 rounded-full text-sm font-semibold">
                        {{ __('landing.pricing_popular') }}
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-2 flex items-center gap-2">
                        Pro
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                        </svg>
                    </h3>
                    <p class="text-secondary-100 mb-6">{{ __('landing.pricing_for_medium') }}</p>
                    <div class="mb-6 h-24 flex flex-col justify-center">
                        <span class="text-5xl font-bold text-white" x-text="format(300)"></span>
                        <span class="text-secondary-100">{{ __('landing.pricing_per_month') }}</span>
                    </div>
                    <hr class="border-secondary-300 mb-6">
                    <ul class="space-y-4 mb-8 min-h-[180px]">
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-secondary-300 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-white">250 {{ __('landing.pricing_products') }}</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-secondary-300 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-white">{{ __('landing.pricing_branding') }}</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-secondary-300 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-white">1,000 Email{{ __('landing.pricing_per_month') }}</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-secondary-300 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-white">{{ __('landing.pricing_domain') }}</span>
                        </li>
                    </ul>
                    <a href="/register"
                        class="block w-full text-center bg-white text-primary-900 py-3 rounded-lg font-semibold hover:bg-gray-100 transition shadow-md hover:shadow-lg">
                        {{ __('landing.pricing_choose') }} Pro
                    </a>
                </div>

                <!-- Max Plan -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105 border-2 border-yellow-400">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2 flex items-center gap-2">
                        Max
                        <svg class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M5 16L3 5L8.5 10L12 4L15.5 10L21 5L19 16M19 19H5V21H19V19Z"/>
                        </svg>
                    </h3>
                    <p class="text-gray-600 mb-6">{{ __('landing.pricing_for_large') }}</p>
                    <div class="mb-6 h-24 flex flex-col justify-center">
                        <span class="text-5xl font-bold text-primary-900" x-text="format(4000)"></span>
                        <span class="text-gray-600">{{ __('landing.pricing_per_month') }}</span>
                    </div>
                    <hr class="border-gray-200 mb-6">
                    <ul class="space-y-4 mb-8 min-h-[180px]">
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">500 {{ __('landing.pricing_products') }}</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">{{ __('landing.pricing_ads') }}</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">5,000 Email{{ __('landing.pricing_per_month') }}</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">5 {{ __('landing.pricing_users') }}</span>
                        </li>
                    </ul>
                    <a href="/register"
                        class="block w-full text-center bg-yellow-400 text-gray-900 py-3 rounded-lg font-semibold hover:bg-yellow-500 transition shadow-md hover:shadow-lg">
                        {{ __('landing.pricing_choose') }} Max
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">{{ __('landing.testimonials_title') }}</h2>
                <p class="text-xl text-gray-600">{{ __('landing.testimonials_subtitle') }}</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-50 rounded-2xl p-8 transition-all duration-300 hover:scale-105 hover:rotate-2 hover:shadow-xl">
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            ★★★★★
                        </div>
                    </div>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        "{{ __('landing.testimonial_1_text') }}"
                    </p>
                    <div class="flex items-center">
                        <div
                            class="w-12 h-12 bg-gradient-primary rounded-full flex items-center justify-center text-white font-bold">
                            A
                        </div>
                        <div class="ml-4">
                            <p class="font-semibold text-gray-900">{{ __('landing.testimonial_1_name') }}</p>
                            <p class="text-sm text-gray-600">{{ __('landing.testimonial_1_role') }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-2xl p-8 transition-all duration-300 hover:scale-105 hover:-rotate-2 hover:shadow-xl">
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            ★★★★★
                        </div>
                    </div>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        "{{ __('landing.testimonial_2_text') }}"
                    </p>
                    <div class="flex items-center">
                        <div
                            class="w-12 h-12 bg-gradient-secondary rounded-full flex items-center justify-center text-white font-bold">
                            S
                        </div>
                        <div class="ml-4">
                            <p class="font-semibold text-gray-900">{{ __('landing.testimonial_2_name') }}</p>
                            <p class="text-sm text-gray-600">{{ __('landing.testimonial_2_role') }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-2xl p-8 transition-all duration-300 hover:scale-105 hover:rotate-2 hover:shadow-xl">
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            ★★★★★
                        </div>
                    </div>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        "{{ __('landing.testimonial_3_text') }}"
                    </p>
                    <div class="flex items-center">
                        <div
                            class="w-12 h-12 bg-gradient-primary rounded-full flex items-center justify-center text-white font-bold">
                            M
                        </div>
                        <div class="ml-4">
                            <p class="font-semibold text-gray-900">{{ __('landing.testimonial_3_name') }}</p>
                            <p class="text-sm text-gray-600">{{ __('landing.testimonial_3_role') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-primary">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                {{ __('landing.cta_title') }}
            </h2>
            <p class="text-xl text-secondary-100 mb-8 max-w-2xl mx-auto">
                {{ __('landing.cta_subtitle') }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/register"
                    class="bg-white text-primary-900 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition shadow-lg hover:shadow-xl animate-wiggle hover:animate-none">
                    {{ __('landing.cta_register') }}
                </a>
                <a href="#features"
                    class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-primary-900 transition">
                    {{ __('landing.cta_learn_more') }}
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-12">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-10 h-10 bg-gradient-primary rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-xl">M</span>
                        </div>
                        <span class="text-2xl font-bold text-white">MyPay</span>
                    </div>
                    <p class="text-gray-400">
                        {{ __('landing.footer_tagline') }}
                    </p>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">{{ __('landing.pricing_products') }}</h4>
                    <ul class="space-y-2">
                        <li><a href="#features" class="hover:text-white transition">{{ __('landing.footer_features') }}</a></li>
                        <li><a href="#pricing" class="hover:text-white transition">{{ __('landing.footer_pricing') }}</a></li>
                        <li><a href="#" class="hover:text-white transition">{{ __('landing.footer_integrations') }}</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">{{ __('landing.footer_company') }}</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white transition">{{ __('landing.footer_about') }}</a></li>
                        <li><a href="#" class="hover:text-white transition">{{ __('landing.footer_contact') }}</a></li>
                        <li><a href="#" class="hover:text-white transition">{{ __('landing.footer_blog') }}</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">{{ __('landing.footer_support') }}</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white transition">{{ __('landing.footer_help') }}</a></li>
                        <li><a href="#" class="hover:text-white transition">{{ __('landing.footer_docs') }}</a></li>
                        <li><a href="#" class="hover:text-white transition">{{ __('landing.footer_status') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                <p>© 2025 MyPay. {{ __('landing.footer_copyright') }}</p>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>
</body>

</html>





