const mix = require('laravel-mix');

mix
  .js([
    'resources/assets/js/bootstrap.js',
    'resources/assets/js/global.js',
    'resources/assets/js/snippets/informationBlock',
    'resources/assets/js/snippets/membershipCard',
    'resources/assets/js/join-step-two',
    'resources/assets/js/join-step-three',
    'resources/assets/js/join-step-four',
  ], 'public/js/app.js')
  .sass('resources/assets/sass/app.scss', 'public/css');
