<div class="archive-layout">
    <div class="container mx-auto px-3 md:px-6 lg:px-8">
        <div class="archive__layout-head py-12">
            <?php if (is_archive()) : ?>
                <div class="archive-title text-center">
                    <h1 class="inline-block text-xl lg:text-2xl uppercase font-bold">
                        <?php single_cat_title() ?>
                    </h1>
                </div>
                <div class="bread-crumbs archive__bread-crumbs flex items-center justify-center">
                    <?php custom_breadcrumbs(); ?>
                </div>
                <div class="archive-description">
                    <?php the_archive_description() ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="archive__layout-body">
            <?php if (have_posts()) : ?>

                <div class="grid grid-cols-2 lg:grid-cols-4 lg:gap-6 gap-3 mb-6">
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