<?php

function dvu_category_post()
{
    $categories = get_the_category();
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

add_filter('get_the_excerpt', function ($excerpt, $post) {

    $excerpt_length = 40; // Change excerpt length 
    // has_excerpt( $post )
    $excerpt = wp_trim_words($excerpt, $excerpt_length);
    return $excerpt;
}, 10, 2);


function dvu_get_post_paginations()
{

    global $wp_query;

    $prev_arrow = '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 40 41" fill="none"><g clip-path="url(#clip0_12_15483)"><path d="M20 1.75C9.64466 1.75 1.25 10.1447 1.25 20.5C1.25 30.8553 9.64466 39.25 20 39.25C30.3553 39.25 38.75 30.8553 38.75 20.5C38.75 10.1447 30.3553 1.75 20 1.75Z" stroke="url(#paint0_linear_12_15483)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M27.8125 20.5L12.1875 20.5" stroke="url(#paint1_linear_12_15483)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M18.4375 26.75L12.1875 20.5L18.4375 14.25" stroke="url(#paint2_linear_12_15483)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
    </g><defs><linearGradient id="paint0_linear_12_15483" x1="54.75" y1="29.6248" x2="-10.9999" y2="29.6248" gradientUnits="userSpaceOnUse"><stop stop-color="#3B5AA7"></stop><stop offset="0.22" stop-color="#3B65AF"></stop><stop offset="0.62" stop-color="#3D85C5"></stop><stop offset="1" stop-color="#3FA9DF"></stop></linearGradient>
    <linearGradient id="paint1_linear_12_15483" x1="34.4792" y1="20.2433" x2="7.08337" y2="20.2433" gradientUnits="userSpaceOnUse"><stop stop-color="#3B5AA7"></stop><stop offset="0.22" stop-color="#3B65AF"></stop>
    <stop offset="0.62" stop-color="#3D85C5"></stop><stop offset="1" stop-color="#3FA9DF"></stop></linearGradient><linearGradient id="paint2_linear_12_15483" x1="21.1042" y1="23.5416" x2="10.1458" y2="23.5416" gradientUnits="userSpaceOnUse">
    <stop stop-color="#3B5AA7"></stop><stop offset="0.22" stop-color="#3B65AF"></stop><stop offset="0.62" stop-color="#3D85C5"></stop><stop offset="1" stop-color="#3FA9DF"></stop></linearGradient><clipPath id="clip0_12_15483"><rect width="40" height="40" fill="white" transform="translate(40 40.5) rotate(-180)"></rect></clipPath></defs></svg>';
    $next_arrow = '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 40 41" fill="none"><g clip-path="url(#clip0_12_15528)"><path d="M20 39.25C30.3553 39.25 38.75 30.8553 38.75 20.5C38.75 10.1447 30.3553 1.75 20 1.75C9.64466 1.75 1.25 10.1447 1.25 20.5C1.25 30.8553 9.64466 39.25 20 39.25Z" stroke="url(#paint0_linear_12_15528)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
    <path d="M12.1875 20.5H27.8125" stroke="url(#paint1_linear_12_15528)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M21.5625 14.25L27.8125 20.5L21.5625 26.75" stroke="url(#paint2_linear_12_15528)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
    </g><defs><linearGradient id="paint0_linear_12_15528" x1="-14.75" y1="11.3752" x2="50.9999" y2="11.3752" gradientUnits="userSpaceOnUse"><stop stop-color="#3B5AA7"></stop><stop offset="0.22" stop-color="#3B65AF"></stop>
    <stop offset="0.62" stop-color="#3D85C5"></stop><stop offset="1" stop-color="#3FA9DF"></stop></linearGradient><linearGradient id="paint1_linear_12_15528" x1="5.52085" y1="20.7567" x2="32.9166" y2="20.7567" gradientUnits="userSpaceOnUse">
    <stop stop-color="#3B5AA7"></stop><stop offset="0.22" stop-color="#3B65AF"></stop><stop offset="0.62" stop-color="#3D85C5"></stop><stop offset="1" stop-color="#3FA9DF"></stop></linearGradient><linearGradient id="paint2_linear_12_15528" x1="18.8958" y1="17.4584" x2="29.8542" y2="17.4584" gradientUnits="userSpaceOnUse">
    <stop stop-color="#3B5AA7"></stop><stop offset="0.22" stop-color="#3B65AF"></stop><stop offset="0.62" stop-color="#3D85C5"></stop><stop offset="1" stop-color="#3FA9DF"></stop></linearGradient><clipPath id="clip0_12_15528"><rect width="40" height="40" fill="white" transform="translate(0 0.5)"></rect></clipPath></defs></svg>';

    return paginate_links(array(
        'base' => str_replace(99999, '%#%', esc_url(get_pagenum_link(99999))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'type'  =>  'list',
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
    <ul class="socials-shares">

        <li class="facebook">
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" rel="nofollow" target="_blank">
                <span class="dvu-icon size-14">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                    </svg>
                </span>
            </a>
        </li>
        <li class="twitter">
            <a href="https://twitter.com/intent/tweet?text=<?php the_title() ?> &amp;url=<?php the_permalink() ?>" title="" rel="nofollow" target="_blank">
                <span class="dvu-icon size-14">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                        <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
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

?>
    <div class="post-meta flex gap-x-3 py-3">
        <span class="date inline-flex items-center text-[#929292]">
            <span class="mr-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 22 22" fill="none">
                    <path d="M6.60759 3.96407V2.20227M14.5357 3.96407V2.20227M6.60759 7.48768H14.5357M3.96489 18.0585H17.1784C17.6649 18.0585 18.0593 17.6641 18.0593 17.1776V4.84498C18.0593 4.35847 17.6649 3.96407 17.1784 3.96407H3.96489C3.47838 3.96407 3.08398 4.35847 3.08398 4.84498V17.1776C3.08398 17.6641 3.47838 18.0585 3.96489 18.0585Z" stroke="#929292" stroke-width="1.58562" stroke-linecap="round"></path>
                </svg>
            </span>
            <span><time datetime="<?php echo get_the_date('j/M/Y'); ?>" itemprop="datePublished"><?php echo get_the_date($date_format) ?></time></span>
        </span>
        <span class="author inline-flex items-center text-[#929292]">
            <span class="mr-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 22 22" fill="none">
                    <path d="M5.01305 16.8276C6.20147 15.0915 8.15698 13.9635 10.5707 13.9635C12.9845 13.9635 14.94 15.0915 16.1284 16.8276M5.01305 16.8276C6.49103 18.1414 8.43768 18.9394 10.5707 18.9394C12.7037 18.9394 14.6504 18.1414 16.1284 16.8276M5.01305 16.8276C3.28858 15.2947 2.20215 13.0597 2.20215 10.5708C2.20215 5.949 5.94888 2.20227 10.5707 2.20227C15.1925 2.20227 18.9393 5.949 18.9393 10.5708C18.9393 13.0597 17.8529 15.2947 16.1284 16.8276M13.6539 8.80904C13.6539 10.5118 12.2735 11.8922 10.5707 11.8922C8.86793 11.8922 7.48756 10.5118 7.48756 8.80904C7.48756 7.10625 8.86793 5.72588 10.5707 5.72588C12.2735 5.72588 13.6539 7.10625 13.6539 8.80904Z" stroke="#929292" stroke-width="1.58562" stroke-linejoin="round"></path>
                </svg>
            </span>
            <span><?php echo $author_nicename; ?></span>
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
        'posts_per_page' => '4',
        'cat'       => $cate_id,
        'post__not_in'  => array(get_the_ID()),
    );
    $loop = new WP_Query($args);
    if ($loop->have_posts()) :
    ?>
        <div class="mb-6">
            <h3 class="bg-gradient-to-tr from-[#CC2027] via-[#EB7121] to-[#F48820] inline-block text-transparent bg-clip-text text-2xl lg:text-4xl font-bold">
                <?php esc_html_e('Related posts', 'dvutheme'); ?>
            </h3>
        </div>
        <div class="posts-archive post-related-archive">
            <div class="flex flex-wrap gap-y-6 -mx-3">
                <?php
                while ($loop->have_posts()) : $loop->the_post(); ?>
                    <div class="w-full sm:w-1/2 lg:w-1/4 px-3">
                        <?php get_template_part('templates/post/content-box', "", array("excerpt" => "")) ?>
                    </div>
                <?php
                endwhile; ?>
            </div>
        </div>
<?php
    endif;
    wp_reset_postdata();
}
