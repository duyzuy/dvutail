<?php


// add_action('dvu_before_archive_layout_header', 'wc_category_header', 5);
function wc_category_header()
{

    if (is_product_category()) {
        global $wp_query;
        $cat = $wp_query->get_queried_object();

        // $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
        $term_meta = get_option("taxonomy_" . $cat->term_id);

        $image = wp_get_attachment_url($term_meta['wc_banner']);
        $classes = $image ? 'has-image' : 'no-image';
        echo '<div class="wc__header ' . $classes . '">';
        if ($image) {
            echo '<img class="gb_promo_image" src="' . $image . '" alt="' . $cat->name . '" />';
        }
        echo '</div>';
    }
}


remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
// add_action('dvu_before_archive_layout_header', 'woocommerce_breadcrumb', 10);

add_action('wc_single_product_header', 'woocommerce_breadcrumb', 10);


// remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);


// * @hooked woocommerce_result_count - 20
// * @hooked woocommerce_catalog_ordering - 30

add_action('woocommerce_shop_loop_header', 'dvutail_show_brand_taxonomy', 20);
function dvutail_show_brand_taxonomy()
{

    /**
     * get related second taxonomy
     */
    $product_category_id      = get_queried_object_id();
    $args = array(
        'numberposts' => -1,
        'post_type' => array('product'),
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $product_category_id,
            ),
        ),
    );
    $cat_posts  = get_posts($args);
    $my_post_ids = wp_list_pluck($cat_posts, 'ID');
    $terms_cat    = wp_get_object_terms($my_post_ids, 'product_brand');

    if (!empty($terms_cat)) : ?>
        <div class="dvutail-brand w-full overflow-x-auto py-2">
            <div class="dvutail-brand__items flex gap-3 lg:gap-4 mb-3 lg:mb-6">
                <?php foreach ($terms_cat as $term):
                    $cat_thumb_id = get_term_meta($term->term_id, '_brand_logo', true);
                    $cat_thumb_url = home_url() . '/wp-content/uploads/woocommerce-placeholder.png';

                    $brand_logo_id = get_term_meta($term->term_id, '_brand_logo', true);

                    if (isset($cat_thumb_id) && $cat_thumb_id) {
                        $cat_thumb_url = wp_get_attachment_url($brand_logo_id);
                    }

                    $cat_name = $term->name;
                    $term_link = get_term_link($term);
                ?>
                    <div class="dvutail-brand-item w-24 min-w-24 lg:w-28 lg:min-w-28 p-1 lg:p-2 rounded-md shadow-sm bg-white transition-transform hover:shadow-md hover:translate-y-[-2px]">
                        <a alt="<?php echo $cat_name ?>" href="<?php echo  esc_url($term_link) ?> ">
                            <div class="dvutail-brand-item__thumbnail w-16 flex items-center justify-center rounded-full mx-auto mb-1">
                                <img src="<?php echo $cat_thumb_url; ?>" class="w-full" />
                            </div>
                            <h4 class="dvutail-brand-item__content text-gray-800 lg:text-base text-sm line-clamp-2 text-center">
                                <?php echo $cat_name ?>
                            </h4>
                        </a>
                    </div>
                <?php
                endforeach; ?>
            </div>
        </div>
<?php endif;
}
