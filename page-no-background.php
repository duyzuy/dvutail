<?php
/*
* Template Name: No background
*
*
*/
get_header()
?>

<div class="page-layout container mx-auto lg:px-8 md:px-6 px-3 mb-3 lg:mb-6">
    <?php while (have_posts()) : the_post(); ?>
        <div class="page-layout__head pt-12 mb-3 lg:mb-6 text-center">
            <h1 class="font-bold text-2xl lg:text-3xl lg:leading-[48px]"><?php the_title(); ?></h1>
            <div class="overflow-x-auto whitespace-nowrap py-2 flex items-center justify-center">
                <?php custom_breadcrumbs() ?>
            </div>
        </div>
        <div class="page-layout__body relative dvutail-single-post__body">
            <?php the_content() ?>
        </div>
    <?php endwhile; ?>
</div>

<?php get_footer() ?>