<?php
/*
* Template Name: Page Register Form
*
*
*/
get_header();

?>

<main id="main">
    <div class="page__wrapper">

        <?php while (have_posts()) : the_post(); ?>
            <?php
            $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
            if (!empty($thumbnail)) : ?>
                <div class="page__wrapper-head mb-12">
                    <img src="<?php echo $thumbnail; ?>" />
                </div>
            <?php endif; ?>
            <div class="page__wrapper-body relative">
                <div class="bg-[url(<?php echo get_template_directory_uri() . '/assets/images/global-left.svg' ?>)] w-[150px] h-[150px] xl:w-[300px] xl:h-[300px] bg-cover absolute -right-[80px] xl:-right-[150px] top-[10%]"></div>
                <div class="bg-[url(<?php echo get_template_directory_uri() . '/assets/images/global-right.svg' ?>)] w-[150px] h-[150px] xl:w-[300px] xl:h-[300px] bg-cover absolute -left-[80px] xl:-left-[150px] top-[60%]"></div>
                <div class="mx-auto container px-3 md:px-6 lg:px-8 xl:max-w-6xl">
                    <div class="box shadow-lg px-6 lg:px-12 py-6 mb-6">
                        <div class="head mb-3">
                            <h1 class="text-3xl font-[500]"><?php the_title(); ?></h1>
                        </div>
                        <div class="description">
                            <?php the_content() ?>
                        </div>
                    </div>
                    <?php echo do_shortcode('[dvu_register_form]') ?>

                </div>
            </div>
        <?php endwhile; ?>

    </div>
</main>
<?php get_footer() ?>