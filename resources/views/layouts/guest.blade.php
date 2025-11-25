<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>MyPay - {{ __('landing.hero_title_1') }} {{ __('landing.hero_title_2') }}</title>
        <meta name="description" content="{{ __('landing.hero_subtitle') }}">
        <link rel="icon" type="image/png" href="/favicon.png?v={{ time() }}">
        <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico?v={{ time() }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Tailwind CSS CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
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
                                900: '{{ $themeColors["main"] }}',
                                950: '#1e2555',
                            },
                            secondary: {
                                50: '#eff6ff',
                                100: '#dbeafe',
                                200: '#bfdbfe',
                                300: '#93c5fd',
                                400: '{{ $themeColors["third"] }}',
                                500: '{{ $themeColors["secondary"] }}',
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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Dynamic Theme Colors -->
        <style>
            :root {
                --color-main: {{ $themeColors['main'] }};
                --color-secondary: {{ $themeColors['secondary'] }};
                --color-third: {{ $themeColors['third'] }};
                --color-title: {{ $themeColors['title'] }};
                --color-subtitle: {{ $themeColors['subtitle'] }};
                --color-content: {{ $themeColors['content'] }};
            }
        </style>
        
        <!-- Alpine.js -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="font-sans antialiased">
        {{ $slot }}
    </body>
</html>
