<?php

/**
 * Checkout coupon form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-coupon.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined('ABSPATH') || exit;

if (! wc_coupons_enabled()) { // @codingStandardsIgnoreLine.
	return;
}

?>
<div class="dvu__checkout-form-coupon mb-3 bg-white rounded-md shadow-sm">
	<div class="woocommerce-form-coupon-toggle">
		<?php
		$html = '<div class="lg:px-6 px-3 py-3 flex items-center"><span class="mr-2 fill-transparent stroke-gray-950 stroke-[1.5]"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
				<path d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z" /><path d="M13 5v2" /><path d="M13 17v2" /><path d="M13 11v2" /></svg>
		</span>' . esc_html__('Have a coupon?', 'woocommerce') . ' <a href="#" class="showcoupon text-blue-600">' . esc_html__('Click here to enter your code', 'woocommerce') . '</a></div>';

		wc_print_notice(apply_filters('woocommerce_checkout_coupon_message', $html), 'notice'); ?>
	</div>

	<form class="checkout_coupon woocommerce-form-coupon" method="post" style="display:none">
		<div class="dvu__inner-form lg:px-6 px-3 lg:pb-6 pb-3">
			<p class="mb-3"><?php esc_html_e('If you have a coupon code, please apply it below.', 'woocommerce'); ?></p>
			<div class="input-group flex items-center">
				<div class="col-auto">
					<label for="coupon_code" class="screen-reader-text"><?php esc_html_e('Coupon:', 'woocommerce'); ?></label>
					<input type="text" name="coupon_code" class="h-10 px-3 rounded-md border-gray-300 input-text form-control" placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>" id="coupon_code" value="" />
				</div>
				<button type="submit" class="h-10 bg-blue-500 ml-3 px-3 rounded-md text-white btn button<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>"><?php esc_html_e('Apply coupon', 'woocommerce'); ?></button>
			</div>
		</div>
	</form>

</div>