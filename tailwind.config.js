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
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                montserrat: ['Montserrat', 'sans-serif'],
                akira: ['"Akira Expanded"', 'sans-serif'],
            },
        },
    },

    plugins: [forms],

    variants: {
        extend: {
            transitionProperty: ['motion-reduce'],
            animation: ['motion-reduce'],
            transform: ['motion-reduce'],
            scale: ['motion-reduce'],
        },
    },
};
