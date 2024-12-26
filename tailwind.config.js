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
            },
            fontSize: {
                '2xl' : '1.5rem',
                '3xl' : '1.8rem',
                '4xl' : '2.25rem',
                '5xl' : '3rem',
                '6xl' : '3.75rem',
                '7xl' : '4.5rem',
                '8xl' : '6rem',
                '9xl' : '8rem'
            },
        },
    },

    plugins: [forms],
};
