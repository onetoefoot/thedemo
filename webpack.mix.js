let mix = require('laravel-mix');

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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');
mix
    .js('resources/assets/scripts/index.js', 'public/js')
    .autoload ({
        jquery: ['$', 'window.jQuery', 'jQuery'],
    })
   .sass('resources/assets/styles/index.scss', 'public/css')

    /*guest assets*/
    .js('resources/assets/scripts/index_guest.js', 'public/js')
    .autoload ({
        jquery: ['$', 'window.jQuery', 'jQuery'],
    })
    .sass('resources/assets/styles/index_guest.scss', 'public/css');

if (mix.inProduction() || process.env.npm_lifecycle_event !== 'hot') {
    mix.version();
}