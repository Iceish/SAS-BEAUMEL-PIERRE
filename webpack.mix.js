const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, web are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .copyDirectory('resources/img', 'public/img')
    .options({
        processCssUrls: false
    })
    .browserSync(process.env.APP_URL)
    .options({
        watchOptions : {
            ignored : /node_modules/
        }
    });
mix.disableNotifications();
