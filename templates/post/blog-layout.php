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
<div class="archive__body py-12 lg:py-24">
    <div class="container px-3 lg:px-0">
        <div class="newest__posts mb-12">
            <div class="text-center mb-6">
                <h3 class="bg-gradient-to-tr from-[#CC2027] via-[#EB7121] to-[#F48820] inline-block text-transparent bg-clip-text text-2xl lg:text-4xl uppercase font-bold"> <?php echo esc_html__("News latest", "dvutheme") ?></h3>
            </div>
            <div class="flex flex-wrap -mx-3 mb-12">
                <div class="w-full lg:w-8/12 px-3 mb-6 lg:mb-0">
                    <?php if ($slide_posts->have_posts()) : ?>
                        <div class="latest__news-slider">
                            <?php while ($slide_posts->have_posts()) :  $slide_posts->the_post(); ?>
                                <div class="post__slide-item">
                                    <?php get_template_part('templates/post/content-box', 'overlay', array()) ?>
                                </div>
                            <?php endwhile ?>
                        </div>
                    <?php else : ?>
                        <div class="py-6 text-center">no post</div>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <div class="w-full lg:w-4/12 px-3">
                    <?php if ($two_side_posts->have_posts()) { ?>
                        <div class="latest__news-sides flex flex-col flex-wrap lg:flex-nowrap gap-y-6 -mx-3 h-full">
                            <?php
                            while ($two_side_posts->have_posts()) {
                                global $post;
                                $two_side_posts->the_post();
                                $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large');

                                $author_nicename = get_the_author_meta('user_nicename', $post->post_author);
                            ?>
                                <div class="post__side-item w-full lg:w-full lg:h-1/2 px-3 overflow-hidden">
                                    <div class="post__side-item-inner relative pt-[50%] lg:h-full">
                                        <img src="<?php echo  $thumbnail; ?>" alt="<?php the_title() ?>" class="w-full h-full absolute left-0 top-0 object-cover" />
                                        <div class="overlay bg-gradient-to-b from-gray-950/0 via-gray-950/70 to-gray-950/80 absolute top-0 right-0 w-full h-full z-10"></div>
                                        <div class="post__side-item-contents absolute bottom-0 left-0 right-0 z-20 text-white px-4 pb-4">
                                            <div class="post-meta flex gap-x-3 py-3">
                                                <span class="date inline-flex items-center">
                                                    <span class="mr-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 22 22" fill="none">
                                                            <path d="M6.60759 3.96407V2.20227M14.5357 3.96407V2.20227M6.60759 7.48768H14.5357M3.96489 18.0585H17.1784C17.6649 18.0585 18.0593 17.6641 18.0593 17.1776V4.84498C18.0593 4.35847 17.6649 3.96407 17.1784 3.96407H3.96489C3.47838 3.96407 3.08398 4.35847 3.08398 4.84498V17.1776C3.08398 17.6641 3.47838 18.0585 3.96489 18.0585Z" stroke="#ffffff" stroke-width="1.58562" stroke-linecap="round"></path>
                                                        </svg>
                                                    </span>
                                                    <span><time datetime="<?php echo get_the_date('j/M/Y'); ?>" itemprop="datePublished"><?php echo get_the_date($date_format) ?></time></span>
                                                </span>
                                                <span class="author inline-flex items-center">
                                                    <span class="mr-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 22 22" fill="none">
                                                            <path d="M5.01305 16.8276C6.20147 15.0915 8.15698 13.9635 10.5707 13.9635C12.9845 13.9635 14.94 15.0915 16.1284 16.8276M5.01305 16.8276C6.49103 18.1414 8.43768 18.9394 10.5707 18.9394C12.7037 18.9394 14.6504 18.1414 16.1284 16.8276M5.01305 16.8276C3.28858 15.2947 2.20215 13.0597 2.20215 10.5708C2.20215 5.949 5.94888 2.20227 10.5707 2.20227C15.1925 2.20227 18.9393 5.949 18.9393 10.5708C18.9393 13.0597 17.8529 15.2947 16.1284 16.8276M13.6539 8.80904C13.6539 10.5118 12.2735 11.8922 10.5707 11.8922C8.86793 11.8922 7.48756 10.5118 7.48756 8.80904C7.48756 7.10625 8.86793 5.72588 10.5707 5.72588C12.2735 5.72588 13.6539 7.10625 13.6539 8.80904Z" stroke="#ffffff" stroke-width="1.58562" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </span>
                                                    <span><?php echo $author_nicename; ?></span>
                                                </span>
                                            </div>
                                            <h3 class="mb-3 text-lg lg:text-xl font-[500] line-clamp-1"><?php the_title() ?></h3>
                                            <p class="post-excerpt line-clamp-1 mb-3 text-sm"><?php echo get_the_excerpt(); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php
                    } else {
                        echo 'no post';
                    }
                    wp_reset_postdata(); ?>

                </div>

            </div>
        </div>
        <div class="text-center mb-6">
            <h3 class="bg-gradient-to-tr from-[#CC2027] via-[#EB7121] to-[#F48820] inline-block text-transparent bg-clip-text text-2xl lg:text-4xl uppercase font-bold"> <?php echo esc_html__("News", "dvutheme") ?></h3>
        </div>
        <?php if (have_posts()) : ?>
            <div class="flex flex-wrap -mx-3">
                <div class="w-full lg:w-3/12 px-3">
                    <div class="inner">
                        <div class="box__search px-6 py-6 shadow-lg">
                            <div class="box__search-head mb-6 font-bold">
                                <p class="text-xl"><?php esc_html_e("Filter post", 'dvutheme') ?></p>
                            </div>
                            <div class="box__search-form">
                                <form>
                                    <div class="w-full mb-4">
                                        <label for="country" class="hidden text-sm font-medium leading-6 text-gray-900">Search</label>
                                        <div class="flex rounded-[4px] h-[40px] shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-orange-500">
                                            <input type="text" name="search_post" autocomplete="searchpost" class="block flex-1 border-0 bg-transparent py-2 pl-4 text-gray-900 placeholder:text-gray-400 focus:ring-0 focus-visible:ring-0 focus:outline-0 focus-visible:outline-none focus-within:ring-0 sm:text-sm sm:leading-6" placeholder="<?php esc_html_e("Search", "dvutheme") ?>">
                                            <span class="flex select-none items-center pr-4 text-gray-500 sm:text-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                    <path d="M18.5 18.5L14.3 14.3M16.5 9C16.5 13.1421 13.1421 16.5 9 16.5C4.85786 16.5 1.5 13.1421 1.5 9C1.5 4.85786 4.85786 1.5 9 1.5C13.1421 1.5 16.5 4.85786 16.5 9Z" stroke="#F26D21" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex -mx-2">
                                        <div class="w-3/5 mb-4 px-2">
                                            <label for="country" class="hidden text-sm font-medium leading-6 text-gray-900 mb-2">Country</label>
                                            <div class="custom-select">
                                                <select name="country" autocomplete="country-name" class="block w-full rounded-[4px] h-[40px] border-0 py-2 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-orange-500 sm:max-w-xs">
                                                    <option>Thang 12</option>
                                                    <option>Thang 12</option>
                                                    <option>Thang 12</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="w-2/5 mb-4 px-2">
                                            <label for="country" class="hidden text-sm font-medium leading-6 text-gray-900 mb-2">Country</label>
                                            <div class="custom-select">
                                                <select name="country" autocomplete="country-name" class="block w-full rounded-[4px] h-[40px] border-0 py-2 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-orange-500 sm:max-w-xs">
                                                    <option>Thang 12</option>
                                                    <option>Thang 12</option>
                                                    <option>Thang 12</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full mb-4">
                                        <label for="country" class="hidden text-sm font-medium leading-6 text-gray-900 mb-2">Country</label>
                                        <div class="custom-select">
                                            <select name="country" autocomplete="country-name" class="block w-full rounded-[4px] h-[40px] border-0 py-2 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-orange-500 sm:max-w-xs">
                                                <option>Thang 12</option>
                                                <option>Thang 12</option>
                                                <option>Thang 12</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-9/12 px-3 post-list">
                    <div class="flex flex-wrap -mx-3 mb-12 gap-y-6">
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="w-full sm:w-1/2 lg:w-1/3 px-3">
                                <?php get_template_part('templates/post/content', 'box'); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="paginations mb-12">
                        <?php echo dvu_get_post_paginations() ?>
                    </div>
                </div>

            </div>
        <?php
        else :
            get_template_part('templates/post/content', 'none');
        endif;
        ?>
    </div>
</div>