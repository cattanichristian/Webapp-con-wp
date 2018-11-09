<?php
/**
 * functions and definitions
 *
 * @package Go Galapagos
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

function bower_enqueue_assets() {
  /*
   * BOWER - Generated by `gulp wiredep` - do not modify, use `bower install`
   *         and `bower uninstall` and run `gulp wiredep` to update this.
   * *************************************************************************/

  wp_enqueue_style('principal-css', get_stylesheet_directory_uri() . '/styles/principal.css');

  // bower:css

  // endbower

  // bower:js

  // endbower

  wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/bower_components/bootstrap/dist/js/bootstrap.js', '', '', true);
  wp_enqueue_script('principal-js', get_stylesheet_directory_uri() . '/scripts/principal.js', '', '', true);

}

add_action('wp_enqueue_scripts', 'bower_enqueue_assets');

