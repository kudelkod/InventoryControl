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

mix.js('resources/js/app.js', 'public/js')
    .js('app/Modules/Categories/resources/js/categories.js', 'public/js/categories')
    .js('app/Modules/Manufacture/resources/js/manufacturers.js', 'public/js/manufacturers')
    .js('app/Modules/Model/resources/js/models.js', 'public/js/models')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
