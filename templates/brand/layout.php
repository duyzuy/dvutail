<?php $term = get_queried_object();

$taxonomy = $term->taxonomy;

$term_meta = get_term_meta($term->term_id, '_brand_logo');
$brand_logo_id = get_term_meta($term->term_id, '_brand_logo', true);

$thumbnail_url = wp_get_attachment_url($brand_logo_id);
$description = term_description($term->term_id, $taxonomy);

/**
 * get related second taxonomy
 */
$product_brand_id      = get_queried_object_id();
$args = array(
    'numberposts' => -1,
    'post_type' => array('product'),
    'tax_query' => array(
        array(
            'taxonomy' => 'product_brand',
            'field'    => 'term_id',
            'terms'    => $product_brand_id,
        ),
    ),
);
$cat_posts  = get_posts($args);
$my_post_ids = wp_list_pluck($cat_posts, 'ID');
$terms_cat    = wp_get_object_terms($my_post_ids, 'product_cat');
?>

<div class="taxonomy-brand mb-6 pt-8" data-id="<?php echo $term->term_id; ?>">
    <div class="container mx-auto lg:px-8 md:px-6 px-3">
        <div class="taxonomy-brand__head py-4 lg:py-6 mb-3 lg:mb-6 bg-white rounded-md shadow-sm lg:px-6 px-3">
            <div class="taxonomy-brand__head-inner flex flex-wrap">
                <div class="taxonomy-brand__logo w-[80px] h-[80px] mr-6 border flex items-center justify-center rounded-full bg-white shadow-sm p-4">
                    <?php if ($thumbnail_url): ?>
                        <img src="<?php echo  $thumbnail_url; ?>" class="max-w-full" />
                    <?php else: ?>
                        <span class="text-xs italic">no image</span>
                    <?php endif; ?>
                </div>
                <div class="taxonomy-brand__content flex-1">
                    <h1 class="entry-title text-2xl lg:text-4xl"><?php echo is_tax() ?  single_term_title() : post_type_archive_title(); ?></h1>
                    <div class="breadcrumbs py-3">
                        <?php woocommerce_breadcrumb() ?>
                    </div>
                    <?php echo empty($description) ? '' : '<div class="taxonomy-brand__description mt-2 lg:mt-4 hidden lg:block">' . $description . '</div>'; ?>
                </div>
            </div>
        </div>
        <?php if (!empty($terms_cat)) : ?>
            <div class="dvutail-categories w-full overflow-x-auto">
                <div class="dvutail-categories__items flex gap-3 lg:gap-4 mb-6">
                    <?php foreach ($terms_cat as $term):
                        $cat_thumb_id = get_term_meta($term->term_id, 'thumbnail_id', true);
                        $cat_thumb_url = home_url() . '/wp-content/uploads/woocommerce-placeholder.png';
                        if (isset($cat_thumb_id) && $cat_thumb_id) {
                            $cat_thumb_url = wp_get_attachment_thumb_url($cat_thumb_id);
                        }

                        $cat_name = $term->name;
                        $term_link = get_term_link($term);
                    ?>
                        <div class="dvutail-cat-item w-24 min-w-24 lg:w-28 lg:min-w-28 p-1 lg:p-2 rounded-md shadow-sm bg-white transition-transform hover:shadow-md hover:translate-y-[-2px]">
                            <a alt="<?php echo $cat_name ?>" href="<?php echo  esc_url($term_link) ?> ">
                                <div class="dvutail-cat-item__thumbnail w-12 h-12 flex items-center justify-center rounded-full mx-auto mb-2">
                                    <img src="<?php echo $cat_thumb_url; ?>" class="w-full" />
                                </div>
                                <h4 class="dvutail-cat-item__content text-gray-800 lg:text-base text-sm line-clamp-2 text-center">
                                    <?php echo $cat_name ?>
                                </h4>
                            </a>
                        </div>
                    <?php
                    endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="taxonomy-brand__body">

            <?php if (have_posts()) : ?>

                <div class="flex justify-between items-center flex-wrap gap-4 mb-6">
                    <?php woocommerce_result_count() ?>
                    <?php woocommerce_catalog_ordering() ?>
                </div>

                <div class="product-list grid lg:grid-cols-5 grid-cols-2 lg:gap-4 gap-3">

                    <?php while (have_posts()) : the_post(); ?>

                        <?php wc_get_template_part('content', 'product'); ?>

                    <?php endwhile;  ?>

                </div>

                <?php woocommerce_pagination() ?>

                <?php /* echo paginate_links(array(
                    'prev_text' => __('<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>', 'dvutheme'),
                    'next_text' => __('<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>', 'dvutheme'),
                    'prev_next' => true,
                )); */ ?>


            <?php else : ?>

                <?php do_action('woocommerce_no_products_found'); ?>

            <?php endif; ?>

        </div>
    </div>
</div>