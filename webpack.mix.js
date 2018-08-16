let mix = require('laravel-mix');

mix
    .js('resources/assets/scripts/index.js', 'public/js')
    .autoload ({
        jquery: ['$', 'window.jQuery', 'jQuery'],
    })
   .sass('resources/assets/styles/index.scss', 'public/css')

    /* guest assets */
    .js('resources/assets/scripts/index_guest.js', 'public/js')
    .autoload ({
        jquery: ['$', 'window.jQuery', 'jQuery'],
    })
    .sass('resources/assets/styles/index_guest.scss', 'public/css');

if (mix.inProduction() || process.env.npm_lifecycle_event !== 'hot') {
    mix.version();
}