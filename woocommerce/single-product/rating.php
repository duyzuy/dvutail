<?php

/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */


if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

global $product;

if ('no' === get_option('woocommerce_enable_review_rating')) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

/*
if ($rating_count > 0) : ?>

	<div class="woocommerce-product-rating">
		<?php echo wc_get_rating_html($average, $rating_count); ?>
		<?php if (comments_open()) : ?>
			<a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<?php printf(_n('%s customer review', '%s customer reviews', $review_count, 'woocommerce'), '<span class="count">' . esc_html($review_count) . '</span>'); ?>)</a>
		<?php endif ?>
	</div>
<?php endif;  */ ?>

<div class="meta-rating flex items-center text-sm text-gray-600 py-2">
	<span class="meta-value flex items-center gap-x-3">
		<?php if ($rating_count > 0) : ?>
			<span class="flex items-center">
				<span class="average mr-1"><?php echo $average; ?></span>
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill fill-orange-400" viewBox="0 0 16 16">
					<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
				</svg>
			</span>
			<?php if (comments_open()) : ?>
				<span class="mx-1">/</span>
				<a href="#reviews" class="woocommerce-review-link underline" rel="nofollow"><?php echo sprintf(__("%s đánh giá", 'dvutheme'), $review_count); ?></a>
			<?php endif ?>
		<?php else : ?>
			<span class="flex items-center">
				<span class="average mr-2"><?php echo __("Chưa có đánh giá", 'dvutheme') ?></span>
				<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-gray-300" fill="currentColor" z viewBox="0 0 16 16">
					<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
				</svg>
			</span>
			<?php if (comments_open()) : ?>
				<a href="#reviews" class="woocommerce-review-link underline" rel="nofollow"><?php echo __("Đánh giá ngay", 'dvutheme') ?></a>
			<?php endif ?>
		<?php endif; ?>
	</span>
</div>