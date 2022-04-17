const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
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
                merriweather: ['Merriweather', ...defaultTheme.fontFamily.sans],
                // amotic: ['Amatic SC, cursive;', ...defaultTheme.fontFamily.sans],
            },
            // screens: {
            //     'sm': {'min': '640px', 'max': '767px'},
            //     // => @media (min-width: 640px and max-width: 767px) { ... }
          
            //     'md': {'min': '768px', 'max': '1023px'},
            //     // => @media (min-width: 768px and max-width: 1023px) { ... }
          
            //     'lg': {'min': '1024px', 'max': '1279px'},
            //     // => @media (min-width: 1024px and max-width: 1279px) { ... }
          
            //     'xl': {'min': '1280px', 'max': '1535px'},
            //     // => @media (min-width: 1280px and max-width: 1535px) { ... }
          
            //     '2xl': {'min': '1536px'},
            //     // => @media (min-width: 1536px) { ... }
            //   },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
