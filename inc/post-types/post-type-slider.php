<?php

function dv_post_type_slider()
{

    $labels = array(
        'name'                  => _x('Slider', 'Post type general name', 'dvutheme'),
        'singular_name'         => _x('Slider', 'Post type singular name', 'dvutheme'),
        'menu_name'             => _x('Sliders', 'Admin Menu text', 'dvutheme'),
        'name_admin_bar'        => _x('Slider', 'Add New on Toolbar', 'dvutheme'),
        'add_new'               => __('Add New', 'dvutheme'),
        'add_new_item'          => __('Add New Slider', 'dvutheme'),
        'new_item'              => __('New slider', 'dvutheme'),
        'edit_item'             => __('Edit Slider', 'dvutheme'),
        'all_items'             => __('All Slider', 'dvutheme'),
        'search_items'          => __('Search Slider', 'dvutheme'),
        'parent_item_colon'     => __('Parent Slider:', 'dvutheme'),
        'not_found'             => __('No slider found.', 'dvutheme'),
        'not_found_in_trash'    => __('No slider found in Trash.', 'dvutheme'),
        'featured_image'        => _x('Slider Cover Image', 'dvutheme'),
        'set_featured_image'    => _x('Set cover image', 'dvutheme'),
        'remove_featured_image' => _x('Remove cover image', 'dvutheme'),
        'use_featured_image'    => _x('Use as cover image', 'dvutheme'),
        'archives'              => _x('Slider archives', 'dvutheme'),
        'insert_into_item'      => _x('Insert into slider', 'dvutheme'),
        'uploaded_to_this_item' => _x('Uploaded to this slider', 'dvutheme'),
    );


    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'slider'),
        'capability_type'    => 'post',
        'menu_icon'         => 'dashicons-format-gallery',
        'has_archive'        => false,
        'hierarchical'       => true,
        'menu_position'      => null,
        'supports'           => array('title', 'thumbnail', 'excerpt'),
    );

    register_post_type('slider', $args);
}

add_action('init', 'dv_post_type_slider');


//custom taxonomy

function dv_register_category()
{

    $labels = array(

        'name'                       => __('Group slider', 'dvutheme'),
        'singular_name'              => __('Group Slider', 'dvutheme'),
        'menu_name'                  => __('Group Slider', 'dvutheme'),
        'edit_item'                  => __('Edit Group Slider', 'dvutheme'),
        'update_item'                => __('Update Group Slider', 'dvutheme'),
        'add_new_item'               => __('Add New Group Slider', 'dvutheme'),
        'new_item_name'              => __('New Group name', 'dvutheme'),
        'all_items'                  => __('All Group Slider', 'dvutheme'),
        'add_or_remove_items'        => __('Add or remove categories', 'dvutheme'),
        'not_found'                  => __('No Group Slider found.', 'dvutheme'),
    );


    $args = array(

        'labels'            => $labels,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_ui'           => true,
        'show_tagcloud'     => true,
        'rewrite'            => array('slug' => 'group-slider'),
        'hierarchical'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
    );
    register_taxonomy('group_slider', array('slider'), $args);
}

add_action('init', 'dv_register_category');
