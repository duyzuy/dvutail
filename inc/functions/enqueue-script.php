<?php




function dvutail_enqueue_script()
{
  $uri = get_template_directory_uri();
  $theme = wp_get_theme(get_template());
  $version = $theme->get('Version');


  wp_enqueue_style('swiper', $uri . '/assets/css/swiper.css', array(), '11.1.4', 'all');
  wp_enqueue_style('dvu-block', $uri . '/assets/css/block-theme.css',  '0.1', true);
  wp_enqueue_style('dvu-theme',  $uri  . '/dist/theme.css', array());
  wp_enqueue_style('global', $uri . '/assets/css/global.css', array(), $version, 'all');



  wp_enqueue_script('jquery');

  wp_enqueue_script('swiper', $uri . '/assets/js/swiper.js', array('jquery'), '11.1.4', true);
  wp_enqueue_script('global', $uri . '/assets/js/global.js', array('jquery'), $version, true);
}
add_action('wp_enqueue_scripts', 'dvutail_enqueue_script', 100);


/**
 * 
 * Register script for shortcode
 * 
 */
function dvutail_enqueue_script_shortcode()
{

  $uri = get_template_directory_uri();
  $theme = wp_get_theme(get_template());
  $version = $theme->get('Version');

  wp_register_script('popup-content', $uri . '/assets/js/shortcodes/popup-content.js', array('jquery'), $version, true);
  wp_register_script('blog_slide', $uri . '/assets/js/shortcodes/blog-slide.js', array('jquery'), $version, true);
  wp_register_script('featured-product-swiper', $uri . '/assets/js/shortcodes/product-slide-swiper.js', array('jquery'), $version, true);
}
add_action('wp_enqueue_scripts', 'dvutail_enqueue_script_shortcode', 100);


// add_action( 'wp_enqueue_scripts', function () {

//   // Register our script
//   wp_register_script( 'my-script', get_stylesheet_directory_uri() . '/path/to/theme/scripts/my-script.js', [], false, true );
  
//   // Set up the required data
//   $myData = [
//      'name'            => 'Phil Kurth',
//      'country'         => 'Australia',
//      'favourite_color' => 'blue',
//   ];

//   // Localise the data, specifying our registered script and a global variable name to be used in the script tag
//   wp_localize_script( 'my-script', 'myData', $myData);

//   // Enqueue our script (this can be done before or after localisation)
//   wp_enqueue_script( 'my-script' );

// } );