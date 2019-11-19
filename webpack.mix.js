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
    .sass('resources/sass/app.scss', 'public/css')
    .styles([
        'public/panel/dist/css/AdminLTE.min.css',
        'public/panel/dist/css/skins/_all-skins.min.css',
        'public/panel/plugins/iCheck/square/blue.css',
        'public/panel/plugins/vegas/css/vegas.min.css'
    ], 'public/panel.css')
    .scripts([
        'public/panel/bower_components/jquery/dist/jquery.min.js',
        'public/panel/bower_components/bootstrap/dist/js/bootstrap.min.js',
        'public/panel/plugins/iCheck/icheck.min.js',
        'public/panel/bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
        'public/panel/bower_components/fastclick/lib/fastclick.js',
        'public/panel/dist/js/adminlte.min.js',
        'public/panel/plugins/vegas/js/vegas.min.js',
    ], 'public/panel.js')