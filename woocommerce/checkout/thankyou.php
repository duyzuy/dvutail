<?php

/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.1.0
 *
 * @var WC_Order $order
 */

defined('ABSPATH') || exit;
?>

<div class="woocommerce-order dvu__thankyou-layout">
	<div class="inner w-full max-w-[650px] mx-auto">
		<?php
		if ($order) :
			do_action('woocommerce_before_thankyou', $order->get_id());
		?>

			<?php if ($order->has_status('failed')) : ?>
				<div class="dvu__order-fail">
					<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce'); ?></p>
					<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
						<a href="<?php echo esc_url($order->get_checkout_payment_url()); ?>" class="button pay"><?php esc_html_e('Pay', 'woocommerce'); ?></a>
						<?php if (is_user_logged_in()) : ?>
							<a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="button pay"><?php esc_html_e('My account', 'woocommerce'); ?></a>
						<?php endif; ?>
					</p>
				</div>
			<?php else : ?>
				<div class="dvu__order-success bg-white rounded-md lg:p-6 p-4 shadow-sm mb-6">
					<?php wc_get_template('checkout/order-received.php', array('order' => $order)); ?>
					<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details w-full mx-auto grid grid-cols-2 lg:grid-cols-2 gap-3 break-words">
						<li class="py-1 woocommerce-order-overview__order order">
							<span class="inline-block text-gray-500 text-sm"><?php esc_html_e('Order number:', 'woocommerce'); ?></span>
							<div class="content-order">
								<span class="font-[500]"><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
																					?></span>
							</div>
						</li>

						<li class="py-1 woocommerce-order-overview__date date">
							<span class="inline-block text-gray-500 text-sm"><?php esc_html_e('Date:', 'woocommerce'); ?></span>
							<div class="content-order">
								<span class="font-[500]"><?php echo wc_format_datetime($order->get_date_created()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
																					?></span>
							</div>
						</li>

						<?php if (is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email()) : ?>
							<li class="py-1 woocommerce-order-overview__email email">
								<span class="inline-block text-gray-500 text-sm"><?php esc_html_e('Email:', 'woocommerce'); ?></span>
								<div class="content-order">
									<span class="font-[500]"><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
																						?></span>
								</div>
							</li>
						<?php endif; ?>

						<li class="py-1 woocommerce-order-overview__total total">
							<span class="inline-block text-gray-500 text-sm"><?php esc_html_e('Total:', 'woocommerce'); ?></span>
							<div class="content-order">
								<span class="font-[500]"><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
																					?></span>
							</div>
						</li>

						<?php if ($order->get_payment_method_title()) : ?>
							<li class="py-1 woocommerce-order-overview__payment-method method">
								<span class="inline-block text-gray-500 text-sm"><?php esc_html_e('Payment method:', 'woocommerce'); ?></span>
								<div class="content-order">
									<span class="font-[500]"><?php echo wp_kses_post($order->get_payment_method_title()); ?></span>
								</div>
							</li>
						<?php endif; ?>
					</ul>
				</div>
			<?php endif; ?>
			<?php do_action('woocommerce_thankyou', $order->get_id()); ?>

			<div class="dvu__payment-method-note bg-white rounded-md lg:p-6 p-4 shadow-sm mb-6">
				<?php do_action('woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id()); ?>
			</div>

		<?php else : ?>
			<div class="dvu__order-success bg-white rounded-md lg:p-6 p-4 shadow-sm mb-6">
				<?php wc_get_template('checkout/order-received.php', array('order' => false)); ?>
			</div>
		<?php endif; ?>

	</div>
</div>