<?php
/*
* Template Name: page full width
*
*
*/
get_header() ?>

<main id="main">
    <div class="page__wrapper relative">
        <div class="bg-[url(<?php echo get_template_directory_uri() . '/assets/images/global-left.svg' ?>)] w-[150px] h-[150px] xl:w-[300px] xl:h-[300px] -z-10 bg-cover absolute -right-[80px] xl:-right-[150px] top-[10%]"></div>
        <div class="bg-[url(<?php echo get_template_directory_uri() . '/assets/images/global-right.svg' ?>)] w-[150px] h-[150px] xl:w-[300px] xl:h-[300px] -z-10 bg-cover absolute -left-[80px] xl:-left-[150px] top-[60%]"></div>
        <div class="relative">
            <?php while (have_posts()) : the_post(); ?>
                <?php the_content() ?>
            <?php endwhile; ?>
        </div>
    </div>
</main>

<?php get_footer() ?>