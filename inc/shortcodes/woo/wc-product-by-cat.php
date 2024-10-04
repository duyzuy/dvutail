<?php
function create_sc_product_by_cat($atts)
{
    $attr = shortcode_atts(array(
        'limit' => '10',
        'category' => '',
        'subcat'    => "",
        'class' => 'nm-col-2 sm-col-4 md-col-5 lg-col-5',
        'title' => 'Sâm củ khô',
        'link'  =>  '#',
    ), $atts);

    ob_start();

    if ($attr['subcat'] != null) {
        $subcat = explode(",", $attr['subcat']);
    }


    $term = get_term_by('id', $attr['category'], 'product_cat');
    $term_link = get_term_link($term->slug, 'product_cat');

    $args_product = array(
        'post_type'         => 'product',
        'post_status'       => 'publish',
        'posts_per_page'    => $attr['limit'],
    );

    if ($attr['category'] != '') {
        $args_product['tax_query'] = array(
            array(
                'taxonomy'      => 'product_cat',
                'field'         => 'term_id',
                'terms'         => $attr['category'],
                'operator'      => 'IN'
            )
        );
    }

    $product_items_query = new WP_Query($args_product);

?>
    <section id="product-cat-section-<?php echo $attr['category'] ?>" class="section-product-cat woocommerce">
        <div class="container mx-auto px-3 md:px-6 lg:px-8">
            <div class="inner-container">
                <div class="row-title mb-6">
                    <a href="<?php echo $term_link ?>">
                        <h2 class="text-2xl lg:text-3xl text-gray-800"><?php echo $term->name; ?></h2>
                    </a>
                </div>
                <?php if ($attr['subcat'] != null) : ?>
                    <div class="wc__categories">
                        <ul class="wc__cat_list">
                            <?php
                            $args = array(
                                'number'     => 16,
                                'orderby'    => '',
                                'order'      => '',
                                'hide_empty' => false,
                                'include'    => $subcat
                            );

                            $product_categories = get_terms('product_cat', $args);
                            $output = '';
                            foreach ($product_categories as $cat) {
                                $term_link = get_term_link($cat, 'product_cat');
                                $active = $cat->term_id == $attr['category'] ? " active" : "";
                                $output .= '<li class="sub__cat_item' . $active . '" data-id="' . $cat->term_id . '">';
                                $output .= '<a href="' . $term_link . '">' . $cat->name . '</a>';
                                $output .= '</li>';
                            }
                            echo $output;
                            ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="grid grid-cols-2 gap-3 lg:grid-cols-5 lg:gap-4">
                    <?php if ($product_items_query->have_posts()) : ?>
                        <?php while ($product_items_query->have_posts()) : $product_items_query->the_post();  ?>


                            <?php wc_get_template_part('content', 'product'); ?>


                        <?php endwhile; ?>

                    <?php else : ?>
                        <p>Đang cập nhật</p>
                    <?php endif; ?>
                    <?php wp_reset_postdata();    ?>
                </div>
            </div>
        </div>
    </section>
<?php
    return ob_get_clean();
}
add_shortcode('dvutail_product_bycat', 'create_sc_product_by_cat');
