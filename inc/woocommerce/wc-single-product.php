<?php

remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
add_action('woocommerce_after_single_product', 'woocommerce_output_related_products', 5);


// add_action('dvu_single_product_entry_title', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
add_action('dvu_single_product_header_meta', 'woocommerce_template_single_meta', 5);


remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
add_action('dvu_single_product_summary_header_top', 'woocommerce_template_single_title', 5);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action('woocommerce_single_product_summary', 'dvutail_single_product_price', 10);
function dvutail_single_product_price()
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
                $output .= '<span class="block"><ins class="text-2xl lg:text-3xl no-underline text-rose-600">' . wc_price($sale_price) . '</ins><del class="block opacity-40 text-lg">' . wc_price($regular_price) . '</del></span>';
            } else {
                $output .= '<span class="block"><ins class="text-2xl lg:text-3xl no-underline text-rose-600">' . wc_price($product_price) . '</ins></span>';
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
    echo '<div class="mb-6">' . $output . '</div>';
}

add_action('woocommerce_share', 'dvutail_social_sharing');
function dvutail_social_sharing()
{
?> <div class="social flex items-center gap-x-4 pt-6">
        <span class="social-label"><?php echo _e("Chia sẻ:", "dvutail") ?></span>
        <ul class="social-shares flex items-center">
            <li class="w-8 h-8 flex items-center justify-center bg-white rounded-full">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>&amp;src=sdkpreparse" title="<?php the_title() ?>" rel="nofollow" target="_blank">
                    <span class="w-6 h-6 bg-blue-100 block rounded-full text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                        </svg>
                    </span>
                </a>
            </li>
            <li class="w-8 h-8 flex items-center justify-center bg-white rounded-full">
                <a href="https://twitter.com/intent/tweet?text=<?php the_title() ?> &amp;url=<?php the_permalink() ?>" title="<?php the_title() ?>" rel="nofollow" target="_blank">
                    <span class="w-6 h-6 bg-blue-100 block rounded-full  text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-twitter">
                            <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z" />
                        </svg>
                    </span>
                </a>
            </li>
        </ul>

    </div>
<?php

}


/* Raplace rating star in single product */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
add_action('dvu_single_product_summary_header_top', 'woocommerce_template_single_rating', 5);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
add_action('dvu_single_product_header_meta', 'dvutail_singpe_product_excerpt', 30);
function dvutail_singpe_product_excerpt()
{
    global $product;
?>
    <div class="meta-value woocommerce-product-details__short-description flex-1 line-clamp-3 text-sm">
        <?php echo $product->get_short_description(); ?>
    </div>
    <?php
}

add_action('dvu_single_product_header_meta', 'dvu_product_attributes', 20);
function dvu_product_attributes()
{
    global $product;
    $product_id = $product->get_id();

    // $product_attributes = $product->get_attributes(); // Get the product attributes
    $attribute_taxonomies = wc_get_attribute_taxonomies();
    foreach ($attribute_taxonomies as $tax) :

        // echo $tax->attribute_label;

        $product_terms = wc_get_product_terms($product_id, 'pa_' . $tax->attribute_name);

        if (!empty($product_terms)) : ?>
            <div class="meta-attributes pa_<?php echo $tax->attribute_name; ?> flex items-center mb-3 text-sm">
                <span class="meta-label w-32"><?php echo $tax->attribute_label; ?></span>
                <div class="meta-value">
                    <?php foreach ($product_terms as $product_term) { ?>
                        <span class="attr-item"><?php echo $product_term->name; ?></span>
                    <?php } ?>
                </div>
            </div>
        <?php endif; ?>

    <?php endforeach; ?>
<?php
}

add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);
function woo_remove_product_tabs($tabs)
{
    unset($tabs['additional_information']);      // Remove the additional information tab
    return $tabs;
}

add_action('dv_before_comment_list', 'detail_customer_rating_view', 5);
function detail_customer_rating_view()
{
    global $product;
    $total = $product->get_rating_count();
    $rating_1 = $product->get_rating_count(1);
    $rating_2 = $product->get_rating_count(2);
    $rating_3 = $product->get_rating_count(3);
    $rating_4 = $product->get_rating_count(4);
    $rating_5 = $product->get_rating_count(5);

    $rating_count = $product->get_rating_count();
    $review_count = $product->get_review_count();
    $average      = $product->get_average_rating();


?>
    <div class="single_product_star_count flex items-center flex-wrap gap-4 justify-center md:justify-between bg-slate-50 px-6 py-3 rounded-md mb-6">
        <div class="total_star w-52 text-center">
            <p><?php echo _e("Đánh giá trung bình", 'dvutail') ?></p>
            <p><span class="average text-5xl"><?php echo $average ?></span></p>
            <p class="text-xs">
                <?php echo sprintf(__('%s nhận xét & %s đánh giá', 'dvutail'), $review_count, $rating_count) ?>
            </p>
            <div class="star-rating">
                <span class="flex gap-x-1 justify-center items-center">
                    <?php echo _e("Được xếp hạng", 'dvutail') ?>
                    <strong class="rating"><?php echo $average; ?></strong><span>/</span>
                    <?php echo _e("5 sao", 'dvutail') ?></span>
            </div>
        </div>
        <div class="star-list">
            <ul class="rated_star-list text-sm flex flex-col gap-2">
                <li class="flex items-center gap-2">
                    <span class="flex items-center">
                        <span>5</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="fill-orange-400">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                        </svg>
                        <span class="w-[90px] block">Rất hài lòng</span>
                    </span>
                    <div class="bar w-[120px] overflow-hidden bg-slate-200 rounded-full h-[6px] flex items-center justify-center relative">
                        <span class="bg-orange-300 absolute left-0 top-0 bottom-0 z-0" style="width: <?php echo (($rating_5 / $rating_count) * 100) ?>%"></span>
                    </div>
                    <span class="number relative z-10"><?php echo $rating_5 ?></span>
                </li>
                <li class="flex items-center gap-2">
                    <span class="flex items-center">
                        <span>4</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="fill-orange-400">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                        </svg>
                        <span class="w-[90px] block">Hài lòng</span>
                    </span>
                    <div class="bar w-[120px] overflow-hidden bg-slate-200 rounded-full h-[6px] flex items-center justify-center relative">
                        <span class="bg-orange-300 absolute left-0 top-0 bottom-0 z-0" style="width: <?php echo (($rating_4 / $rating_count) * 100) ?>%"></span>
                    </div>
                    <span><span class="number relative z-10"><?php echo $rating_4 ?></span></span>
                </li>
                <li class="flex items-center gap-2">
                    <span class="flex items-center">
                        <span>3</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="fill-orange-400">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                        </svg>
                        <span class="w-[90px] block">Bình thường</span>
                    </span>
                    <div class="bar w-[120px] overflow-hidden bg-slate-200 rounded-full h-[6px] flex items-center justify-center relative">

                        <span class="bg-orange-300 absolute left-0 top-0 bottom-0 z-0" style="width: <?php echo (($rating_3 / $rating_count) * 100) ?>%"></span>
                    </div>

                    <span class="number relative z-10"><?php echo $rating_3 ?></span>
                </li>
                <li class="flex items-center gap-2">
                    <span class="flex items-center">
                        <span>2</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="fill-orange-400">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                        </svg>
                        <span class="w-[90px] block">Không hài lòng</span>
                    </span>
                    <div class="bar w-[120px] overflow-hidden bg-slate-200 rounded-full h-[6px] flex items-center justify-center relative">
                        <span class="bg-orange-300 absolute left-0 top-0 bottom-0 z-0" style="width: <?php echo (($rating_2 / $rating_count) * 100) ?>%"></span>
                    </div>
                    <span class="number relative z-10"><?php echo $rating_2 ?></span>
                </li>
                <li class="flex items-center gap-2">
                    <span class="flex items-center">
                        <span>2</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="fill-orange-400">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                        </svg>
                        <span class="w-[90px] block">Thất vọng</span>
                    </span>
                    <div class="bar w-[120px] overflow-hidden bg-slate-200 rounded-full h-[6px] flex items-center justify-center relative">
                        <span class="bg-orange-300 absolute left-0 top-0 bottom-0 z-0" style="width: <?php echo (($rating_1 / $rating_count) * 100) ?>%"></span>
                    </div>
                    <span class="number relative z-10"><?php echo $rating_1 ?></span>
                </li>
            </ul>
        </div>
    </div>
    <?php
}


//change text

add_filter('woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text');
function woo_custom_cart_button_text()
{
    return __('Thêm vào giỏ', 'woocommerce');
}



//gift card

function wc_single_gift_items()
{
    global $post;

    $is_gift_card = get_post_meta($post->ID, '_gift_card', true);


    if ($is_gift_card && $is_gift_card == 'yes') {

        $show_promotions =  $is_gift_card = get_post_meta($post->ID, '_allow_promotios', true);

        if ($show_promotions == 'yes') {
            $promotion_day = get_post_meta($post->ID, '_wc_promotions_day', true);
            $gift_items = get_post_meta($post->ID, '_gift_items', true);
            $gift_note  = get_post_meta($post->ID, '_wc_promotions_note', true);

            // echo $promotion_time;


            $promotion_time = strtotime($promotion_day);

            $today = date("Y-m-d");
            $today = strtotime($today);
            $remain_day = $promotion_time - $today;
            $the_day = $remain_day / (24 * 60 * 60);


    ?>
            <div id="countdown" class="countdown">
                <div class="countdown__wrap">
                    <div class="countdown__title">
                        Còn lại
                    </div>
                    <div id="countdown__time" class="countdown__time">

                        <div class="countdown__days">
                            <span class="days"></span>
                            <span class="label">Ngày</span>
                        </div>
                        <div class="countdown__hours">
                            <span class="hours"></span>
                            <span class="label">Giờ</span>
                        </div>
                        <div class="countdown__minutes">
                            <span class="minutes"></span>
                            <span class="label">Phút</span>
                        </div>
                        <div class="countdown__seconds">
                            <span class="seconds"></span>
                            <span class="label">Giây</span>
                        </div>
                        <div class="promotion__day" data-prtime="<?php echo $promotion_day ?>"></div>
                    </div>
                </div>
            </div>
            <div class="promotions">
                <div class="promotions_title">
                    <span class="icsgsv2 icsgsv2-gift"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span></span>
                    <h6>Khuyến mại</h6>
                </div>
                <?php if ($gift_items) { ?>
                    <div class="promotions__items">
                        <div class="promotions__items__wrap">
                            <ul class="promotions_gift_items">
                                <?php
                                $gifts = array(
                                    'post_type' => 'product-gift',
                                    'post__in'   => $gift_items,
                                );

                                $gift_query = new WP_Query($gifts);

                                if ($gift_query->have_posts()) :
                                    while ($gift_query->have_posts()) : $gift_query->the_post();
                                        $gift_title = get_the_title();
                                        $gift_id = get_the_ID();
                                        $gift_link = get_post_meta(get_the_ID(), '_product_gift_link', true);
                                        $$gift_desc = get_post_meta(get_the_ID(), '_product_gift_desc', true);
                                        $gift_price = get_post_meta(get_the_ID(), '_gift_price', true);
                                        $gift_image = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                                        echo '<li class="promotions_gift_item">';
                                        if ($gift_link) {
                                            echo '<a href="' . $gift_link . '" class="promotions_item_wrap">';
                                        } else {
                                            echo '<div class="promotions_item_wrap">';
                                        }
                                        echo '<img src ="' . $gift_image . '" alt="' . $gift_title . '" />';

                                        echo '<div class="promotions_item_content"><p class="promotions_item_title">' . $gift_title . '</p>';
                                        if ($gift_price) {
                                            echo '<span class="price">' . wc_price($gift_price) . '</span>';
                                        }
                                        echo '</div>';
                                        if ($gift_link) {
                                            echo '</a>';
                                        } else {
                                            echo '</div>';
                                        }
                                        echo '</li>';

                                    endwhile;
                                    wp_reset_postdata();
                                endif;
                                ?>
                            </ul>
                        </div>
                    </div>
                <?php } ?>

                <?php if ($gift_note) {
                    echo '<div class="promotions_note">' . $gift_note . '</div>';
                }
                if ($promotion_time <= $today) {
                    echo '<div class="promotion__out_date"><span>Hết thời gian áp dụng</span></div>';
                }
                ?>
            </div>
    <?php
        }
    }
}
add_action('woocommerce_single_product_summary', 'wc_single_gift_items', 25);


// woocommerce_review_display_rating
remove_action('woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating');
add_action('woocommerce_review_before_comment_meta', 'dvutail_review_display_rating');
function dvutail_review_display_rating($comment)
{
    $rating = get_comment_meta($comment->comment_ID, 'rating', true);
    $verified = get_comment_meta($comment->comment_ID, 'verified', true);
    $aaaaa = get_comment_meta($comment->comment_ID, 'title', true);

    ?>
    <div class="flex items-center gap-2 mb-2">
        <div class="comment-star-rating relative w-fit">
            <div class="flex items-center gap-1">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" fill-gray-200" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                    </svg>
                </span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" fill-gray-200" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                    </svg>
                </span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" fill-gray-200" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                    </svg>
                </span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" fill-gray-200" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                    </svg>
                </span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" fill-gray-200" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                    </svg>
                </span>
            </div>
            <div class="flex gap-1 items-center absolute z-10 left-0 top-0 overflow-hidden" style="width: <?php echo floor(($rating / 5) *  100) ?>%;">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill fill-orange-400" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                    </svg>
                </span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill fill-orange-400" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                    </svg>
                </span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill fill-orange-400" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                    </svg>
                </span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill fill-orange-400" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                    </svg>
                </span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill fill-orange-400" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                    </svg>
                </span>
            </div>
        </div>
        <span>-</span>
        <span class="text-gray-600 text-sm">
            <?php
            if ($rating === "5") {
                echo "Rất hài lòng";
            }
            if ($rating === "4") {
                echo "Hài lòng";
            }
            if ($rating === "3") {
                echo "Bình thường";
            }
            if ($rating === "2") {
                echo "Không hài lòng";
            }
            if ($rating === "1") {
                echo "Thất vọng";
            }
            ?></span>
    </div>
<?php
}


/**
 * 
 * product info
 */


add_action('dvutail_single_product_extra_info', 'dvutail_show_extra_info', 5);
function dvutail_show_extra_info()
{

    global $post;

    $data = get_post_meta($post->ID, '_wc_product_info', true);
    if (empty($data)) {
        return;
    }
?>
    <div class="dvutail-product-extra-info bg-white p-3 lg:p-6 rounded-md shadow-sm mb-4 lg:mb-6">
        <div class="dvutail-product-extra-info__head mb-6 flex justify-between">
            <span class="product-descriptions-title text-lg lg:text-xl font-bold">Thông số kỹ thuật</span>
            <span class="text-blue-600 cursor-pointer js_product_detail text-xs lg:text-base">Xem chi tiết</span>
        </div>
        <div class="dvutail-product-extra-info__body lg:text-base text-sm">
            <?php foreach ($data as $key => $value) {
                if ($key === 6) {
                    break;
                }
            ?>
                <div class="flex py-2 px-3 <?php echo $key !== 0 && $key % 2 !== 0 ? "bg-slate-100" : 'bg-white'; ?>">
                    <div class="w-36 pr-2"><?php echo $value['name']; ?></div>
                    <div class="flex-1"><?php echo $value['value']; ?></div>
                </div>
            <?php } ?>
        </div>
        <div class="modal-extra-product fixed w-full h-full left-0 top-0 z-50 hidden pointer-events-none">
            <div class="overlay bg-slate-950/60 backdrop-blur-md absolute left-0 top-0 w-full h-full"></div>
            <div class="modal-extra-product__inner w-full h-full flex items-center justify-center px-4">
                <div class="modal-extra-product__content bg-white w-full max-w-[550px] relative z-10 p-6 rounded-md shadow-md">
                    <div class="modal-extra-product__content-head mb-3 py-2 text-center">
                        <span class="product-descriptions-title text-lg lg:text-xl font-bold">Thông số kỹ thuật</span>
                        <span class="absolute cursor-pointer top-2 right-2 js_button_closeModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                                <path d="M18 6 6 18" />
                                <path d="m6 6 12 12" />
                            </svg>
                        </span>
                    </div>
                    <div class="modal-extra-product__content-body">
                        <?php foreach ($data as $key => $value) { ?>
                            <div class="flex py-2 px-3 <?php echo $key !== 0 && $key % 2 !== 0 ? "bg-slate-100" : 'bg-white'; ?>">
                                <div class="w-36 pr-2"><?php echo $value['name']; ?></div>
                                <div class="flex-1"><?php echo $value['value']; ?></div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        (function($) {
            const container = $('.dvutail-product-extra-info')
            const modalDetail = $('.modal-extra-product')
            container.on('click', '.js_product_detail, .js_button_closeModal', function() {
                if (modalDetail.hasClass('hidden')) {
                    $("body").css({
                        overflowY: "hidden",
                        "touch-action": "none",
                        paddingRight: "15px",
                    });
                } else {
                    $("body").removeAttr("style");

                }
                modalDetail.toggleClass('hidden pointer-events-none')
            })
        })(jQuery)
    </script>
<?php

}



add_action('dvutail_single_product_extra_info', 'dvutail_product_rating_info', 0);
function dvutail_product_rating_info()
{
    global $post;
    $data = get_post_meta($post->ID, '_wc_product_rating', true);
    if (empty($data)) {
        return;
    }
?>
    <div class="dvutail-product-rating-info bg-white p-3 lg:p-6 rounded-md shadow-sm mb-3 lg:mb-6">
        <div class="dvutail-product-rating-info__head mb-4 lg:mb-6">
            <span class="product-descriptions-title text-lg lg:text-xl font-bold">Đánh giá từ chuyên gia</span>
            <p class="text-xs text-gray-500">Đánh giá dựa trên những phản hồi từ khách hàng và phân tích từ chuyên gia.</p>
        </div>
        <div class="dvutail-product-rating-info__body">
            <div class="rating-items grid lg:grid-cols-3 grid-cols-2 lg:gap-6 gap-3">
                <?php foreach ($data as $key => $value) {

                    $rating_percent = round(($value['value'] * 100) / 10, 2);
                    $color_bar = 'bg-green-600';
                    if ((int) $value['value'] < 5) {
                        $color_bar = 'bg-red-600';
                    }

                    if ((int) $value['value'] >= 5 && (int) $value['value'] < 7) {
                        $color_bar = 'bg-amber-400';
                    }
                ?>
                    <div class="rating-item">
                        <span class="mb-2 text-sm text-gray-600 flex justify-between">
                            <span class="rating-item__name flex-1 line-clamp-2"><?php echo $value['name']; ?></span>
                            <span class="rating-item__score w-6 inline-block"><?php echo  $value['value'] . '/' . '10'; ?></span></span>
                        <div class="w-full h-[4px] rounded-full bg-slate-200 relative overflow-hidden">
                            <span class="absolute left-0 top-0 bottom-0 <?php echo $color_bar; ?>" data-rating="<?php echo $value['value']; ?>" style="width: <?php echo $rating_percent . '%';  ?>"></span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php
}

function dvutail_show_brand()
{
    global $post;

    $terms = get_the_terms($post->ID, 'product_brand');

    if (!isset($terms) || empty($terms)) return;

    $term = $terms[0];

    $brand_logo_id = get_term_meta($term->term_id, '_brand_logo', true);
    $thumbnail_url = wp_get_attachment_url($brand_logo_id);

?>
    <div class="bg-white rounded-md lg:px-6 px-3 py-3 shadow-sm lg:mb-4 mb-3">
        <div class="flex items-center">
            <div class="brand-thumbnail w-12 h-12 flex items-center justify-center bg-white rounded-full mr-3 border-2 overflow-hidden">
                <img src="<?php echo $thumbnail_url ?>" alt="<?php echo $term->name; ?>" width="300" height="150" class="object-contain" />
            </div>
            <a href="<?php echo home_url() . '/brand' . '/' . $term->slug; ?>" class="flex-1 flex items-center justify-between">
                <div class="brand-content">
                    <h4 class="text-gray-800 leading-4"><?php echo $term->name ?></h4>
                    <span class="text-xs text-gray-500"><?php echo $term->count ?> sản phẩm</span>
                </div>
                <span class="text-gray-800 text-sm">
                    xem tất cả
                </span>
            </a>
        </div>
    </div>
<?php
}
