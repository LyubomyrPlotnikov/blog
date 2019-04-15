let mix = require('laravel-mix');

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

const vendors = [
  'lodash',
  'axios',
  'vue',
  'bootstrap',
  'jquery',
  'moment',
  'popper.js',
  'vue-loading-overlay'

];

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

if (mix.inProduction()) {
  mix.version();
}

mix.webpackConfig({
  devServer: {
    overlay: true,
  },
  resolve: {
    alias: {
      Static: path.resolve(__dirname, 'resources/static'),
    },
  },
});