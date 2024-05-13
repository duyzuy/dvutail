<?php

function dvutheme_setup()
{



  /* add title tag support */
  add_theme_support('title-tag');

  /* Load child theme languages */
  load_theme_textdomain('dvutheme', get_stylesheet_directory() . '/languages');

  /* load theme languages */
  load_theme_textdomain('dvutheme', get_template_directory() . '/languages');

  /* Add default posts and comments RSS feed links to head */
  add_theme_support('automatic-feed-links');

  /* Add excerpt to pages */
  add_post_type_support('page', 'excerpt');

  /* Add support for post thumbnails */
  add_theme_support('post-thumbnails');

  /* Add support for Selective Widget refresh */
  add_theme_support('customize-selective-refresh-widgets');
  add_theme_support('custom-logo');
  /* Add support for HTML5 */
  add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    'widgets',
  ));

  /*  Registrer menus. */
  register_nav_menus(array(
    'primary' => __('Main Menu', 'dvutheme'),
    'primary_mobile' => __('Main Menu - Mobile', 'dvutheme'),
    'footer' => __('Footer Menu', 'dvutheme'),
    'top_bar_nav' => __('Top Bar Menu', 'dvutheme'),
  ));

  /*  Enable support for Post Formats */
  add_theme_support('post-formats', array('video'));
}
add_action('after_setup_theme', 'dvutheme_setup');

//enqueue script
function dvutheme_register_script()
{
  $uri = get_template_directory_uri();
  $theme = wp_get_theme(get_template());
  $version = $theme->get('Version');


  wp_enqueue_style('slick', $uri . '/assets/css/slick.css', array(), '1.8.0', 'all');
  wp_enqueue_style('dvu-block', $uri . '/assets/css/block-theme.css',  '0.1', true);
  wp_enqueue_style('global', $uri . '/assets/css/global.css', array(), $version, 'all');



  wp_enqueue_script('jquery');

  wp_enqueue_script('slick', $uri . '/assets/js/slick.min.js', array('jquery'), '1.8.0', true);
  // wp_enqueue_script('slick-lightbox', $uri . '/assets/js/slick-lightbox.js', array('jquery'), $version, false);
  // wp_enqueue_script('bootstrap', $uri . '/assets/js/bootstrap.min.js', array('jquery'), '4.0.0', true);

  wp_enqueue_script('global', $uri . '/assets/js/global.js', array('jquery'), $version, true);

  wp_register_script('blog_slide', $uri . '/assets/js/shortcodes/blog-slide.js', array('jquery'), $version, true);
}
add_action('wp_enqueue_scripts', 'dvutheme_register_script', 100);


/* Setup Theme Widgets */
function dvutheme_widgets_init()
{

  $title_after = '<div class="is-divider small"></div>';

  register_sidebar(array(
    'name'          => __('Blog Sidebar', 'dvutheme'),
    'id'            => 'sidebar-blog',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>' . $title_after,
  ));

  register_sidebar(array(
    'name'          => __('Page Sidebar', 'dvutheme'),
    'id'            => 'sidebar-page',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>' . $title_after,
  ));
  register_sidebar(array(
    'name'          => __('Footer 1', 'dvutheme'),
    'id'            => 'sidebar-footer-1',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="widget-title">',
    'after_title'   => '</div><div class="is-divider small"></div>',
  ));
}
add_action('widgets_init', 'dvutheme_widgets_init');

add_filter('woocommerce_enqueue_styles', '__return_false');

function disable_wp_emojicons()
{

  // all actions related to emojis
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');

  // filter to remove TinyMCE emojis

}
add_action('init', 'disable_wp_emojicons');


// // Allow SVG
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {

  // global $wp_version;
  // if ($wp_version !== '4.7.1') {
  //   return $data;
  // }

  $filetype = wp_check_filetype($filename, $mimes);

  return [
    'ext'             => $filetype['ext'],
    'type'            => $filetype['type'],
    'proper_filename' => $data['proper_filename']
  ];
}, 10, 4);

function cc_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// function fix_svg() {
//   echo '<style type="text/css">
//         .attachment-266x266, .thumbnail img {
//              width: 100% !important;
//              height: auto !important;
//         }
//         </style>';
// }
// add_action( 'admin_head', 'fix_svg' );