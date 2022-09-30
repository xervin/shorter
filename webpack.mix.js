const mix = require('laravel-mix');


mix.copyDirectory('resources/img', 'public/img');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/css/app.scss', 'public/css');

if (mix.inProduction()) {
    mix.version();
}
