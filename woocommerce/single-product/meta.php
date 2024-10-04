<?php

/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */

if (! defined('ABSPATH')) {
	exit;
}

global $product;

?>
<div class="product_meta">

	<?php do_action('woocommerce_product_meta_start'); ?>

	<?php if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type('variable'))) : ?>

		<div class="sku_wrapper flex items-center text-sm text-gray-600 mb-3">
			<span class="meta-label w-32"><?php esc_html_e('SKU:', 'woocommerce'); ?></span>
			<span class="sku flex-1"><?php echo ($sku = $product->get_sku()) ? $sku : esc_html__('N/A', 'woocommerce'); ?></span>
		</div>

	<?php endif; ?>

	<?php echo wc_get_product_category_list($product->get_id(), ', ', '<div class="meta-cat flex items-center text-sm text-gray-600 mb-3">
		<span class="meta-label w-32">' . _n("Category:", "Categories:", count($product->get_category_ids()), "woocommerce") . '</span><span class="posted_in flex-1">', '</span></div>'); ?>

	<?php echo wc_get_product_tag_list($product->get_id(), ', ', '<div class="meta-tag flex items-center text-sm text-gray-600 mb-3"><span class="meta-label w-32">' . _n('Tag:', 'Tags:', count($product->get_tag_ids()), 'woocommerce') . '</span><span class="tagged_as flex-1">', '</span></div>'); ?>

	<?php do_action('woocommerce_product_meta_end'); ?>

</div>