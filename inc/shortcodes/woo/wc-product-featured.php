<?php
function create_sc_wc_product_featured($atts)
{
    wp_enqueue_script('featured-product-swiper');

    $attr = shortcode_atts(array(
        'limit' => '12',
        'class' => 'nm-col-2 xsm-col-3 sm-col-4 md-col-5 lg-col-6',
        'title' => 'Sản phẩm nổi bật'
    ), $atts);

    ob_start();

    $args = array(
        'post_type' => 'product',
        'post_status'           => 'publish',
        'posts_per_page' => $attr['limit'],
        'tax_query'             => array(
            array(
                'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => 'featured',
            )
        )
    );

    $loop = new WP_Query($args);
?>
    <section class="section-product-featured">
        <div class="container mx-auto px-3 md:px-6 lg:px-8">
            <div class="row-title mb-6">
                <h3 class="text-2xl lg:text-3xl"><?php echo $attr['title'] ?></h3>
            </div>
            <div class="product-featured-wraper relative">
                <?php if ($loop->have_posts()) : ?>
                    <div class="dvuytail__swiper-product-featured swiper">
                        <div class="swiper-wrapper">
                            <?php while ($loop->have_posts()) : $loop->the_post(); ?>

                                <div class="swiper-slide h-auto">
                                    <?php wc_get_template_part('content', 'product'); ?>
                                </div>
                            <?php endwhile; ?>
                        </div>

                    </div>
                    <div class="product__featured-slide-pagination text-center"></div>
                    <!-- If we need navigation buttons -->
                    <div class="md:block hidden">
                        <div class="product__featured-slide-prev w-9 h-9 drop-shadow-md cursor-pointer rounded-full text-gray-600 bg-white border border-white hover:border-rose-500 flex items-center justify-center absolute z-10 -left-4 top-[50%] -translate-y-[50%]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m15 18-6-6 6-6" />
                            </svg>
                        </div>
                        <div class="product__featured-slide-next w-9 h-9 drop-shadow-md cursor-pointer rounded-full text-gray-600 bg-white border border-white hover:border-rose-500 flex items-center justify-center absolute z-10 -right-4 top-[50%] -translate-y-[50%]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </div>
                    </div>
                <?php else : ?>
                    <p>Đang cập nhật </p>
                <?php endif; ?>

                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
<?php
    return ob_get_clean();
}
add_shortcode('dvutail_product_featured', 'create_sc_wc_product_featured');
