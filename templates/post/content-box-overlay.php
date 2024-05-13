<?php

global $post;
$thumbnail = get_the_post_thumbnail_url($post->ID, 'large');
$author_nicename = get_the_author_meta('user_nicename', $post->post_author);

?>

<div class="post__slide-item-inner relative w-full pt-[52.25%]">
    <img src="<?php echo  $thumbnail; ?>" alt="<?php the_title() ?>" class="w-full h-full absolute left-0 top-0 object-cover" />
    <div class="overlay bg-gradient-to-b from-gray-950/0 via-gray-950/70 to-gray-950/80 absolute top-0 right-0 w-full h-full z-10"></div>
    <div class="post__slide-item-contents absolute bottom-0 left-0 right-0 z-20 text-white max-w-[85%] lg:px-6 lg:pb-6 px-3 pb-3">
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
        <h3 class="mb-0 lg:mb-3 text-lg lg:text-2xl line-clamp-2 font-[500]"><?php the_title() ?></h3>
        <div class="hidden lg:block">
            <p class="post-excerpt line-clamp-2 text-sm lg:text-lg"><?php echo get_the_excerpt(); ?></p>
        </div>
    </div>
</div>