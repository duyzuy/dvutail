<?php

function dvu_register_activity_post_type()
{

    $labels = array(
        'name'                  => _x('Activity', 'Post type general name', 'dvutheme'),
        'singular_name'         => _x('Activity', 'Post type singular name', 'dvutheme'),
        'menu_name'             => _x('Activity', 'Admin Menu text', 'dvutheme'),
        'name_admin_bar'        => _x('Activity', 'Add New on Toolbar', 'dvutheme'),
        'add_new'               => __('Add new', 'dvutheme'),
        'add_new_item'          => __('Add new Activity', 'dvutheme'),
        'new_item'              => __('Add new Activity', 'dvutheme'),
        'edit_item'             => __('Edit', 'dvutheme'),
        'all_items'             => __('All Activities', 'dvutheme'),
        'search_items'          => __('Search', 'dvutheme'),
        'parent_item_colon'     => __('Parent Activity', 'dvutheme'),
        'not_found'             => __('No Activity.', 'dvutheme'),
        'not_found_in_trash'    => __('No Activity in trash.', 'dvutheme'),
    );


    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'activity'),
        'capability_type'    => 'post',
        'menu_icon'          => 'dashicons-buddicons-buddypress-logo',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'thumbnail', 'editor'),

    );

    register_post_type('activity', $args);
}

add_action('init', 'dvu_register_activity_post_type');


//custom taxonomy

function dv_register_activity_cat()
{

    $labels = array(

        'name'                       => __('Activity type', 'dvutheme'),
        'singular_name'              => __('Activity type', 'dvutheme'),
        'menu_name'                  => __('Activity type', 'dvutheme'),
        'edit_item'                  => __('Edit Activity type', 'dvutheme'),
        'update_item'                => __('Update Activity type', 'dvutheme'),
        'add_new_item'               => __('Add New Activity type', 'dvutheme'),
        'new_item_name'              => __('New Group name', 'dvutheme'),
        'all_items'                  => __('All Activity type', 'dvutheme'),
        'add_or_remove_items'        => __('Add or remove activity type', 'dvutheme'),
        'not_found'                  => __('No Activity type found.', 'dvutheme'),
    );


    $args = array(

        'labels'            => $labels,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_ui'           => true,
        'show_tagcloud'     => true,
        'rewrite'            => array('slug' => 'activity-cat'),
        'hierarchical'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
    );
    register_taxonomy('activity_type', array('activity'), $args);
}

add_action('init', 'dv_register_activity_cat');


function dv_register_activity_host()
{

    $labels = array(

        'name'                       => __('Activity host', 'dvutheme'),
        'singular_name'              => __('Activity host', 'dvutheme'),
        'menu_name'                  => __('Activity host', 'dvutheme'),
        'edit_item'                  => __('Edit Activity host', 'dvutheme'),
        'update_item'                => __('Update Activity host', 'dvutheme'),
        'add_new_item'               => __('Add New Activity host', 'dvutheme'),
        'new_item_name'              => __('New Group name', 'dvutheme'),
        'all_items'                  => __('All Activity host', 'dvutheme'),
        'add_or_remove_items'        => __('Add or remove activity host', 'dvutheme'),
        'not_found'                  => __('No Activity host found.', 'dvutheme'),
    );


    $args = array(

        'labels'            => $labels,
        'public'            => true,
        'show_in_nav_menus' => false,
        'show_ui'           => true,
        'show_tagcloud'     => true,
        'rewrite'            => array('slug' => 'activity-host'),
        'hierarchical'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
    );
    register_taxonomy('activity_host', array('activity'), $args);
}

add_action('init', 'dv_register_activity_host');
