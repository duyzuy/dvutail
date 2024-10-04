<?php

class DvuTailWooExtraTab
{
    private $post_type = 'product';

    function __construct()
    {
        add_filter('woocommerce_product_data_tabs', array($this, 'dvutail_register_tab'));
        add_action('woocommerce_product_data_panels', array($this, 'dvutail_register_data_fields'));
        add_action('admin_footer', array($this, 'dvu_add_script_to_admin'));
        add_action('woocommerce_process_product_meta_simple', array($this, 'dvutail_save_data_fields'));
    }

    function dvutail_register_tab($product_tabs)
    {
        $product_tabs['my-custom-tab'] = array(
            'label' => __('Thông tin thêm', 'woocommerce'),
            'target' => 'pyre_video_product',
            'class' => array('show_if_simple'),
        );
        return $product_tabs;
    }

    /**
     * add fields
     */
    function dvutail_register_data_fields()
    {
        global $post;

        // Note the 'id' attribute needs to match the 'target' parameter set above

        $product_info = get_post_meta($post->ID, '_wc_product_info', true);
        $product_rating = get_post_meta($post->ID, '_wc_product_rating', true);

        wp_nonce_field(basename(__FILE__), 'metabox-nonce_field-product-info');

        $video_field = array(
            'id' => '_wc_link_vd',
            'label' => __('Video ID', 'saigonhome'),
            'placeholder' => '',
            'description'  => 'ex: https://youtu.be/PqUD0C8AjHE the id is <strong>PqUD0C8AjHE</strong>',
        );
        $link_iamge_field =  array(
            'id' => '_wc_link_image_kt',
            'label' => __('Link ảnh kỹ thuật', 'saigonhome'),
            'placeholder' => '',
            'description'  => 'paste your link',
        );
        // $technic_info_field = array(
        //     'id' => '_wc_thong_so_ky_thuat', // required
        //     'label' => 'Thông số kỹ thuật',
        //     'placeholder' => '',
        //     'class' => 'thong-so-kt',
        //     'style' => '',
        //     'rows' => '6',
        //     'cols' => '5',
        // );

?>
        <div id='pyre_video_product' class='panel woocommerce_options_panel'>
            <div class='options_group'>
                <?php woocommerce_wp_text_input($video_field); ?>
            </div>
            <div class='options_group'>
                <?php woocommerce_wp_text_input($link_iamge_field); ?>
            </div>

            <?php // woocommerce_wp_textarea_input($technic_info_field); 
            ?>

            <div class='options_group dvutail_product-info-container'>
                <fieldset class="form-field _wc_product_rating_fields">
                    <legend>Đánh giá sản phẩm</legend>
                    <ul class="dvutail-product-ratings" data-rating='<?php echo empty($product_rating) ? "" : json_encode($product_rating) ?>'>
                    </ul>
                </fieldset>
                <p class="form-field"><button class="button product-rating_add-row" type="button">Thêm</Button></p>
            </div>
            <div class='options_group dvutail_product-info-container'>
                <fieldset class="form-field _wc_product_info_fields">
                    <legend>Thông số kỹ thuật</legend>
                    <ul class="dvutail-product-info-list" data-info='<?php echo empty($product_info) ? "" : json_encode($product_info) ?>'>
                    </ul>
                </fieldset>
                <p class="form-field"><button class="button product-info_add-row" type="button">Thêm</Button></p>
            </div>
        </div>
    <?php
    }


    /**
     * add script to footer
     */
    function dvu_add_script_to_admin()
    {
        $current_screen = get_current_screen();
        if (
            (!isset($current_screen->base) || !in_array($current_screen->base, array('post'))
                ||  $current_screen->post_type != $this->post_type)
        ) {
            return false;
        }
        wp_enqueue_media();
    ?>

        <style>
            .woocommerce_options_panel .dvutail-product-info-list,
            .woocommerce_options_panel .dvutail-product-ratings {
                width: 95% !important;
            }

            .woocommerce_options_panel .dvutail-product-info-list li,
            .woocommerce_options_panel .dvutail-product-ratings li {
                width: 100% !important;
            }

            .dvutail-product-info-list .input-fields,
            .dvutail-product-ratings .input-fields {
                display: flex;
                gap: 16px;
                margin-bottom: 16px;
            }


            .dvutail-product-info-list .input-fields input,
            .dvutail-product-ratings .input-fields input {
                flex: 1
            }

            .dvutail-product-info-list .input-fields input.input-name,
            .dvutail-product-ratings .input-fields input.input-name {
                max-width: 180px;
            }

            .product-item-remove {
                color: red;
                cursor: pointer;
            }
        </style>

        <script>
            (function($) {

                let productInfo = []
                const productContainer = $('.dvutail-product-info-list');
                const currentInfoData = productContainer.data('info');

                if (currentInfoData !== "" && currentInfoData.length) {

                    productInfo = [...productInfo, ...currentInfoData]
                }
                const createInfoTemplate = ({
                    index,
                    name,
                    value,
                }) => {
                    return `<li class="info-item" data-index="${index}"><div class="input-fields">
                                <input type="text" class="input-name" placeholder="Tiêu đề" name="dvutail_product_info[${index}][name]" value="${name}" />
                                <input type="text" class="input-value" placeholder="Nội dung" name="dvutail_product_info[${index}][value]" value="${value}" />
                                <span class="product-item-remove">xoá</span>
                            </div></li>`
                }
                productContainer.on('click', '.product-item-remove', function(ev) {
                    const indexItem = $(this).parents('.info-item').data('index');
                    productInfo.splice(indexItem, 1)
                    renderInforTemplate()
                })
                productContainer.on("change", ".input-name", function(ev) {
                    const newValue = ev.target.value;
                    const indexItem = $(this).parents('.info-item').data('index');
                    productInfo.splice(indexItem, 1, {
                        ...productInfo[indexItem],
                        name: newValue,
                    });
                });
                productContainer.on("change", ".input-value", function(ev) {
                    const newValue = ev.target.value;
                    const indexItem = $(this).parents('.info-item').data('index');
                    productInfo.splice(indexItem, 1, {
                        ...productInfo[indexItem],
                        value: newValue,
                    });
                });
                $(".product-info_add-row").on("click", function(e) {
                    e.preventDefault();

                    productInfo = [...productInfo, {
                        name: "",
                        value: ""
                    }]
                    renderInforTemplate()

                });
                const renderInforTemplate = () => {
                    productContainer.html("");
                    productInfo.forEach((item, index) => {
                        const htmlItem = createInfoTemplate({
                            ...item,
                            index
                        })
                        productContainer.append(htmlItem)
                    })
                }
                renderInforTemplate()
                /**
                 * rating
                 */

                let productRatings = []
                const productRatingContainer = $('.dvutail-product-ratings');
                const currentRatingData = productRatingContainer.data('rating');

                if (currentRatingData !== "" && currentRatingData.length) {

                    productRatings = [...productRatings, ...currentRatingData]
                }
                const createRatingTemplate = ({
                    index,
                    name,
                    value,
                }) => {
                    return `<li class="info-item" data-index="${index}"><div class="input-fields">
                                <input type="text" class="input-name" placeholder="Tiêu đề đánh giá" name="dvutail_product_rating[${index}][name]" value="${name}" />
                                <input type="number" class="input-value" placeholder="Rating" min="1" max="10" name="dvutail_product_rating[${index}][value]" value="${value}" />
                                <span class="product-item-remove">xoá</span>
                            </div></li>`
                }
                productRatingContainer.on('click', '.product-item-remove', function(ev) {
                    const indexItem = $(this).parents('.info-item').data('index');
                    productRatings.splice(indexItem, 1)
                    renderRatingTemplate()
                })
                productRatingContainer.on("change", ".input-name", function(ev) {
                    const newValue = ev.target.value;
                    const indexItem = $(this).parents('.info-item').data('index');
                    productRatings.splice(indexItem, 1, {
                        ...productRatings[indexItem],
                        name: newValue,
                    });
                });
                productRatingContainer.on("change", ".input-value", function(ev) {
                    const newValue = ev.target.value;
                    const indexItem = $(this).parents('.info-item').data('index');
                    productRatings.splice(indexItem, 1, {
                        ...productRatings[indexItem],
                        value: newValue,
                    });
                });
                $(".product-rating_add-row").on("click", function(e) {
                    e.preventDefault();

                    productRatings = [...productRatings, {
                        name: "",
                        value: 0
                    }]
                    renderRatingTemplate()

                });
                const renderRatingTemplate = () => {
                    productRatingContainer.html("");
                    productRatings.forEach((item, index) => {
                        const htmlItem = createRatingTemplate({
                            ...item,
                            index
                        })
                        productRatingContainer.append(htmlItem)
                    })
                }
                renderRatingTemplate()
            })(jQuery)
        </script>
<?php
    }

    /**
     * save dataa
     */
    function dvutail_save_data_fields($post_id)
    {
        // Save logic goes here. Don't forget to include nonce checks!

        if (!isset($_POST["metabox-nonce_field-product-info"]) || !wp_verify_nonce($_POST["metabox-nonce_field-product-info"], basename(__FILE__)))
            return $post_id;

        if (!current_user_can("edit_post", $post_id))
            return $post_id;

        if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
            return $post_id;


        $linkvd = $_POST['_wc_link_vd'];
        $link_img_kt = $_POST['_wc_link_image_kt'];
        $link_info_kt = $_POST['_wc_thong_so_ky_thuat'];

        $product_info = $_POST['dvutail_product_info'];
        $product_rating = $_POST['dvutail_product_rating'];

        update_post_meta($post_id, '_wc_link_vd', esc_html($linkvd));
        update_post_meta($post_id, '_wc_link_image_kt', esc_html($link_img_kt));
        update_post_meta($post_id, '_wc_thong_so_ky_thuat', esc_html($link_info_kt));
        update_post_meta($post_id, '_wc_product_info', $product_info);
        update_post_meta($post_id, '_wc_product_rating', $product_rating);
    }
}

new DvuTailWooExtraTab();
