<div class="archive-layout container mx-auto px-3 md:px-6 lg:px-8">
    <div class="archive__layout-head py-12">
        <?php if (is_archive()) : ?>
            <div class="archive-title text-center">
                <h1 class="bg-gradient-to-tr from-[#CC2027] via-[#EB7121] to-[#F48820] inline-block text-transparent bg-clip-text text-2xl lg:text-4xl uppercase font-bold">
                    <?php single_cat_title() ?>
                </h1>
            </div>
            <div class="bread-crumbs archive__bread-crumbs">
                <?php custom_breadcrumbs(); ?>
            </div>
            <div class="archive-description">
                <?php the_archive_description() ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="archive__layout-body">
        <?php if (have_posts()) : ?>
            <div class="w-full px-3 post-list">
                <div class="flex flex-wrap -mx-3 mb-12 gap-y-6">
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="w-full sm:w-1/2 lg:w-1/3 xl:w-1/4 px-3">
                            <?php get_template_part('templates/post/content', 'box'); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="paginations mb-12">
                    <?php echo dvu_get_post_paginations() ?>
                </div>
            </div>
        <?php
        else :
            get_template_part('templates/post/content', 'none');
        endif;

        ?>

    </div>
</div>