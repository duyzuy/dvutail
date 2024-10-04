<?php

function dvutail_setup()
{

    /* add title tag support */
    add_theme_support('title-tag');

    /* Load child theme languages */
    load_theme_textdomain('dvutail', get_stylesheet_directory() . '/languages');

    /* load theme languages */
    load_theme_textdomain('dvutail', get_template_directory() . '/languages');

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
        'primary' => __('Main Menu', 'dvutail'),
        'vertical' => __('Vertical Menu', 'dvutail'),
        'primary_mobile' => __('Main Menu - Mobile', 'dvutail'),
        'footer' => __('Footer Menu', 'dvutail'),
        'top_bar_nav' => __('Top Bar Menu', 'dvutail'),
    ));

    /*  Enable support for Post Formats */
    add_theme_support('post-formats', array('video'));
}
add_action('after_setup_theme', 'dvutail_setup');

function dvutail_add_theme_support_woo()
{
    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'dvutail_add_theme_support_woo');


/**
 * 
 * Register widgets
 * 
 */
function dvutail_widgets_init()
{

    $title_after = '';

    register_sidebar(array(
        'name'          => __('Blog Sidebar', 'dvutail'),
        'id'            => 'sidebar-blog',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>' . $title_after,
    ));

    register_sidebar(array(
        'name'          => __('Page Sidebar', 'dvutail'),
        'id'            => 'sidebar-page',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>' . $title_after,
    ));
    register_sidebar(array(
        'name'          => __('Footer 1', 'dvutail'),
        'id'            => 'sidebar-footer-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-title">',
        'after_title'   => '</div>',
    ));
    register_sidebar(array(
        'name'          => __('Footer 2', 'dvutail'),
        'id'            => 'sidebar-footer-2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-title">',
        'after_title'   => '</div>',
    ));
}
add_action('widgets_init', 'dvutail_widgets_init');

add_filter('woocommerce_enqueue_styles', '__return_false');


function dvutail_remove_emoji_icon()
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
add_action('init', 'dvutail_remove_emoji_icon');



/**
 * 
 * Allow svg to media upload
 */
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
