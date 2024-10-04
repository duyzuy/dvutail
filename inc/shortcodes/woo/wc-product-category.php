<?php
function dvutail_create_shortcode_category_product($atts)
{
    $attr = shortcode_atts(array(
        'title' => 'Tất cả các danh mục'
    ), $atts);

    ob_start();


    $cat_args = array(
        'orderby'    => 'order',
        'order'      => 'asc',
        'hide_empty' => true,
    );

    $product_categories = get_terms('product_cat', $cat_args);

    if (empty($product_categories)) return; ?>

    <div class="dvutail-product-category container mx-auto lg:px-8 md:px-6 px-3">
        <div class="row-title mb-3 lg:mb-6">
            <h3 class="text-2xl lg:text-3xl text-gray-800">Danh mục ngành hàng</h3>
        </div>

        <div class="dvutail-product-category__container">
            <div class="dvutail-product-category__swiper swiper">
                <div class="swiper-wrapper py-3 max-h-[320px]">
                    <?php
                    foreach ($product_categories as $key => $cat) {

                        $cat_thumb_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
                        if ($cat_thumb_id == 0) {
                            $cat_thumb_url = home_url() . '/wp-content/uploads/woocommerce-placeholder.png';
                        } else {
                            $cat_thumb_url = wp_get_attachment_thumb_url($cat_thumb_id);
                        }
                    ?>
                        <div class="category-item swiper-slide w-[100px] lg:w-[140px] bg-white lg:p-3 p-2 rounded-md shadow-sm hover:shadow-md transition-transform cursor-pointer hover:translate-y-[-2px]">
                            <a href="<?php echo get_term_link($cat) ?>" class="block text-center">
                                <div class="w-12 h-12 mb-1 mx-auto">
                                    <img src="<?php echo $cat_thumb_url ?>" alt="<?php echo $cat->name ?>" width="100" />
                                </div>
                                <h3 class="text-gray-800 line-clamp-2 h-10 lg:h-12 text-sm lg:text-base"><?php echo $cat->name; ?></h3>
                                <span class="text-gray-500 text-xs"><?php echo $cat->count . ' sản phẩm'; ?></span>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php

    return ob_get_clean();
}
add_shortcode('dvutail_product_categories', 'dvutail_create_shortcode_category_product');
