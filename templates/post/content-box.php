<?php
$url = get_the_post_thumbnail_url($post, 'medium');
$post_id = $post->ID;
$date_format = get_option('date_fomat');
$author_nicename = get_the_author_meta('user_nicename', $post->post_author);
$hide_excerpt = $args['hide_excerpt'] ?? false;


?>

<article id="post-<?php echo $post_id ?>" class="w-full shadow-sm rounded-md overflow-hidden bg-white text-sm">
    <div class="article-inner-box">
        <a href="<?php the_permalink(); ?>" alt="<?php the_title() ?>">
            <div class="artice__thumb w-full pt-[68%] relative">
                <?php
                if (empty($url)) : ?>
                    <div class="absolute left-0 top-0 w-full h-full flex items-center justify-center text-gray-400 bg-slate-50">no image</div>
                <?php else : ?>
                    <img src="<?php echo $url ?>" alt="<?php the_title() ?>" class="w-full h-full object-cover absolute left-0 top-0" />
                <?php endif; ?>
            </div>
            <div class="article__content px-4 pb-6">
                <div class="post-meta flex gap-x-3 py-3">
                    <span class="date inline-flex items-center text-gray-500">
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
                </div>
                <h3 class="line-clamp-2 mb-3 text-base lg:text-lg font-bold text-gray-800"><?php the_title() ?></h3>
                <?php if ($hide_excerpt === false):  ?>
                    <p class="post-excerpt line-clamp-3 mb-3 text-gray-600"><?php echo get_the_excerpt(); ?></p>
                    <span class="inline-flex items-center">
                        <?php esc_html_e('Xem thêm', 'dvutheme') ?>
                        <span class="ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </span>
                    </span>
                <?php endif ?>
            </div>
        </a>
    </div>
</article>