<?php get_header() ?>

<div class="page-layout">
    <?php while (have_posts()) : the_post(); ?>
        <?php
        $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');

        if (empty($thumbnail)) : ?>
            <div class="page-layout__head pt-12 mb-6">
                <div class="container mx-auto text-center">
                    <h1 class="font-bold text-2xl lg:text-3xl lg:leading-[48px]"><?php the_title(); ?></h1>
                    <div class="overflow-x-auto whitespace-nowrap py-2 flex items-center justify-center">
                        <?php custom_breadcrumbs() ?>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="page-layout__head bg-[url(<?php echo $thumbnail; ?>)] bg-center bg-cover md:h-[250px] lg:h-[350px] 2xl:h-[500px] flex items-center  mb-6">
                <div class="container mx-auto lg:py-6 px-0 md:px-6 lg:px-8">
                    <div class="flex items-center">
                        <div class="page-layout__title bg-gradient-to-r from-[#CC2027]/80 via-[#E15723]/80 to-transparent pl-4 pr-16 py-6 md:py-3 lg:pl-12 lg:py-8 lg:pr-16 xl:pl-12 xl:py-8 2xl:pr-24 w-fit uppercase">
                            <h1 class="font-bold text-2xl lg:text-3xl lg:leading-[48px] mb-6"><?php the_title(); ?></h1>
                            <div class="overflow-x-auto whitespace-nowrap py-2 flex items-center justify-center">
                                <?php custom_breadcrumbs() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="page-layout__body relative dvutail-single-post__body">
            <div class="container relative mx-auto px-3 md:px-6 lg:px-8">
                <div class="bg-white rounded-md shadow-sm mb-6 px-3 py-12">
                    <div class="max-w-[850px] mx-auto">
                        <?php the_content() ?>
                    </div>
                </div>
            </div>
        </div>

    <?php endwhile; ?>
</div>

<?php get_footer() ?>