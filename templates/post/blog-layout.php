<?php

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

?>
<div class="archive-layout py-8">
    <div class="archive-layout__inner container mx-auto px-3 md:px-6 lg:px-8">
        <div class="archive-layout__header text-center mb-6">
            <h3 class="inline-block text-xl lg:text-2xl uppercase font-bold"> <?php esc_html_e("Blogs", "dvutheme") ?></h3>
        </div>
        <div class="archive-layout__body blog-list-container">
            <?php if (have_posts()) : ?>
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-6  mb-6">
                    <?php while (have_posts()) : the_post(); ?>

                        <?php get_template_part('templates/post/content', 'box'); ?>

                    <?php endwhile; ?>
                </div>
                <div class="dvutail__paginations mb-12">
                    <?php echo dvu_get_post_paginations() ?>
                </div>
            <?php
            else :
                get_template_part('templates/post/content', 'none');
            endif;
            ?>
        </div>
    </div>
</div>