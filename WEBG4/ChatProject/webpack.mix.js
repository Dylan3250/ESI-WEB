const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.copy('resources/img/', 'public/img')
    .js('resources/js/chat.js', 'public/js')
    .sass('resources/css/app.scss', 'public/css')
    .sass('resources/css/chat.scss', 'public/css')
    .sass('resources/css/channel.scss', 'public/css')
    .sass('resources/css/connection.scss', 'public/css');
