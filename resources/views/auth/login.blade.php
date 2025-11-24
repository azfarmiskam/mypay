<x-guest-layout>
    <div class="min-h-screen flex relative overflow-hidden">
        <!-- Animated Background Gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-primary-900 via-primary-800 to-secondary-600 animate-gradient"></div>
        
        <!-- Animated Geometric Shapes -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-20 left-20 w-72 h-72 bg-secondary-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
            <div class="absolute top-40 right-20 w-72 h-72 bg-primary-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-40 w-72 h-72 bg-secondary-300 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"></div>
        </div>

        <!-- Language Switcher -->
        <div class="absolute top-6 right-6 z-50">
            <x-language-switcher />
        </div>

        <!-- Main Content Container -->
        <div class="relative z-10 w-full flex items-center justify-center p-4 sm:p-8">
            <div class="w-full max-w-6xl grid lg:grid-cols-2 gap-8 items-center">
                
                <!-- Left Side - Branding & Features -->
                <div class="hidden lg:block text-white space-y-4">
                    <!-- Logo & Title -->
                    <div class="space-y-2">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-2xl transform hover:scale-110 transition-transform duration-300">
                                <span class="text-3xl font-bold bg-gradient-to-br from-primary-900 to-secondary-600 bg-clip-text text-transparent">M</span>
                            </div>
                            <h1 class="text-4xl font-bold">MyPay</h1>
                        </div>
                        <p class="text-lg text-secondary-100 font-light">{{ __('auth.branding_subtitle') }}</p>
                    </div>

                    <!-- Features List -->
                    <div class="space-y-3">
                        <div class="flex items-start space-x-4 group">
                            <div class="flex-shrink-0 w-12 h-12 bg-white/10 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:bg-white/20 transition-all duration-300">
                                <svg class="w-6 h-6 text-secondary-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-white">{{ __('auth.feature_1') }}</h3>
                                <p class="text-secondary-200 text-sm mt-1">Manage everything from one dashboard</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4 group">
                            <div class="flex-shrink-0 w-12 h-12 bg-white/10 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:bg-white/20 transition-all duration-300">
                                <svg class="w-6 h-6 text-secondary-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-white">{{ __('auth.feature_2') }}</h3>
                                <p class="text-secondary-200 text-sm mt-1">Secure payment processing</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4 group">
                            <div class="flex-shrink-0 w-12 h-12 bg-white/10 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:bg-white/20 transition-all duration-300">
                                <svg class="w-6 h-6 text-secondary-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-white">{{ __('auth.feature_3') }}</h3>
                                <p class="text-secondary-200 text-sm mt-1">Instant customer notifications</p>
                            </div>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-4 pt-4 border-t border-white/20">
                        <div>
                            <p class="text-2xl font-bold text-white">1000+</p>
                            <p class="text-secondary-200 text-xs mt-1">Active Users</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-white">99.9%</p>
                            <p class="text-secondary-200 text-xs mt-1">Uptime</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-white">24/7</p>
                            <p class="text-secondary-200 text-xs mt-1">Support</p>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Login Form (Glassmorphism Card) -->
                <div class="w-full">
                    <!-- Mobile Logo -->
                    <div class="lg:hidden text-center mb-8">
                        <div class="inline-flex items-center space-x-3 mb-4">
                            <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-2xl">
                                <span class="text-2xl font-bold bg-gradient-to-br from-primary-900 to-secondary-600 bg-clip-text text-transparent">M</span>
                            </div>
                            <h1 class="text-4xl font-bold text-white">MyPay</h1>
                        </div>
                        <p class="text-secondary-100">{{ __('auth.branding_subtitle') }}</p>
                    </div>

                    <!-- Glassmorphism Login Card -->
                    <div class="bg-white/95 backdrop-blur-xl rounded-3xl shadow-2xl p-6 sm:p-7 border border-white/20">
                        <!-- Header -->
                        <div class="text-center mb-5">
                            <h2 class="text-2xl sm:text-3xl font-bold bg-gradient-to-r from-primary-900 to-secondary-600 bg-clip-text text-transparent mb-2">
                                {{ __('auth.title') }}
                            </h2>
                            <p class="text-gray-600 text-sm">{{ __('auth.subtitle') }}</p>
                        </div>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('login') }}" class="space-y-4">
                            @csrf

                            <!-- Email Address -->
                            <div class="group">
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                    {{ __('auth.email_label') }}
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400 group-focus-within:text-primary-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                        </svg>
                                    </div>
                                    <input id="email" 
                                           type="email" 
                                           name="email" 
                                           value="{{ old('email') }}" 
                                           required 
                                           autofocus 
                                           autocomplete="username"
                                           class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-primary-100 focus:border-primary-500 transition-all duration-200 text-gray-900 placeholder-gray-400"
                                           placeholder="you@example.com">
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="group">
                                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                    {{ __('auth.password_label') }}
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400 group-focus-within:text-primary-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                    </div>
                                    <input id="password" 
                                           type="password" 
                                           name="password" 
                                           required 
                                           autocomplete="current-password"
                                           class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-primary-100 focus:border-primary-500 transition-all duration-200 text-gray-900 placeholder-gray-400"
                                           placeholder="••••••••">
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Math Captcha -->
                            <div class="group">
                                <label for="captcha" class="block text-sm font-semibold text-gray-700 mb-2">
                                    {{ session('captcha_question') }}
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400 group-focus-within:text-primary-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <input id="captcha" 
                                           type="text" 
                                           name="captcha" 
                                           required
                                           class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-100 focus:border-primary-500 transition-all duration-200 text-gray-900 placeholder-gray-400"
                                           placeholder="Your answer">
                                </div>
                                <x-input-error :messages="$errors->get('captcha')" class="mt-2" />
                            </div>

                            <!-- Remember Me & Forgot Password -->
                            <div class="flex items-center justify-between">
                                <label class="flex items-center cursor-pointer group">
                                    <input type="checkbox" 
                                           name="remember"
                                           class="w-5 h-5 text-primary-900 border-gray-300 rounded focus:ring-primary-500 focus:ring-2 cursor-pointer">
                                    <span class="ml-3 text-sm text-gray-600 group-hover:text-gray-900 transition-colors">{{ __('auth.remember_me') }}</span>
                                </label>

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-sm text-primary-900 hover:text-primary-700 font-semibold hover:underline transition-all">
                                        {{ __('auth.forgot_password') }}
                                    </a>
                                @endif
                            </div>

                            <!-- Login Button -->
                            <button type="submit" class="w-full bg-gradient-to-r from-primary-900 to-secondary-600 text-white py-3 px-6 rounded-xl font-bold hover:shadow-2xl hover:scale-[1.02] focus:ring-2 focus:ring-primary-300 transition-all duration-200 transform">
                                {{ __('auth.login_button') }}
                            </button>
                        </form>

                        <!-- Divider -->
                        <div class="relative my-5">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-200"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-white text-gray-500">or</span>
                            </div>
                        </div>

                        <!-- Register Link -->
                        <div class="text-center">
                            <p class="text-gray-600">
                                {{ __('auth.register_text') }}
                                <a href="{{ route('register') }}" class="text-primary-900 hover:text-primary-700 font-bold hover:underline transition-all">
                                    {{ __('auth.register_link') }}
                                </a>
                            </p>
                        </div>

                        <!-- Footer -->
                        <div class="mt-5 pt-4 border-t border-gray-100 text-center">
                            <p class="text-sm text-gray-500">© 2025 MyPay. {{ __('auth.footer_copyright') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Animations -->
    <style>
        @keyframes gradient {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient 15s ease infinite;
        }
        
        @keyframes blob {
            0%, 100% { transform: translate(0, 0) scale(1); }
            25% { transform: translate(20px, -50px) scale(1.1); }
            50% { transform: translate(-20px, 20px) scale(0.9); }
            75% { transform: translate(50px, 50px) scale(1.05); }
        }
        
        .animate-blob {
            animation: blob 20s infinite;
        }
        
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        
        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>
</x-guest-layout>
