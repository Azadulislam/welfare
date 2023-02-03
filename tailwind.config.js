/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors:{
                theme: '#FFBD1F',
                themeLight: '#C58940'
            }
        },
    },
    plugins: [],
}
