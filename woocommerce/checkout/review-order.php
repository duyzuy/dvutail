<?php

/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined('ABSPATH') || exit;
?>
<div class="shop_table woocommerce-checkout-review-order-table">
	<div class="px-4 py-2 mb-3 border-t border-b">
		<div class="flex items-center justify-between">
			<div class="product-name"><?php esc_html_e('Product', 'woocommerce'); ?></div>
			<div class="product-total"><?php esc_html_e('Subtotal', 'woocommerce'); ?></div>
		</div>
	</div>
	<div>
		<?php
		do_action('woocommerce_review_order_before_cart_contents');
		foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
			$_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

			if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key)) {
		?>
				<div class="flex gap-4 border-b pb-3 mb-3 <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">
					<div class="dvutail-product-content flex flex-1 gap-4 items-center">
						<div class="product-image w-12 h-12 rounded-full border p-2">
							<?php
							$thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
							echo wp_kses_post($thumbnail);
							?>
						</div>
						<div class="product-name flex-1">
							<?php echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key)) . '&nbsp;'; ?>
							<div> <?php echo apply_filters('woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf('&times;&nbsp;%s', $cart_item['quantity']) . '</strong>', $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
										?></div>
							<?php echo wc_get_formatted_cart_item_data($cart_item); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
							?>
						</div>
					</div>
					<div class="product-total w-32 text-right">
						<?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
						?>
					</div>
				</div>
		<?php
			}
		}

		do_action('woocommerce_review_order_after_cart_contents');
		?>
	</div>
	<div class="dvutail-checkout__subtotal">
		<div class="cart-subtotal flex items-center justify-between">
			<div><?php esc_html_e('Subtotal', 'woocommerce'); ?></div>
			<div><span class="text-lg"><?php wc_cart_totals_subtotal_html(); ?></span></div>
		</div>
	</div>

	<?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
		<div class="cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
			<div><?php wc_cart_totals_coupon_label($coupon); ?></div>
			<div><?php wc_cart_totals_coupon_html($coupon); ?></div>
		</div>
	<?php endforeach; ?>

	<?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>

		<?php do_action('woocommerce_review_order_before_shipping'); ?>

		<?php wc_cart_totals_shipping_html(); ?>

		<?php do_action('woocommerce_review_order_after_shipping'); ?>

	<?php endif; ?>

	<?php foreach (WC()->cart->get_fees() as $fee) : ?>
		<div class="fee flex justify-between py-2">
			<div><?php echo esc_html($fee->name); ?></div>
			<div><?php wc_cart_totals_fee_html($fee); ?></div>
		</div>
	<?php endforeach; ?>

	<?php if (wc_tax_enabled() && ! WC()->cart->display_prices_including_tax()) : ?>
		<?php if ('itemized' === get_option('woocommerce_tax_total_display')) : ?>
			<?php foreach (WC()->cart->get_tax_totals() as $code => $tax) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited 
			?>
				<div class="tax-rate tax-rate-<?php echo esc_attr(sanitize_title($code)); ?>">
					<div><?php echo esc_html($tax->label); ?></div>
					<div><?php echo wp_kses_post($tax->formatted_amount); ?></div>
				</div>
			<?php endforeach; ?>
		<?php else : ?>
			<div class="tax-total">
				<div><?php echo esc_html(WC()->countries->tax_or_vat()); ?></div>
				<div><?php wc_cart_totals_taxes_total_html(); ?></div>
			</div>
		<?php endif; ?>
	<?php endif; ?>

	<?php do_action('woocommerce_review_order_before_order_total'); ?>

	<div class="order-total flex justify-between py-2">
		<div><?php esc_html_e('Total', 'woocommerce'); ?></div>
		<div class="text-xl text-rose-500"><?php wc_cart_totals_order_total_html(); ?></div>
	</div>
	<?php do_action('woocommerce_review_order_after_order_total'); ?>
</div>
</div>