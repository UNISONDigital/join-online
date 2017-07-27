const mix = require('laravel-mix');

mix
  .js([
    'resources/assets/js/libs/jquery-3.2.1.min.js',
    'resources/assets/js/libs/selectize.js',
    'resources/assets/js/bootstrap.js',
    'resources/assets/js/global.js',
    'resources/assets/js/snippets/informationBlock.js',
    'resources/assets/js/snippets/membershipCard.js',
    'resources/assets/js/join-step-two.js',
    'resources/assets/js/join-step-three.js',
    'resources/assets/js/join-step-four.js',
  ], 'public/js/app.js')
  .sass('resources/assets/sass/app.scss', 'public/css');
