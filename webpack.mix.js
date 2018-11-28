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

// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');
mix.styles([
    'public/css/material_icons.css',
    './node_modules/material-kit/assets/css/material-kit.css',
], 'public/css/ui.css')
.scripts([
    './node_modules/material-kit/assets/js/core/jquery.min.js',
    './node_modules/material-kit/assets/js/core/popper.min.js',
    './node_modules/material-kit/assets/js/core/bootstrap-material-design.min.js',
    './node_modules/material-kit/assets/js/material-kit.js',
    './node_modules/material-kit/assets/js/bootstrap-datetimepicker.js',
    './node_modules/material-kit/assets/js/jquery.sharrre.js',
    './node_modules/material-kit/assets/js/moment.min.js',
    './node_modules/material-kit/assets/js/nouislider.min.js',
], 'public/js/ui.js')
.sass('resources/sass/app.scss', 'public/css')
;
