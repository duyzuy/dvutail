<?php

/**
 * Description tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $post;

$heading = esc_html(apply_filters('woocommerce_product_description_heading', __('Description', 'woocommerce')));

?>
<div class="title-row-product mb-6">
    <span class="product-descriptions-title text-xl font-bold"><?php echo _e("Thông tin sản phẩm", "dvutheme") ?></span>
</div>

<?php $link_youtube = get_post_meta(get_the_ID(), '_wc_link_vd', true);
if ($link_youtube) { ?>
    <div class="videoWrapper">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $link_youtube ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
    <style>
        .videoWrapper {
            position: relative;
            padding-bottom: 56.25%;
            /* 16:9 */
            padding-top: 25px;
            height: 0;
            margin-bottom: 30px
        }

        .videoWrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
<?php } ?>
<div class="dvu__single-product-description h-[220px] overflow-hidden relative lg:text-base text-sm">
    <?php the_content(); ?>
    <div class="dvu__single-product-expand flex items-end justify-center bg-gradient-to-t from-white via-white/90 via-[60%] to-transparent absolute bottom-0 left-0 w-full h-[100px]">
        <span class="cursor-pointer btn-shorted">
            <span class="btn-text-expand"><?php _e("Xem thêm", "dvutheme") ?></span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-expand mx-auto" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 8M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10" />
            </svg>
        </span>
    </div>
</div>