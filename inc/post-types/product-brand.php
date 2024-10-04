<?php

//custom taxonomy

function dvutail_register_product_brand()
{

    $labels = array(
        'name'                       => __('Thương hiệu', 'dvutail'),
        'singular_name'              => __('Thương hiệu', 'dvutail'),
        'menu_name'                  => __('Thương hiệu', 'dvutail'),
        'edit_item'                  => __('sửa', 'dvutail'),
        'update_item'                => __('Cập nhật', 'dvutail'),
        'add_new_item'               => __('Thêm mới', 'dvutail'),
        'all_items'                  => __('Tất cả Thương hiệu', 'dvutail'),
        'add_or_remove_items'        => __('Thêm hoặc xóa Thương hiệu', 'dvutail'),
        'not_found'                  => __('Không tìm thấy Thương hiệu', 'dvutail'),
    );

    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_ui'           => true,
        'show_tagcloud'     => true,
        'rewrite'            => array('slug' => 'brand'),
        'hierarchical'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
    );


    register_taxonomy('product_brand', array('product'), $args);
}
add_action('init', 'dvutail_register_product_brand');
