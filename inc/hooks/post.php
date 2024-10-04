<?php

function latest_posts()
{

    $args = array(
        'post_type'              => 'post', // use any for any kind of post type, custom post type slug for custom post type
        'post_status'            => 'publish', // Also support: pending, draft, auto-draft, future, private, inherit, trash, any
        'posts_per_page'         => 5, // use -1 for all post
        'order'                  => 'DESC', // Also support: ASC
        'orderby'                => 'date', // Also support: none, rand, id, title, slug, modified, parent, menu_order, comment_count
    );

    $args_2posts = array(
        'post_type'              => 'post', // use any for any kind of post type, custom post type slug for custom post type
        'post_status'            => 'publish', // Also support: pending, draft, auto-draft, future, private, inherit, trash, any
        'posts_per_page'         => 2, // use -1 for all post
        'offset'                   => 5,
        'order'                  => 'DESC', // Also support: ASC
        'orderby'                => 'date', // Also support: none, rand, id, title, slug, modified, parent, menu_order, comment_count
    );

    $slide_posts = new WP_Query($args);
    $two_side_posts = new WP_Query($args_2posts);
}
