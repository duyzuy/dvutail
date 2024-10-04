<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;
global $product;

?>
<div class="breadcrumbs py-4 overflow-x-auto mb-0 lg:mb-6">
    <?php woocommerce_breadcrumb() ?>
</div>
<?php
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>
<?php if (wp_is_mobile()):  ?>
    <div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
        <div class="bg-white p-3 lg:p-6 rounded-md shadow-sm mb-3 lg:mb-6">
            <?php
            /**
             * Hook: woocommerce_before_single_product_summary.
             *
             * @hooked woocommerce_show_product_sale_flash - 10 //removed
             * @hooked woocommerce_show_product_images - 20
             */
            do_action('woocommerce_before_single_product_summary');
            ?>
        </div>
        <div class="bg-white p-3 lg:p-6 rounded-md shadow-sm mb-3 lg:mb-6">
            <div class="entry-title-product mb-4 pb-4 border-b border-gray-200">
                <?php
                /*
                * @hooked woocommerce_template_single_title 5
                */
                do_action('dvu_single_product_summary_header_top');
                ?>
            </div>
            <div class="single-product__metadata border-b pb-3 mb-3">
                <?php
                /*
                * @hooked woocommerce_template_single_title 5
                * @hooked dvu_meta_single_product 10
                * @hooked woocommerce_template_single_meta
                */
                do_action('dvu_single_product_header_meta');
                ?>
            </div>
            <?php
            /**
             * Hook: Woocommerce_single_product_summary.
             *
             * @hooked woocommerce_template_single_title - 5 //removed
             * @hooked woocommerce_template_single_rating - 10 //removed
             * @hooked woocommerce_template_single_price - 10 //removed
             * @hooked woocommerce_template_single_excerpt - 20
             * @hooked woocommerce_template_single_add_to_cart - 30
             * @hooked woocommerce_template_single_meta - 40 //removed
             * @hooked woocommerce_template_single_sharing - 50 /removed
             * @hooked WC_Structured_Data::generate_product_data() - 60
             */
            do_action('woocommerce_single_product_summary');
            ?>
        </div>
        <?php dvutail_show_brand() ?>
        <div class="bg-white p-3 lg:p-6 rounded-md shadow-sm mb-3 lg:mb-4">
            <h3 class="font-semibold text-lg lg:text-xl mb-3">Nhà Bếp Sài Gòn</h3>
            <?php get_template_part('/templates/partials/partial', 'merque') ?>
        </div>
        <?php do_action('dvutail_single_product_extra_info'); ?>
        <?php
        /**
         * Hook: woocommerce_after_single_product_summary.
         *
         * @hooked woocommerce_output_product_data_tabs - 10
         * @hooked woocommerce_upsell_display - 15
         * @hooked woocommerce_output_related_products - 20 //removed
         */
        do_action('woocommerce_after_single_product_summary');
        ?>
    </div>
    </div>

<?php else:  ?>
    <div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
        <div class="flex flex-wrap">
            <div class="col-woocommerce-gallery-product relative lg:w-3/5 w-full lg:pr-8">
                <div class="bg-white p-3 lg:p-6 rounded-md shadow-sm mb-3 lg:mb-4">
                    <?php
                    /**
                     * Hook: woocommerce_before_single_product_summary.
                     *
                     * @hooked woocommerce_show_product_sale_flash - 10 //removed
                     * @hooked woocommerce_show_product_images - 20
                     */
                    do_action('woocommerce_before_single_product_summary');
                    ?>
                </div>
                <div class="bg-white p-3 lg:p-6 rounded-md shadow-sm mb-3 lg:mb-4">
                    <h3 class="font-semibold text-lg lg:text-xl mb-3">Nhà Bếp Sài Gòn</h3>
                    <?php get_template_part('/templates/partials/partial', 'merque') ?>
                </div>
                <?php do_action('dvutail_single_product_extra_info'); ?>

                <?php
                /**
                 * Hook: woocommerce_after_single_product_summary.
                 *
                 * @hooked woocommerce_output_product_data_tabs - 10
                 * @hooked woocommerce_upsell_display - 15
                 * @hooked woocommerce_output_related_products - 20 //removed
                 */
                do_action('woocommerce_after_single_product_summary');

                ?>
            </div>
            <div class="col-woocomerce-single-content-product summary entry-summary lg:w-2/5 w-full">
                <div class="sticky top-4 mb-3 lg:mb-4">
                    <div class="bg-white p-3 lg:p-6 rounded-md shadow-sm mb-3 lg:mb-4">
                        <div class="entry-title-product mb-4 pb-4 border-b border-gray-200">
                            <?php
                            /*
                            * @hooked woocommerce_template_single_title 5
                            */
                            do_action('dvu_single_product_summary_header_top');
                            ?>
                        </div>
                        <div class="single-product__metadata border-b pb-3 mb-3 lg:pb-6 lg:mb-6">
                            <?php
                            /*
                            * @hooked woocommerce_template_single_title 5
                            * @hooked dvu_meta_single_product 10
                            * @hooked woocommerce_template_single_meta
                            */
                            do_action('dvu_single_product_header_meta');
                            ?>
                        </div>
                        <?php
                        /**
                         * Hook: Woocommerce_single_product_summary.
                         *
                         * @hooked woocommerce_template_single_title - 5 //removed
                         * @hooked woocommerce_template_single_rating - 10 //removed
                         * @hooked woocommerce_template_single_price - 10 //removed
                         * @hooked woocommerce_template_single_excerpt - 20
                         * @hooked woocommerce_template_single_add_to_cart - 30
                         * @hooked woocommerce_template_single_meta - 40 //removed
                         * @hooked woocommerce_template_single_sharing - 50 /removed
                         * @hooked WC_Structured_Data::generate_product_data() - 60
                         */
                        do_action('woocommerce_single_product_summary');
                        ?>
                    </div>
                    <?php dvutail_show_brand() ?>
                </div>


            </div><!--medium-5-->
        </div>
    </div>

<?php endif; ?>

<?php if (wp_is_mobile()):  ?>
    <div class="lg:p-6 p-3">
    <?php endif  ?>

    <?php do_action('woocommerce_after_single_product'); ?>

    <?php if (wp_is_mobile()):  ?>
    </div>
<?php endif  ?>