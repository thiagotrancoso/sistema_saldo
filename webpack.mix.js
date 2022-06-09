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
  // Site
  //----------------------------------------------------------------------
  // AdminLte
  .copy('./node_modules/admin-lte/dist/css/AdminLTE.min.css', './public/assets/site/css/AdminLTE.min.css')
  .copy('./node_modules/admin-lte/dist/css/adminlte.min.css.map', './public/assets/site/css/adminlte.min.css.map')
  .copy('./node_modules/admin-lte/dist/css/skins/_all-skins.min.css', './public/assets/site/css/_all-skins.min.css')
  .copy('./node_modules/admin-lte/dist/js/adminlte.min.js', './public/assets/site/js/adminlte.min.js')

  // AdminLte - Plugin: Bootstrap 3.3.7
  .copy('./node_modules/admin-lte/bower_components/bootstrap', './public/assets/site/plugins/bootstrap')

  // AdminLte - Plugin: Font Awesome
  .copy('./node_modules/admin-lte/bower_components/font-awesome', './public/assets/site/plugins/font-awesome')

  // AdminLte - Plugin: Ionicons
  .copy('./node_modules/admin-lte/bower_components/Ionicons', './public/assets/site/plugins/Ionicons')

  // AdminLte - Plugin: jQuery
  .copy('./node_modules/admin-lte/bower_components/jquery', './public/assets/site/plugins/jquery')

  // AdminLte - Plugin: SlimScroll
  .copy('./node_modules/admin-lte/bower_components/jquery-slimscroll', './public/assets/site/plugins/jquery-slimscroll')

  // AdminLte - Plugin: FastClick
  .copy('./node_modules/admin-lte/bower_components/fastclick', './public/assets/site/plugins/fastclick')

  //----------------------------------------------------------------------
  // Admin
  //----------------------------------------------------------------------
  // AdminLte
  .copy('./node_modules/admin-lte/dist/css/AdminLTE.min.css', './public/assets/admin/css/AdminLTE.min.css')
  .copy('./node_modules/admin-lte/dist/css/adminlte.min.css.map', './public/assets/admin/css/adminlte.min.css.map')
  .copy('./node_modules/admin-lte/dist/css/skins/_all-skins.min.css', './public/assets/admin/css/_all-skins.min.css')
  .copy('./node_modules/admin-lte/dist/js/adminlte.min.js', './public/assets/admin/js/adminlte.min.js')

  // AdminLte - Plugin: Bootstrap 3.3.7
  .copy('./node_modules/admin-lte/bower_components/bootstrap', './public/assets/admin/plugins/bootstrap')

  // AdminLte - Plugin: Font Awesome
  .copy('./node_modules/admin-lte/bower_components/font-awesome', './public/assets/admin/plugins/font-awesome')

  // AdminLte - Plugin: Ionicons
  .copy('./node_modules/admin-lte/bower_components/Ionicons', './public/assets/admin/plugins/Ionicons')

  // AdminLte - Plugin: jQuery
  .copy('./node_modules/admin-lte/bower_components/jquery', './public/assets/admin/plugins/jquery')

  // AdminLte - Plugin: SlimScroll
  .copy('./node_modules/admin-lte/bower_components/jquery-slimscroll', './public/assets/admin/plugins/jquery-slimscroll')

  // AdminLte - Plugin: FastClick
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
