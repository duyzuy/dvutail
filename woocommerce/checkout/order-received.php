<?php

/**
 * "Order received" message.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/order-received.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.8.0
 *
 * @var WC_Order|false $order
 */

defined('ABSPATH') || exit;

?>
<div class="mx-auto text-center">
	<span class="dvu-icon mb-2 mx-auto inline-block">
		<svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 220.17 215.858">
			<g id="Group_38069" data-name="Group 38069" transform="translate(-848.671 -303.142)">
				<g id="Group_37982" data-name="Group 37982" transform="translate(-3.363 -9)">
					<circle id="Ellipse_21417" data-name="Ellipse 21417" cx="56.5" cy="56.5" r="56.5" transform="translate(907.363 366)" fill="#16be01" />
					<path id="Path_68853" data-name="Path 68853" d="M562.728,13845.56l16,16.381,27.8-28.159" transform="translate(379.234 -13426.008)" fill="none" stroke="#fff" stroke-width="9" />
				</g>
				<circle id="Ellipse_21418" data-name="Ellipse 21418" cx="5.715" cy="5.715" r="5.715" transform="translate(1057.412 414.612)" fill="#7849e5" />
				<circle id="Ellipse_21419" data-name="Ellipse 21419" cx="6.852" cy="6.852" r="6.852" transform="translate(934.436 303.142)" fill="#1088ff" opacity="0.413" />
				<circle id="Ellipse_21420" data-name="Ellipse 21420" cx="3.077" cy="3.077" r="3.077" transform="translate(957.209 321.627)" fill="#16be00" />
				<circle id="Ellipse_21421" data-name="Ellipse 21421" cx="6.594" cy="6.594" r="6.594" transform="translate(882.049 366.333)" fill="#f40354" />
				<circle id="Ellipse_21422" data-name="Ellipse 21422" cx="3.767" cy="3.767" r="3.767" transform="translate(906.363 475.542)" fill="#7849e5" opacity="0.413" />
				<g id="Ellipse_21423" data-name="Ellipse 21423" transform="translate(943.602 503.175)" fill="none" stroke="#1088ff" stroke-width="4">
					<circle cx="7.912" cy="7.912" r="7.912" stroke="none" />
					<circle cx="7.912" cy="7.912" r="5.912" fill="none" />
				</g>
				<circle id="Ellipse_21424" data-name="Ellipse 21424" cx="3.517" cy="3.517" r="3.517" transform="translate(961.042 496.142)" fill="#b6d7f7" />
				<circle id="Ellipse_21425" data-name="Ellipse 21425" cx="2.517" cy="2.517" r="2.517" transform="translate(1050.881 400.669)" fill="#1088ff" />
				<path id="Path_68854" data-name="Path 68854" d="M525.292,13899.342s14.775,2.783,15.843,20.6" transform="translate(487.306 -13429.342)" fill="none" stroke="#7849e5" stroke-linecap="round" stroke-width="4" />
				<path id="Path_68855" data-name="Path 68855" d="M322,13864.766s15.275,4.559,19.86-9.443-6.779-14.164-8.488-9.486,1.733,11.629,12.956,9.486c6.823-1.445,10.155-7.625,10.155-7.625" transform="translate(529.159 -13415.479)" fill="none" stroke="#1088ff" stroke-linecap="round" stroke-width="4" />
				<path id="Path_68856" data-name="Path 68856" d="M537.559,13744.749s14.361,1.289,17.971-12.325,5.813-15.1,10.5-16.861" transform="translate(490.882 -13387.781)" fill="none" stroke="#7849e5" stroke-linecap="round" stroke-width="4" />
			</g>
		</svg>
	</span>
	<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received text-center text-green-600 mb-6 font-bold uppercase">
		<?php
		/**
		 * Filter the message shown after a checkout is complete.
		 *
		 * @since 2.2.0
		 *
		 * @param string         $message The message.
		 * @param WC_Order|false $order   The order created during checkout, or false if order data is not available.
		 */
		$message = apply_filters(
			'woocommerce_thankyou_order_received_text',
			esc_html(__('Thank you. Your order has been received.', 'woocommerce')),
			$order
		);

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo $message;
		?>
	</p>
</div>