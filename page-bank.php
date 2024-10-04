<?php
/*
* Template Name: Blank page
*/
get_header() ?>

<div class="page-layout container mx-auto lg:px-8 md:px-6 px-3 mb-3 lg:mb-6">
    <?php while (have_posts()) : the_post(); ?>
        <div class="page-layout__body relative dvutail-single-post__body">
            <?php the_content() ?>
        </div>
    <?php endwhile; ?>
</div>
<?php get_footer() ?>