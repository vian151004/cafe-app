/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
    ],
    theme: {
        extend: {
            // Pastikan kurung ini membungkus colors
            colors: {
                primary: '#005246',
                cream: '#FFE8D1',
                orange: '#F37721',
                tealCard: '#004339',
            },
        },
    },
    plugins: [],
};