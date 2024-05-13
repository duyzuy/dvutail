<?php

//ADMIN
require get_template_directory() . '/inc/admin/enqueue.php';
//FUNCTIONS
require get_template_directory() . '/inc/functions/fc-setups.php';
require get_template_directory() . '/inc/functions/fc-breadcrumbs.php';
require get_template_directory() . '/inc/functions/fc-walker.php';
require get_template_directory() . '/inc/functions/fc-helper.php';
require get_template_directory() . '/inc/functions/fc-script.php';
require get_template_directory() . '/inc/functions/fc-structure-ajax.php';


//HOOKS
require get_template_directory() . '/inc/hooks/polylang.php';
require get_template_directory() . '/inc/hooks/post.php';
require get_template_directory() . '/inc/hooks/single-post.php';
require get_template_directory() . '/inc/hooks/activity.php';

//SHORTCODE

require get_template_directory() . '/inc/shortcodes/sc-slider.php';
require get_template_directory() . '/inc/shortcodes/sc-partner.php';
require get_template_directory() . '/inc/shortcodes/sc-blog-post.php';
require get_template_directory() . '/inc/shortcodes/sc-blog-post-list.php';
require get_template_directory() . '/inc/shortcodes/sc-register-form.php';



require get_template_directory() . '/inc/shortcodes/sc-page-contact.php';
require get_template_directory() . '/inc/shortcodes/sc-page-map.php';
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
require get_template_directory() . '/inc/post-types/post-type-speaker.php';
require get_template_directory() . '/inc/post-types/post-type-activity.php';



//metaboxes

require get_template_directory() . '/inc/metaboxes/slider.php';
require get_template_directory() . '/inc/metaboxes/activity-metabox.php';
require get_template_directory() . '/inc/metaboxes/activity-host.php';
