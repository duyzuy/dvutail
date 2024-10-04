<?php
remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 10);

remove_action('woocommerce_cart_is_empty', 'wc_empty_cart_message', 10);
add_action('woocommerce_cart_is_empty', 'dvutail_empty_cart_content', 10);
function dvutail_empty_cart_content()
{
?>
	<div class="dvu__cart-empty text-center mb-3">
		<img class="mx-auto" src="<?php echo get_template_directory_uri() . "/assets/images/empty-cart.png" ?>" alt="cart empty" width="220" />
		<div class="empty-cart-content text-center">
			<p class="fw-bold mb-0"><?php echo _e("Chưa có sản phẩm trong giỏ hàng.", "dvutheme") ?></p>
			<p><?php echo _e("Trở lại cửa hàng và mua sản phẩm.", "dvutheme") ?></p>
		</div>
	</div>

<?php

}


/* mini cart update */

add_filter('wp_ajax_nopriv_dvu_update_mini_cart', 'dvu_update_mini_cart');
add_filter('wp_ajax_dvu_update_mini_cart', 'dvu_update_mini_cart');

function dvu_update_mini_cart()
{
	echo wc_get_template('cart/mini-cart.php');
	die();
}


function enqueue_wc_cart_fragments()
{
	wp_enqueue_script('wc-cart-fragments');
}
add_action('wp_enqueue_scripts', 'enqueue_wc_cart_fragments');

add_filter('woocommerce_add_to_cart_fragments', 'header_add_to_cart_fragment', 30, 1);
function header_add_to_cart_fragment($fragments)
{
	global $woocommerce;

	ob_start();

?>

	<a href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('Giỏ hàng', 'dvutheme'); ?>" class="btn-cart">
		<span class="dvu-icon size-24">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
				<path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
			</svg>
		</span>
		<span class="cart-count"><?php echo $woocommerce->cart->cart_contents_count; ?></span>
		<span class="label"><?php _e('Giỏ hàng', 'dvutheme'); ?></span>
	</a>
<?php
	$fragments['.dvu-item-cart .btn-cart'] = ob_get_clean();

	return $fragments;
}


//single ajax

add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');

function woocommerce_ajax_add_to_cart()
{

	$product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
	$quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
	$variation_id = absint($_POST['variation_id']);
	$passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
	$product_status = get_post_status($product_id);

	if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

		do_action('woocommerce_ajax_added_to_cart', $product_id);

		if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
			wc_add_to_cart_message(array($product_id => $quantity), true);
		}

		WC_AJAX::get_refreshed_fragments();
	} else {

		$data = array(
			'error' => true,
			'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id)
		);

		echo wp_send_json($data);
	}

	wp_die();
}



/*
add_action( 'woocommerce_cart_totals_before_order_total', 'my_custom_buy_now_save_x_cart' );
function my_custom_buy_now_save_x_cart() {

	$savings = 0;

	foreach ( WC()->cart->get_cart() as $key => $cart_item ) {
	
		$product = $cart_item['data'];

		if ( $product->is_on_sale() ) {
			$savings += ( $product->get_regular_price() - $product->get_sale_price() ) * $cart_item['quantity'];
		}
	}

	if ( ! empty( $savings ) ) {
		?><tr class="order-savings">
			<th><?php _e( 'Your savings' ); ?></th>
			<td data-title="<?php _e( 'Your savings' ); ?>"><?php echo sprintf( __( 'Buy now and save %s!' ), wc_price( $savings ) ); ?></td>
		</tr><?php
	}

}
*/




function my_custom_show_sale_price_at_cart($old_display, $cart_item, $cart_item_key)
{

	/** @var WC_Product $product */
	$product = $cart_item['data'];

	if ($product) {
		return $product->get_price_html();
	}

	return $old_display;
}
add_filter('woocommerce_cart_item_price', 'my_custom_show_sale_price_at_cart', 10, 3);

function my_custom_show_sale_price_at_checkout($subtotal, $cart_item, $cart_item_key)
{

	/** @var WC_Product $product */
	$product = $cart_item['data'];
	$quantity = $cart_item['quantity'];
	$saving = 0;
	$output = "";
	if (! $product) {
		return $subtotal;
	}

	$regular_price = $sale_price = $suffix = '';

	if ($product->is_taxable()) {

		if ('excl' === WC()->cart->tax_display_cart) {

			$regular_price = wc_get_price_excluding_tax($product, array('price' => $product->get_regular_price(), 'qty' => $quantity));
			$sale_price    = wc_get_price_excluding_tax($product, array('price' => $product->get_sale_price(), 'qty' => $quantity));

			if (WC()->cart->prices_include_tax && WC()->cart->tax_total > 0) {
				$suffix .= ' <small class="tax_label">' . WC()->countries->ex_tax_or_vat() . '</small>';
			}
		} else {

			$regular_price = wc_get_price_including_tax($product, array('price' => $product->get_regular_price(), 'qty' => $quantity));
			$sale_price = wc_get_price_including_tax($product, array('price' => $product->get_sale_price(), 'qty' => $quantity));

			if (! WC()->cart->prices_include_tax && WC()->cart->tax_total > 0) {
				$suffix .= ' <small class="tax_label">' . WC()->countries->inc_tax_or_vat() . '</small>';
			}
		}
	} else {
		$regular_price    = $product->get_price() * $quantity;
		$sale_price       = $product->get_sale_price() * $quantity;
	}

	if ($product->is_on_sale() && ! empty($sale_price)) {
		// $price = wc_format_sale_price(
		// 	         wc_get_price_to_display( $product, array( 'price' => $product->get_regular_price(), 'qty' => $quantity ) ),
		// 	         wc_get_price_to_display( $product, array( 'qty' => $quantity ) )
		//          ) . $product->get_price_suffix();
		$price = wc_price($sale_price) . $product->get_price_suffix();
		$saving = $regular_price - $sale_price;
	} else {
		$price = wc_price($regular_price) . $product->get_price_suffix();
	}

	// VAT suffix
	$price = $price . $suffix;

	$output = '<span class="sub-total">' . $price . '</span>';

	if ($saving) {
		$output .= '<span class="saving">' . sprintf(__('Tiết kiệm: %s', 'dvutheme'), wc_price($saving)) . '</span>';
	}

	return $output;
}
add_filter('woocommerce_cart_item_subtotal', 'my_custom_show_sale_price_at_checkout', 10, 3);
