<?php

// remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
// remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);


remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

/**
 * 
 * Custom product thumbail
 * 
 */
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action('woocommerce_before_shop_loop_item_title', 'dvutail_woocommerce_product_thumbnail', 10);

//remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);

function dvutail_woocommerce_product_thumbnail()
{
    global $post;
    $url = get_the_post_thumbnail_url($post->ID, 'medium');
    $title = get_the_title($post->ID);
?>
    <div class="relative pt-[100%] mb-3">
        <img src="<?php echo $url; ?>" loading="lazy" alt="<?php echo $title; ?>" class="w-full h-full object-contain absolute top-0 left-0" />
    </div>
<?php
}

/**
 * 
 * Custom product title
 * 
 */
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action('woocommerce_shop_loop_item_title', 'dvutail_custom_box_product_title', 20);

function dvutail_custom_box_product_title()
{
    echo '<h3 itemprop="name" class="product-title text-sm md:text-lg mb-1 lg:mb-3 line-clamp-2"> ' . get_the_title() . ' </h3>';
}

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
add_action('dvu_bottom_product_box', 'get_star_rating', 5);

function get_star_rating()
{
    global $woocommerce, $product;
    $average = $product->get_average_rating();
    $rating_count = $product->get_rating_count();
    $review_count = $product->get_review_count();

    $output  =  '<span class="star-rating">';
    $output .= '<span style="width:' . (($average / 5) * 100) . '%"></span>';
    $output .= '</span>';

    if ($average) {
        $output .= '<span class="count">' . sprintf(__('%s đánh giá', 'dvutheme'), $rating_count) . '</span>';
    }
    echo $output;
}


//Hook prcie instate

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
add_action('woocommerce_after_shop_loop_item_title', 'dvutail_template_loop_price', 15);

function dvutail_template_loop_price()
{
    global $product;
    // $current_currency = get_woocommerce_currency_symbol(); 

    $regular_price = $product->get_regular_price();
    $sale_price = $product->get_sale_price();
    $output = '';
    $product_price = $product->get_price();
    // $product->get_price_html()
    if ($product->is_type('simple') || $product->is_type('external')) {
        if ($regular_price) {
            if ($sale_price) {
                $output .= '<span class="block"><ins class="text-lg md:text-xl no-underline text-rose-600">' . wc_price($sale_price) . '</ins><del class="text-sm lg:text-base block opacity-60">' . wc_price($regular_price) . '</del></span>';
            } else {
                $output .= '<span class="block"><ins class="text-lg md:text-xl no-underline text-rose-600">' . wc_price($product_price) . '</ins></span>';
            }
        } else {
            $output .= '<span class="wc_noprice">Liên hệ</span>';
        }
    } else if ($product->is_type('variable')) {
        $price = '';
        $available_variations = $product->get_available_variations();
        $maximumper = 0;

        for ($i = 0; $i < count($available_variations); ++$i) {
            $variation_id = $available_variations[$i]['variation_id'];
            $variable_product1 = new WC_Product_Variation($variation_id);

            if (!$variable_product1->is_on_sale()) continue;
            $regular_price = $variable_product1->get_regular_price();
            $sale_price = $variable_product1->get_sale_price();
            $percentage = round(((floatval($regular_price) - floatval($sale_price)) / floatval($regular_price)) * 100);

            if ($percentage > $maximumper) {
                $maximumper = $percentage;
            }
        }
        $price = sprintf(__('%s', 'woocommerce'), $maximumper);
    } else {

        $price = __('Sale!', 'woocommerce');
    }
    echo $output;
}

if (!function_exists('neo_wc_product_box_add_to_cart')) {
    /**
     * Add 'Add to cart' icon
     */
    function neo_wc_product_box_add_to_cart()
    {

        global $product;
        echo apply_filters(
            'woocommerce_loop_add_to_cart_link',
            sprintf(
                '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s %s add-to-cart-grid" title="%s">
        <i class="sghome-icon sghome-shop"></i><i class="loading-icon sgh-loading"></i></a>',
                esc_url($product->add_to_cart_url()),
                esc_attr(isset($quantity) ? $quantity : 1),
                esc_attr($product->get_id()),
                esc_attr($product->get_sku()),
                esc_attr($product->is_type('variable') || $product->is_type('grouped') ? '' : 'ajax_add_to_cart'),
                esc_attr(isset($class) ? $class : 'add_to_cart_button'),
                esc_html($product->add_to_cart_text())
            ),
            $product
        );
    }
}
add_action('sgh_action_tool_product_box', 'neo_wc_product_box_add_to_cart', 45);
