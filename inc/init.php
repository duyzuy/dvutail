<?php

//ADMIN
require get_template_directory() . '/inc/admin/enqueue.php';
//FUNCTIONS
require get_template_directory() . '/inc/functions/wp-support.php';
require get_template_directory() . '/inc/functions/enqueue-script.php';
require get_template_directory() . '/inc/functions/walker.php';
require get_template_directory() . '/inc/functions/breadcrumbs.php';
require get_template_directory() . '/inc/functions/helpers.php';

/**
 * AJAX
 */
require get_template_directory() . '/inc/ajax/contact.php';

/**
 * HOOKS
 */
require get_template_directory() . '/inc/hooks/post.php';
require get_template_directory() . '/inc/hooks/single-post.php';
require get_template_directory() . '/inc/hooks/activity.php';
require get_template_directory() . '/inc/hooks/menu.php';

//SHORTCODE

require get_template_directory() . '/inc/shortcodes/sc-map.php';
require get_template_directory() . '/inc/shortcodes/sc-form-contact.php';



/**
 * woo
 */

require get_template_directory() . '/inc/shortcodes/woo/wc-product-featured.php';
require get_template_directory() . '/inc/shortcodes/woo/wc-product-by-cat.php';
require get_template_directory() . '/inc/shortcodes/woo/wc-product-brand.php';
require get_template_directory() . '/inc/shortcodes/woo/wc-product-category.php';


//WOOCOMMERCE
require get_template_directory() . '/inc/woocommerce/wc-global.php';
require get_template_directory() . '/inc/woocommerce/wc-product-box-content.php';
require get_template_directory() . '/inc/woocommerce/wc-single-product.php';
require get_template_directory() . '/inc/woocommerce/wc-archive.php';
require get_template_directory() . '/inc/woocommerce/wc-checkout.php';




require get_template_directory() . '/inc/shortcodes/helpers/init.php';
require get_template_directory() . '/inc/shortcodes/helpers/content-shortcodes/youtube.php';
require get_template_directory() . '/inc/shortcodes/helpers/content-shortcodes/row.php';
require get_template_directory() . '/inc/shortcodes/helpers/content-shortcodes/use.php';
// //classes
// require get_template_directory() . '/inc/classes/cl-html-compress.php';

//widgets
require get_template_directory() . '/inc/widgets/new-post.php';
require get_template_directory() . '/inc/widgets/category-post.php';

//mobile 
require get_template_directory() . '/inc/shortcodes/mobile/sc-banner-product-mobile.php';
//POST TYPE
require get_template_directory() . '/inc/post-types/post-type-slider.php';
require get_template_directory() . '/inc/post-types/product-brand.php';




//metaboxes
require get_template_directory() . '/inc/metaboxes/slider.php';
require get_template_directory() . '/inc/metaboxes/menu.php';
require get_template_directory() . '/inc/metaboxes/wc-product-extra-tab.php';
require get_template_directory() . '/inc/metaboxes/product-brand.php';
