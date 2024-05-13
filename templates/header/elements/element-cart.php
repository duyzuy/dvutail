

<?php 
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(is_plugin_active('woocommerce/woocommerce.php')){
	global $woocommerce; 
   	$items = WC()->cart->get_cart();
   	$item_count = $woocommerce->cart->cart_contents_count;
    $total =  WC()->cart->get_cart_total();
   	}

?>
<div class="dvu-item-cart">
    <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php _e('Giỏ hàng', 'dvutheme'); ?>"  class="btn-cart">
            <span class="dvu-icon size-24">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                </svg>
            </span>
           <span class="cart-count"><?php echo $item_count; ?></span>
            <span class="label"><?php _e('Giỏ hàng', 'dvutheme'); ?></span>
    </a>
    <div class="cart-dropdown">
        <div id="mode-mini-cart" class="widget_shopping_cart_content">
            <?php echo woocommerce_mini_cart(); ?>
        </div>
    </div>
</div>
