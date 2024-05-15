<?php

function dvu_register_report_file_post_type()
{

    $labels = array(
        'name'                  => _x('Report File', 'Post type general name', 'dvutheme'),
        'singular_name'         => _x('Report File', 'Post type singular name', 'dvutheme'),
        'menu_name'             => _x('Report File', 'Admin Menu text', 'dvutheme'),
        'name_admin_bar'        => _x('Report File', 'Add New on Toolbar', 'dvutheme'),
        'add_new'               => __('Add new', 'dvutheme'),
        'add_new_item'          => __('Add new Report File', 'dvutheme'),
        'new_item'              => __('Add new Report File', 'dvutheme'),
        'edit_item'             => __('Edit', 'dvutheme'),
        'all_items'             => __('All Report File', 'dvutheme'),
        'search_items'          => __('Search', 'dvutheme'),
        'parent_item_colon'     => __('Parent Report File', 'dvutheme'),
        'not_found'             => __('No Report File.', 'dvutheme'),
        'not_found_in_trash'    => __('No Report File in trash.', 'dvutheme'),
    );


    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'report-file'),
        'capability_type'    => 'page',
        'menu_icon'          => 'dashicons-media-document',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'thumbnail'),

    );

    register_post_type('report_file', $args);
}

add_action('init', 'dvu_register_report_file_post_type');

function dvu_register_report_gallery_post_type()
{

    $labels = array(
        'name'                  => _x('Report Gallery', 'Post type general name', 'dvutheme'),
        'singular_name'         => _x('Report Gallery', 'Post type singular name', 'dvutheme'),
        'menu_name'             => _x('Report Gallery', 'Admin Menu text', 'dvutheme'),
        'name_admin_bar'        => _x('Report Gallery', 'Add New on Toolbar', 'dvutheme'),
        'add_new'               => __('Add new', 'dvutheme'),
        'add_new_item'          => __('Add new Report Gallery', 'dvutheme'),
        'new_item'              => __('Add new Report Gallery', 'dvutheme'),
        'edit_item'             => __('Edit', 'dvutheme'),
        'all_items'             => __('All Report Gallery', 'dvutheme'),
        'search_items'          => __('Search', 'dvutheme'),
        'parent_item_colon'     => __('Parent Report Gallery', 'dvutheme'),
        'not_found'             => __('No Report Gallery.', 'dvutheme'),
        'not_found_in_trash'    => __('No Report Gallery in trash.', 'dvutheme'),
    );


    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'report-gallery'),
        'capability_type'    => 'page',
        'menu_icon'          => 'dashicons-media-document',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'thumbnail'),

    );

    register_post_type('report_gallery', $args);
}

add_action('init', 'dvu_register_report_gallery_post_type');
