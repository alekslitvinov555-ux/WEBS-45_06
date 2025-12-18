import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        './resources/js/**/*.tsx'
    ],

    theme: {
        extend: {
            colors: {
                brand: '#a3e635',     // Лаймовий акцент
                dark: '#050505',      // Основний чорний
                graysoft: '#0f0f0f',  // Фоновий легкий чорний
            },
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                mono: ['JetBrains Mono', ...defaultTheme.fontFamily.mono],
            },

            /* Унікальні анімації під стиль USA Imports */
            keyframes: {
                float: {
                    '0%': { transform: 'translateY(0px)' },
                    '50%': { transform: 'translateY(-10px)' },
                    '100%': { transform: 'translateY(0px)' }
                },
                fadeup: {
                    '0%': { opacity: 0, transform: 'translateY(20px)' },
                    '100%': { opacity: 1, transform: 'translateY(0px)' }
                },
                marquee: {
                    '0%': { transform: 'translateX(0%)' },
                    '100%': { transform: 'translateX(-100%)' }
                }
            },
            animation: {
                float: 'float 5s ease-in-out infinite',
                fadeup: 'fadeup 0.7s ease-out forwards',
                marquee: 'marquee 18s linear infinite'
            }
        },
    },

    plugins: [forms],
};
