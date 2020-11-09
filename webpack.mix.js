const mix = require('laravel-mix');

mix
    .js('resources/assets/js/admin.js', 'publishable/assets/js')
    .version()
    .extract();
mix
    .sass('resources/assets/sass/admin.scss', 'publishable/assets/css')
    .version();
