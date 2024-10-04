<?php
/*
* Template Name: page for woo
*/
get_header() ?>

<div class="page-for-woo mb-3 lg:mb-6">
    <?php while (have_posts()) : the_post(); ?>
        <div class="container mx-auto px-3 md:px-6 lg:px-8">
            <div class="page-for-woo__header py-3 lg:py-8 text-center">
                <h1 class="font-bold text-2xl lg:text-3xl lg:leading-[48px]"><?php the_title(); ?></h1>
                <div class="overflow-x-auto whitespace-nowrap py-2 flex items-center justify-center">
                    <?php custom_breadcrumbs() ?>
                </div>
            </div>
            <div class="page-for-woo__body relative">
                <?php the_content() ?>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<?php get_footer() ?>