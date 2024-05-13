<article id="post-<?php echo $post->ID ?>" class="sgh-box-post col-12 col-sm-6 col-md-3">

    <div class="sgh-inner-box">

        <div class="post-box-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) :
                    the_post_thumbnail('medium', ['class'  =>  'img-fluid']);
                endif;
                ?>
            </a>
            <div class="post-meta-cat"><?php sgh_category_post(); ?></div>
        </div>
        <div class="post-box-content">
            <div class="inner-box">
                <time datetime="<?php echo get_the_date('j/M/Y'); ?>" itemprop="datePublished"><?php echo get_the_date('j/M/Y') ?></time>
                <h3 class="post-title line-clamp line-clamp-2"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                <p class="post-excerpt line-clamp-4 mb-3"><?php echo get_the_excerpt(); ?></p>
                <a class="view-more-link" href="<?php the_permalink() ?>"><?php esc_html_e('Đọc tiếp', 'saigonhome') ?><i class="sghome-icon sghome-next"></i></a>
            </div>
        </div>

    </div>
</article>