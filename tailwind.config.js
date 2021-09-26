const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    "50":  "#F1EEFF",
                    "100": "#a79ee5",
                    "200": "#988ee1",
                    "300": "#897ddd",
                    "400": "#7b6dd8",
                    "500": "#6c5dd4",
                    "600": "#6154bf",
                    "700": "#564aaa",
                    "800": "#4c4194",
                    "900": "#41387f"
                  },
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
