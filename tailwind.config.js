import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './node_modules/tw-elements/dist/js/**/*.js'
    ],
    

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: { // Add the colors property here
                tresBien: 'rgba(255, 206, 86, 0.2)', // Green 400
                bien: 'rgba(255, 99, 132, 0.2)', // Blue 400
                assezBien: 'rgba(54, 162, 235, 0.2)', // Yellow 400
                passable: 'rgba(153, 102, 255, 0.2)', // Orange 500
                mediocre: 'rgba(255, 159, 64, 0.2)', // Red 500
                null: 'rgba(211, 211, 211, 0)', // Gray 400
            },
        },
    },
    darkMode: "class",

    plugins: [forms,require("tw-elements/dist/plugin.cjs"), 'flowbite/plugin'],
};
