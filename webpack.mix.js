const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

//  For laravel itself
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

    // For my uses
    mix.js(['resources/js/script.js', 'resources/js/submit.js'], 'public/js/mixedJS.js');
    mix.sass('resources/sass/main.scss', 'public/css/style.css');
