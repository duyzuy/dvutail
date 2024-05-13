<?php 

function dv_register_post_type_gift() {

    $labels = array(
        'name'                  => _x( 'Sản phẩm khuyến mại', 'Post type general name', 'saigonhome' ),
        'singular_name'         => _x( 'Sản phẩm khuyến mại', 'Post type singular name', 'saigonhome' ),
        'menu_name'             => _x( 'Sản phẩm khuyến mại', 'Admin Menu text', 'saigonhome' ),
        'name_admin_bar'        => _x( 'Sản phẩm khuyến mại', 'Add New on Toolbar', 'saigonhome' ),
        'add_new'               => __( 'Thêm mới', 'saigonhome' ),
        'add_new_item'          => __( 'Thêm sản phẩm mới', 'saigonhome' ),
        'new_item'              => __( 'Sản phẩm mới', 'saigonhome' ),
        'edit_item'             => __( 'Sửa', 'saigonhome' ),
        'all_items'             => __( 'Tất cả sản phẩm', 'saigonhome' ),
        'search_items'          => __( 'Tìm kiếm sản phẩm', 'saigonhome' ),
        'parent_item_colon'     => __( 'Sản phẩm cha', 'saigonhome' ),
        'not_found'             => __( 'Không tìm thấy sản phẩm khuyến mại.', 'saigonhome' ),
        'not_found_in_trash'    => __( 'Không có sản phẩm trong thùng rác.', 'saigonhome' ),
       
    );


    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'gift-product' ),
        'capability_type'    => 'post',
        'menu_icon'          =>'dashicons-tickets-alt',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'thumbnail'  ),
    );

    register_post_type( 'product-gift', $args );

}

add_action( 'init', 'dv_register_post_type_gift' );


//add metabox

function wc_register_metabox_gift() {
    add_meta_box( 'meta-box-id', __( 'Thông tin quà tặng', 'sgsv' ), 'wc_callback_gift_information', 'product-gift' );
}
add_action( 'add_meta_boxes', 'wc_register_metabox_gift' );
 
/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function wc_callback_gift_information( $post ) {
    // Display code/markup goes here. Don't forget to include nonces!

    wp_nonce_field( basename(__FILE__), 'metabox-nonce_field-gift');

    $price = get_post_meta( $post->ID, '_gift_price', true );
    $link = get_post_meta( $post->ID, '_product_gift_link', true );
    $desc = get_post_meta( $post->ID, '_product_gift_desc', true );
    ?>
    <p style="margin-bottom: 10px">
        <label for="gift_price">Giá tiền</label><br/>
        <input type="text" name="gift_price" pattern="[0-9.]+" value="<?php echo esc_html( $price ) ?>" />
    </p>
    <p style="margin-bottom: 10px">
        <label for="product_gift_link">Đường dẫn quà tặng</label><br/>
        <input tupe="text" name="product_gift_link" id="product_gift_link" value="<?php echo esc_html( $link ) ?>" style="display: block; width: 100%"/>
    </p>
    <p style="margin-bottom: 10px">
        <label for="product_gift_desc">Thông tin quà tặng</label>
        <?php
         wp_editor( htmlspecialchars_decode($desc), 'product_gift_desc', $settings = array('textarea_name'=>'product_gift_desc') )
        ?>
       
    </p>
    <?php
}
 
/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function wpdocs_save_meta_box( $post_id ) {
    // Save logic goes here. Don't forget to include nonce checks!

    if (!isset($_POST["metabox-nonce_field-gift"]) || !wp_verify_nonce($_POST["metabox-nonce_field-gift"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $price = '';
    $link = '';
    $desc = '';

    if(isset($_POST['gift_price'])){
        $price = $_POST['gift_price'];
    }
    update_post_meta( $post_id, '_gift_price', $price);

    if(isset($_POST['product_gift_link'])){
        $link = $_POST['product_gift_link'];
    }
    update_post_meta( $post_id, '_product_gift_link', $link);

    if(isset($_POST['product_gift_desc'])){
        $desc = $_POST['product_gift_desc'];
    }
    update_post_meta( $post_id, '_product_gift_desc', $desc);





}
add_action( 'save_post', 'wpdocs_save_meta_box' );

