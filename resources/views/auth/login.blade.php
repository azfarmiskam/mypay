<x-guest-layout>
    <div class="min-h-screen flex relative">
        <!-- Language Switcher -->
        <div class="absolute top-4 right-4 z-50">
            <x-language-switcher />
        </div>

        <!-- Left Side - Branding & Info -->
        <div class="hidden lg:flex lg:w-1/2 bg-gradient-primary items-center justify-center p-12">
            <div class="max-w-md text-white">
                <h1 class="text-5xl font-bold mb-6">MyPay</h1>
                <p class="text-2xl mb-8 text-secondary-100">{{ __('auth.branding_subtitle') }}</p>
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-secondary-300 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <p class="text-secondary-50">{{ __('auth.feature_1') }}</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-secondary-300 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <p class="text-secondary-50">{{ __('auth.feature_2') }}</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-secondary-300 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <p class="text-secondary-50">{{ __('auth.feature_3') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="flex-1 flex items-center justify-center p-8 bg-gray-50">
            <div class="w-full max-w-md">
                <!-- Logo for mobile -->
                <div class="lg:hidden text-center mb-8">
                    <h1 class="text-4xl font-bold text-primary-900">MyPay</h1>
                    <p class="text-gray-600 mt-2">{{ __('auth.branding_subtitle') }}</p>
                </div>

                <!-- Login Card -->
                <div class="bg-white rounded-2xl shadow-strong p-8">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-900">{{ __('auth.title') }}</h2>
                        <p class="text-gray-600 mt-2">{{ __('auth.subtitle') }}</p>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ __('auth.email_label') }}
                            </label>
                            <input id="email" 
                                   type="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   required 
                                   autofocus 
                                   autocomplete="username"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all"
                                   placeholder="nama@contoh.com">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ __('auth.password_label') }}
                            </label>
                            <input id="password" 
                                   type="password" 
                                   name="password" 
                                   required 
                                   autocomplete="current-password"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all"
                                   placeholder="Masukkan kata laluan">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Math Captcha -->
                        <div>
                            <label for="captcha" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ session('captcha_question') }}
                            </label>
                            <input id="captcha" 
                                   type="text" 
                                   name="captcha" 
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all"
                                   placeholder="Jawapan anda">
                            <x-input-error :messages="$errors->get('captcha')" class="mt-2" />
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <label for="remember_me" class="flex items-center">
                                <input id="remember_me" 
                                       type="checkbox" 
                                       name="remember"
                                       class="w-4 h-4 text-primary-900 border-gray-300 rounded focus:ring-primary-500">
                                <span class="ml-2 text-sm text-gray-600">{{ __('auth.remember_me') }}</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm text-primary-900 hover:text-primary-700 font-medium">
                                    {{ __('auth.forgot_password') }}
                                </a>
                            @endif
                        </div>

                        <!-- Login Button -->
                        <button type="submit" class="w-full bg-primary-900 text-white py-3 px-6 rounded-lg font-semibold hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 transition-all shadow-md hover:shadow-lg">
                            {{ __('auth.login_button') }}
                        </button>
                    </form>

                    <!-- Register Link -->
                    <div class="mt-6 text-center">
                        <p class="text-gray-600">
                            {{ __('auth.register_text') }}
                            <a href="{{ route('register') }}" class="text-primary-900 hover:text-primary-700 font-semibold">
                                {{ __('auth.register_link') }}
                            </a>
                        </p>
                    </div>
                </div>

                <!-- Footer Links -->
                <div class="mt-8 text-center text-sm text-gray-600">
                    <p>© 2025 MyPay. {{ __('auth.footer_copyright') }}</p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
