<?php
/*
* Template Name: page container
*/

get_header() ?>

<div class="page-layout container mx-auto px-3 md:px-6 lg:px-8 mb-3 lg:mb-6">
    <?php while (have_posts()) : the_post(); ?>
        <div class="page-layout__head pt-12 mb-3 lg:mb-6 text-center">
            <h1 class="font-bold text-2xl lg:text-3xl lg:leading-[48px]"><?php the_title(); ?></h1>
            <div class="overflow-x-auto whitespace-nowrap py-2 flex items-center justify-center">
                <?php custom_breadcrumbs() ?>
            </div>
        </div>
        <div class="page-layout__body relative dvutail-single-post__body">
            <div class="bg-white rounded-md shadow-sm mb-6 px-3 lg:px-6 py-4 lg:py-8">
                <?php $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                <?php if ($thumbnail) : ?>
                    <div class="invisible hidden">
                        <img src="<?php echo $thumbnail; ?>" class="w-full" />
                    </div>
                <?php endif; ?>
                <?php the_content() ?>
            </div>
        </div>

    <?php endwhile; ?>
</div>

<?php get_footer() ?>