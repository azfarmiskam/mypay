import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                // Primary - Navy Blue
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
                    900: '#1E3A8A', // Main Navy Blue
                    950: '#1e2555',
                },
                // Secondary - Light Blue
                secondary: {
                    50: '#eff6ff',
                    100: '#dbeafe',
                    200: '#bfdbfe',
                    300: '#93c5fd',
                    400: '#60A5FA', // Main Light Blue
                    500: '#3b82f6',
                    600: '#2563eb',
                    700: '#1d4ed8',
                    800: '#1e40af',
                    900: '#1e3a8a',
                    950: '#172554',
                },
                // Accent colors
                accent: {
                    success: '#10B981',
                    warning: '#F59E0B',
                    error: '#EF4444',
                    info: '#3B82F6',
                },
            },
            fontFamily: {
                sans: ['Inter', 'system-ui', ...defaultTheme.fontFamily.sans],
                display: ['Inter', 'system-ui', ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                'xs': ['0.75rem', { lineHeight: '1rem' }],
                'sm': ['0.875rem', { lineHeight: '1.25rem' }],
                'base': ['1rem', { lineHeight: '1.5rem' }],
                'lg': ['1.125rem', { lineHeight: '1.75rem' }],
                'xl': ['1.25rem', { lineHeight: '1.75rem' }],
                '2xl': ['1.5rem', { lineHeight: '2rem' }],
                '3xl': ['1.875rem', { lineHeight: '2.25rem' }],
                '4xl': ['2.25rem', { lineHeight: '2.5rem' }],
                '5xl': ['3rem', { lineHeight: '1' }],
            },
            spacing: {
                '18': '4.5rem',
                '88': '22rem',
                '128': '32rem',
            },
            borderRadius: {
                'xl': '1rem',
                '2xl': '1.5rem',
                '3xl': '2rem',
            },
            boxShadow: {
                'soft': '0 2px 15px -3px rgba(0, 0, 0, 0.07), 0 10px 20px -2px rgba(0, 0, 0, 0.04)',
                'medium': '0 4px 20px -2px rgba(0, 0, 0, 0.1), 0 10px 25px -5px rgba(0, 0, 0, 0.1)',
                'strong': '0 10px 40px -5px rgba(0, 0, 0, 0.2), 0 20px 50px -10px rgba(0, 0, 0, 0.15)',
                'glow': '0 0 20px rgba(96, 165, 250, 0.5)',
                'glow-primary': '0 0 20px rgba(30, 58, 138, 0.5)',
            },
            animation: {
                'fade-in': 'fadeIn 0.5s ease-in-out',
                'slide-up': 'slideUp 0.5s ease-out',
                'slide-down': 'slideDown 0.5s ease-out',
                'scale-in': 'scaleIn 0.3s ease-out',
                'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                slideUp: {
                    '0%': { transform: 'translateY(20px)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' },
                },
                slideDown: {
                    '0%': { transform: 'translateY(-20px)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' },
                },
                scaleIn: {
                    '0%': { transform: 'scale(0.9)', opacity: '0' },
                    '100%': { transform: 'scale(1)', opacity: '1' },
                },
            },
            backgroundImage: {
                'gradient-primary': 'linear-gradient(135deg, #1E3A8A 0%, #60A5FA 100%)',
                'gradient-secondary': 'linear-gradient(135deg, #60A5FA 0%, #93c5fd 100%)',
                'gradient-dark': 'linear-gradient(135deg, #1e2555 0%, #1E3A8A 100%)',
            },
        },
    },

    plugins: [
        forms,
        function({ addComponents }) {
            addComponents({
                '.btn': {
                    '@apply px-4 py-2 rounded-lg font-medium transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2': {},
                },
                '.btn-primary': {
                    '@apply bg-primary-900 text-white hover:bg-primary-800 focus:ring-primary-500 shadow-md hover:shadow-lg': {},
                },
                '.btn-secondary': {
                    '@apply bg-secondary-400 text-white hover:bg-secondary-500 focus:ring-secondary-300 shadow-md hover:shadow-lg': {},
                },
                '.btn-outline': {
                    '@apply border-2 border-primary-900 text-primary-900 hover:bg-primary-900 hover:text-white focus:ring-primary-500': {},
                },
                '.card': {
                    '@apply bg-white rounded-xl shadow-soft p-6 transition-shadow duration-200 hover:shadow-medium': {},
                },
                '.input-field': {
                    '@apply w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all': {},
                },
            })
        },
    ],
};
