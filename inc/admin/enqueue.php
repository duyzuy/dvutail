<?php
function load_custom_wp_admin_style()
{
	$uri = get_template_directory_uri();
	$theme = wp_get_theme(get_template());
	$version = $theme->get('Version');
	global $pagenow;
	global $post_type;

	wp_enqueue_style('wp-color-picker');
	wp_enqueue_script('wp-color-picker');
	// wp_enqueue_script('jquery-ui-datepicker');
	// wp_enqueue_style('jquery-ui');
	// wp_enqueue_style('jquery-ui', $uri . '/assets/css/admin/jquery-ui.css', array(), $version, 'all');
	if ($post_type ==  'slider' || $post_type == 'activity' || $pagenow == 'edit-tags.php' || $pagenow == 'term.php' || $pagenow == 'post.php') {
		wp_enqueue_media();
	}


	// wp_enqueue_script( 'wp-color-picker-alpha', $uri.'/assets/js/admin/wp-color-picker-alpha.js', array( 'wp-color-picker' ), $version, true );     
	// wp_enqueue_script('media-js', $uri.'/assets/js/admin/media.js', array('jquery'), $version, false);


	wp_enqueue_script('dvu-datetime-js', $uri . '/assets/js/admin/jquery.datetimepicker.js',  array('jquery'), $version, true);
	wp_enqueue_script('dvu-select2', $uri . '/assets/js/admin/select2.js',  array('jquery'), $version, true);

	wp_enqueue_script('dvu-global-js', $uri . '/assets/js/admin/global.js',  array('jquery'), $version, true);
	wp_enqueue_style('dvu-admin-global', $uri . '/assets/css/admin/global.css', array(), $version, 'all');

	wp_enqueue_style('dvu-datepicker', $uri . '/assets/css/admin/jquery.datetimepicker.css', array(), $version, 'all');
	wp_enqueue_style('dvu-select2', $uri . '/assets/css/admin/select2.css', array(), $version, 'all');
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');
