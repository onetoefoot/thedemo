let mix = require('laravel-mix');
let webpack = require('webpack');

const { VueLoaderPlugin } = require('vue-loader')

const HtmlWebpackPlugin = require('html-webpack-plugin');

const env = process.env.NODE_ENV;

// Vue TS
mix.webpackConfig({
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader',
                options: {
                    loaders: {
                        scss: 'vue-style-loader!css-loader!sass-loader',
                        sass: 'vue-style-loader!css-loader!sass-loader?indentedSyntax',
                    }
                }
            }
        ],
        loaders: [
            // { 
            //     test: /\.vue$/,
            //     loader: 'vue-loader',
            //     options: {
            //         loaders: {
            //             scss: 'vue-style-loader!css-loader!sass-loader',
            //             sass: 'vue-style-loader!css-loader!sass-loader?indentedSyntax',
            //         }
            //     }
            // },
            // { 
            //     test: /\.tsx?$/,
            //     loader: 'ts-loader',
            //     exclude: /node_modules/,
            //     options: {
            //         appendTsSuffixTo: [/\.vue$/]
            //     } 
            // }
        ]
    },
    plugins: [
        new VueLoaderPlugin()
    ]
});

// mix.disableNotifications();

mix
    .js('resources/assets/scripts/index.js', 'public/js')
    .autoload ({
        jquery: ['$', 'window.jQuery', 'jQuery'], 
        axios: ['axios', 'window.axios'] 
    })
    .sass('resources/assets/styles/index.scss', 'public/css')

    /* guest assets */
    .js('resources/assets/scripts/index_guest.js', 'public/js')
    .autoload ({ jquery: ['$', 'window.jQuery', 'jQuery'] })
    .sass('resources/assets/styles/index_guest.scss', 'public/css');

if (mix.inProduction() || process.env.npm_lifecycle_event !== 'hot') {
    mix.version();
}