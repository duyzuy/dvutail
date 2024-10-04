<?php
include_once(ABSPATH . 'wp-admin/includes/plugin.php');

if (is_plugin_active('woocommerce/woocommerce.php')) :
    global $woocommerce;
    $cart = $woocommerce->cart;
    $items =  $cart->get_cart();
    $item_count = $cart->cart_contents_count;
    $total =  $cart->get_cart_total();

?>
    <?php if (wp_is_mobile()):  ?>
        <div class="dvutail__cart">
            <a href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('Giỏ hàng', 'dvutail'); ?>" class="btn-cart text-xs p-1 inline-block">
                <span class="flex relative items-center justify-center text-gray-800">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="8" cy="21" r="1" />
                            <circle cx="19" cy="21" r="1" />
                            <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                        </svg>
                    </span>
                    <span class="cart-count absolute flex items-center justify-center rounded-full top-0 -right-3 w-4 h-4 text-xs bg-amber-500"><?php echo $item_count; ?></span>
                    <span class="label sr-only"><?php _e('Giỏ hàng', 'dvutail'); ?></span>
                </span>
            </a>
        </div>
    <?php else:  ?>
        <div class="dvutail__cart">
            <a href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('Giỏ hàng', 'dvutail'); ?>" class="btn-cart text-xs">
                <span class="flex relative w-9 h-9 bg-amber-500 rounded-full items-center justify-center text-gray-800">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="8" cy="21" r="1" />
                            <circle cx="19" cy="21" r="1" />
                            <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                        </svg>
                    </span>
                    <span class="cart-count absolute flex items-center justify-center rounded-full bottom-0 right-0"><?php echo $item_count; ?></span>
                    <span class="label sr-only"><?php _e('Giỏ hàng', 'dvutail'); ?></span>
                </span>
            </a>
            <div class="cart-dropdown hidden">
                <div class="absolute bg-white p-4 rounded-md shadow-sm">
                    <div id="mode-mini-cart" class="widget_shopping_cart_content">
                        <?php echo woocommerce_mini_cart(); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

<?php endif ?>