<?php
/**
 * functions and definitions
 *
 * @package Go Galapagos
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

setlocale(LC_MONETARY, 'en_US' );

// Soporte de Wordpress y demas utilidades
// require_once 'inc/gogalapagos-utilities.php'; 
// Ajustes de plugins, tamaños de imagenes
// require_once 'inc/gogalapagos-extras.php'; 
// Soporte para Menues
// require_once 'includes/gogalapagos-menues.php';
// require_once 'includes/gogalapagos-menu-walker.php';
// Carga de scripts y adicionales
// require_once 'includes/gogalapagos-scripts.php';
// Traducciones
// require_once 'inc/gogalapagos-string-translations.php'; 
// Soporte para llamados de AJAX
// require_once 'inc/gogalapagos-ajax-calls.php';

function bower_enqueue_assets() {
  /*
   * BOWER - Generated by `gulp wiredep` - do not modify, use `bower install`
   *         and `bower uninstall` and run `gulp` to update this.
   * *************************************************************************/


  // bower:css
  wp_enqueue_style('aos-css', get_stylesheet_directory_uri() . '/bower_components/aos/dist/aos.css');
  wp_enqueue_style('fullpage-css', get_stylesheet_directory_uri() . '/bower_components/fullpage.js/dist/fullpage.css');
  wp_enqueue_style('fontawesome-all-css', get_stylesheet_directory_uri() . '/bower_components/components-font-awesome/css/fontawesome-all.css');
  wp_enqueue_style('hover-css', get_stylesheet_directory_uri() . '/bower_components/hover/css/hover.css');
  wp_enqueue_style('animate-css', get_stylesheet_directory_uri() . '/bower_components/animate.css/animate.css');
  wp_enqueue_style('slick-css', get_stylesheet_directory_uri() . '/bower_components/slick-carousel/slick/slick.css');
  wp_enqueue_style('owl-carousel.css', get_stylesheet_directory_uri() . '/bower_components/owl.carousel/dist/assets/owl.carousel.css');
  wp_enqueue_style('owl-theme.default.css', get_stylesheet_directory_uri() . '/bower_components/owl.carousel/dist/assets/owl.theme.default.css');
  // endbower

  if(is_front_page() ){
      wp_enqueue_style('principal-css', get_stylesheet_directory_uri() . '/styles/principal.css');
  }
  elseif(is_page()){
      wp_enqueue_style('paginas-css', get_stylesheet_directory_uri() . '/styles/paginas.css');
  }

  // bower:js
  wp_enqueue_script('popper-js', get_stylesheet_directory_uri() . '/bower_components/popper.js/dist/umd/popper.js', '', '', true);
  wp_enqueue_script('aos-js', get_stylesheet_directory_uri() . '/bower_components/aos/dist/aos.js', '', '', true);
  wp_enqueue_script('fullpage-js', get_stylesheet_directory_uri() . '/bower_components/fullpage.js/dist/fullpage.js', '', '', true);
  wp_enqueue_script('jquery-js', get_stylesheet_directory_uri() . '/bower_components/jquery/dist/jquery.js', '', '', true);
  wp_enqueue_script('slick-js', get_stylesheet_directory_uri() . '/bower_components/slick-carousel/slick/slick.js', '', '', true);
  wp_enqueue_script('progressbar-js', get_stylesheet_directory_uri() . '/bower_components/progressbar.js/dist/progressbar.js', '', '', true);
  wp_enqueue_script('owl-carousel.js', get_stylesheet_directory_uri() . '/bower_components/owl.carousel/dist/owl.carousel.js', '', '', true);
  // endbower

  wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/bower_components/bootstrap/dist/js/bootstrap.js', '', '', true);
  wp_enqueue_script('swipe-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.js', '', '', true);

  if(is_front_page() ){
      wp_enqueue_script('principal-js', get_stylesheet_directory_uri() . '/scripts/principal.js', '', '', true);
  }
  elseif(is_page()){
      wp_enqueue_script('paginas-js', get_stylesheet_directory_uri() . '/scripts/paginas.js', '', '', true);

}

  }

add_action('wp_enqueue_scripts', 'bower_enqueue_assets');

// THUMBNAIL-SUPPORT
add_theme_support( 'post-thumbnails' ); 
// NAVWALKER
require_once get_template_directory() . '/wp-bootstrap-navwalker.php';
register_nav_menus( array(
  'primary' => __( 'Primary Menu', 'menu_principal' ),
) );

// DEREGISTER NATIVE JQUERY
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

// Register Theme Features
function titulo()  {

  // Add theme support for document Title tag
  add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'titulo' );
