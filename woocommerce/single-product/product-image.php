<?php

/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.0.0
 */

defined('ABSPATH') || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if (!function_exists('wc_get_gallery_image_html')) {
	return;
}

global $product;

$attachment_ids = $product->get_gallery_image_ids();

$columns           = apply_filters('woocommerce_product_thumbnails_columns', 4);
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ($post_thumbnail_id ? 'with-images' : 'without-images'),
		'woocommerce-product-gallery--columns-' . absint($columns),
		'images',
	)
);
?>
<div class="<?php echo esc_attr(implode(' ', array_map('sanitize_html_class', $wrapper_classes))); ?>" data-columns="<?php echo esc_attr($columns); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	<div class="woocommerce-product-gallery__wrapper">
		<?php
		if ($post_thumbnail_id) {
			$html = wc_get_gallery_image_html($post_thumbnail_id, true);
			array_unshift($attachment_ids, $post_thumbnail_id);
			$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
		} else {
			$html .= sprintf('<img src="%s" alt="%s" class="wp-post-image" />', esc_url(wc_placeholder_img_src('woocommerce_single')), esc_html__('Awaiting product image', 'woocommerce'));
			$html .= '</div>';
		}

		//	echo apply_filters('woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
		//		do_action('woocommerce_product_thumbnails'); 
		?>
		<?php if (wp_is_mobile()):  ?>
			<div class="single-product-gallery__mobile swiper pb-6">
				<div class="swiper-wrapper">
					<?php
					foreach ($attachment_ids as $thumbnail_id) {
						$thumb_url = wp_get_attachment_url($thumbnail_id);
					?>
						<div class="swiper-slide flex items-center justify-center h-full pt-[100%] relative">
							<img src="<?php echo 	$thumb_url; ?>" class="absolute w-full h-full top-0 left-0 object-contain" />
						</div>
					<?php	}	?>
				</div>
				<div class="swiper-pagination"></div>
			</div>
		<?php else: ?>
			<div class="flex">
				<!-- w-32 h-[550px] -->
				<div class="swiper single-product-gallery-thumbs mr-4 h-[320px] md:h-[550px]">
					<div class="swiper-wrapper">
						<?php foreach ($attachment_ids as $thumbnail_id) {
							$thumb_url = wp_get_attachment_url($thumbnail_id);
						?>
							<div class="swiper-slide md:w-24 md:h-24 h-12 w-12">
								<img src="<?php echo 	$thumb_url; ?>" class="w-full h-full object-cover" />
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="single-product-gallery__desktop swiper flex-1">
					<div class="swiper-wrapper">
						<?php
						foreach ($attachment_ids as $thumbnail_id) {
							$thumb_url = wp_get_attachment_url($thumbnail_id);
						?>
							<div class="swiper-slide flex items-center justify-center h-full pt-[100%] relative">
								<img src="<?php echo 	$thumb_url; ?>" class="absolute w-full h-full top-0 left-0 object-contain" />
							</div>
						<?php	}	?>
					</div>
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
			</div>
		<?php endif;  ?>
	</div>
</div>