<?php

function dvu_category_post()
{
    global $post;
    $categories = get_the_category($post->ID);
    $separator = ', ';
    $output = '';
    $i = 1;
    if (!empty($categories)) :
        foreach ($categories as $category) :
            if ($i > 1) : $output .= $separator;
            endif;
            $output .= '<span class="cat cat-' . $category->term_id . '">' . esc_html($category->name) . '</span>';
            $i++;

        endforeach;

    endif;
    echo $output;
}

function dvutail_tags_post()
{
    global $post;
    $tags = get_the_tags($post->ID);
    $separator = ', ';
    $output = '';
    $i = 1;

    if (!empty($tags)) : ?>

        <div class="dvutail-tag-post flex">
            <span class="flex items-center mr-2">
                <span class="mr-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tags">
                        <path d="m15 5 6.3 6.3a2.4 2.4 0 0 1 0 3.4L17 19" />
                        <path d="M9.586 5.586A2 2 0 0 0 8.172 5H3a1 1 0 0 0-1 1v5.172a2 2 0 0 0 .586 1.414L8.29 18.29a2.426 2.426 0 0 0 3.42 0l3.58-3.58a2.426 2.426 0 0 0 0-3.42z" />
                        <circle cx="6.5" cy="9.5" r=".5" fill="currentColor" />
                    </svg>
                </span>
                <span>Thẻ</span>
            </span>
            <div class="tags-item">
                <?php foreach ($tags as $tag) :
                    $link = get_term_link($tag->term_id);

                    if ($i > 1) : $output .= $separator;
                    endif;
                    $output .= '<a href="' . $link . '" class="tag text-sm text-gray-600 hover:text-blue-600">' . esc_html($tag->name) . '</a>';
                    $i++;
                endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

<?php
}

add_filter('get_the_excerpt', function ($excerpt, $post) {

    $excerpt_length = 40; // Change excerpt length
    // has_excerpt( $post )
    $excerpt = wp_trim_words($excerpt, $excerpt_length);
    return $excerpt;
}, 10, 2);


function dvu_get_post_paginations()
{

    global $wp_query;

    $prev_arrow = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left">
        <path d="m15 18-6-6 6-6" />
    </svg>';
    $next_arrow = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right">
        <path d="m9 18 6-6-6-6" />
    </svg>';

    return paginate_links(array(
        'base' => str_replace(99999, '%#%', esc_url(get_pagenum_link(99999))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'type' => 'list',
        'before_page_number' => '',
        'after_page_number' => '',
        'mid_size' => 5,
        'aria_current' => 'current',
        'prev_text' => $prev_arrow,
        'next_text' => $next_arrow
    ));
}


function single_share_post()
{
?>
    <ul class="socials-shares flex items-center">
        <li class="w-8 h-8 flex items-center justify-center bg-white rounded-full">
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" rel="nofollow" target="_blank">
                <span class="w-6 h-6 bg-blue-100 hover:bg-blue-200 block rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook">
                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                    </svg>
                </span>
            </a>
        </li>
        <li class="w-8 h-8 flex items-center justify-center bg-white rounded-full">
            <a href="https://twitter.com/intent/tweet?text=<?php the_title() ?> &amp;url=<?php the_permalink() ?>" title="" rel="nofollow" target="_blank">
                <span class="w-6 h-6 bg-blue-100  hover:bg-blue-200 block rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-twitter">
                        <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path>
                    </svg>
                </span>
            </a>
        </li>

    </ul>
<?php
}

function single_post_meta()
{
    global $post;

    // $posted_on = human_time_diff(get_the_time('U'), current_time('timestamp'));

    $date_format = get_option('date_fomat');
    $author_nicename = get_the_author_meta('user_nicename', $post->post_author);
    $categories =  get_the_category($post->ID);

?>
    <div class="post-meta flex items-center text-gray-600 whitespace-nowrap">
        <span class="date inline-flex items-center">
            <span class="mr-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M8 2v4" />
                    <path d="M16 2v4" />
                    <rect width="18" height="18" x="3" y="4" rx="2" />
                    <path d="M3 10h18" />
                </svg>
            </span>
            <span><time datetime="<?php echo get_the_date('j/M/Y'); ?>" itemprop="datePublished"><?php echo get_the_date($date_format) ?></time></span>
        </span>
        <span class="mx-2 text-xs text-gray-300">|</span>
        <span class="author inline-flex items-center">
            <span class="mr-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10" />
                    <circle cx="12" cy="10" r="3" />
                    <path d="M7 20.662V19a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1.662" />
                </svg>
            </span>
            <span><?php echo $author_nicename; ?></span>
        </span>
        <span class="mx-2 text-xs text-gray-300">|</span>
        <span class="inline-flex items-center">
            <span class="mr-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder">
                    <path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z" />
                </svg>
            </span>
            <span class="cat-items flex items-center">
                <?php
                $count = 0;
                foreach ($categories as $key => $cat) {

                    $link = get_term_link($cat->term_id);
                    echo $count !== 0 ? ",&nbsp;" : "";
                ?>
                    <a href="<?php echo $link ?>" itemprop="item" class="text-blue-600">
                        <?php echo $cat->name;  ?>
                    </a>
                <?php $count++;
                } ?>
            </span>
        </span>
    </div>
    <?php
}

function dvu_post_related()
{

    $cates = get_the_category();
    foreach ($cates as $cate) {
        $cate_id = $cate->term_id;
    }

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => '6',
        'cat'       => $cate_id,
        'post__not_in'  => array(get_the_ID()),
    );
    $loop = new WP_Query($args);
    if ($loop->have_posts()) :
    ?>
        <div class="mb-6">
            <h3 class="text-xl lg:text-2xl font-bold">
                <?php esc_html_e('Bài viết liên quan', 'dvutheme'); ?>
            </h3>
        </div>
        <div class="posts-archive post-related-archive">
            <div class="grid grid-cols-2 lg:grid-cols-3 lg:gap-6 gap-3">
                <?php
                while ($loop->have_posts()) : $loop->the_post(); ?>
                    <?php get_template_part('templates/post/content-box', "", array("hide_excerpt" => true)) ?>
                <?php
                endwhile; ?>
            </div>
        </div>
<?php
    endif;
    wp_reset_postdata();
}
