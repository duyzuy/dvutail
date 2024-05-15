<?php
/*
* Template Name: Blank page
*
*
*/
get_header()
?>

<main id="main">
    <div class="page__wrapper">
        <?php while (have_posts()) : the_post(); ?>
            <div class="page__wrapper-body relative">
                <div class="bg-[url(<?php echo get_template_directory_uri() . '/assets/images/global-left.svg' ?>)] w-[150px] h-[150px] xl:w-[300px] xl:h-[300px] bg-cover absolute -right-[80px] xl:-right-[150px] top-[10%]"></div>
                <div class="bg-[url(<?php echo get_template_directory_uri() . '/assets/images/global-right.svg' ?>)] w-[150px] h-[150px] xl:w-[300px] xl:h-[300px] bg-cover absolute -left-[80px] xl:-left-[150px] top-[60%]"></div>
                <div class="container relative z-10 mx-auto px-3 md:px-6 lg:px-8 ">
                    <?php the_content() ?>
                </div>
            </div>

        <?php endwhile; ?>
    </div>
</main>
<?php get_footer() ?>