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

mix
  //----------------------------------------------------------------------
  // Admin
  //----------------------------------------------------------------------
  // AdminLte
  .copy('./node_modules/admin-lte/dist/css/AdminLTE.min.css', './public/assets/admin/css/AdminLTE.min.css')
  .copy('./node_modules/admin-lte/dist/css/adminlte.min.css.map', './public/assets/admin/css/adminlte.min.css.map')
  .copy('./node_modules/admin-lte/dist/css/skins/_all-skins.min.css', './public/assets/admin/css/_all-skins.min.css')
  .copy('./node_modules/admin-lte/dist/js/adminlte.min.js', './public/assets/admin/js/adminlte.min.js')

  // AdminLte - Bootstrap 3.3.7
  .copy('./node_modules/admin-lte/bower_components/bootstrap', './public/assets/admin/plugins/bootstrap')

  // AdminLte - Font Awesome
  .copy('./node_modules/admin-lte/bower_components/font-awesome', './public/assets/admin/plugins/font-awesome')

  // AdminLte - jQuery
  .copy('./node_modules/admin-lte/bower_components/jquery', './public/assets/admin/plugins/jquery')

  // AdminLte - SlimScroll
  .copy('./node_modules/admin-lte/bower_components/jquery-slimscroll', './public/assets/admin/plugins/jquery-slimscroll')

  // AdminLte - FastClick
  .copy('./node_modules/admin-lte/bower_components/fastclick', './public/assets/admin/plugins/fastclick')

  //----------------------------------------------------------------------
  // Other settings
  //----------------------------------------------------------------------
  .options({
      // Makes laravel-mix not process urls that are inside CSS files
      processCssUrls: false
  })

  // Enable versioning of minified files
  .version();
