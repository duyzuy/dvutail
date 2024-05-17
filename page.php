<?php get_header() ?>
<main id="main">
    <div class="page__wrapper">
        <?php while (have_posts()) : the_post(); ?>
            <?php
            $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');

            if (empty($thumbnail)) : ?>
                <div class="hero bg-gradient-to-t py-12 lg:py-24 px-3 lg:px-0 relative overflow-hidden from-[#3B5AA7] via-[#3D85C5] to-[#3FA9DF]">
                    <div class="pattern absolute w-[16vw] h-[16vw] -top-[6vw] -right-[6vw] bg-no-repeat bg-cover bg-[url(http://localhost/itechexpo/wp-content/themes/itech/assets/images/pattern-tr.svg)]"></div>
                    <div class="pattern absolute w-[16vw] h-[16vw] -bottom-[6vw] -left-[6vw] bg-no-repeat bg-cover bg-[url(http://localhost/itechexpo/wp-content/themes/itech/assets/images/pattern-bl.svg)]"></div>
                    <div class="container mx-auto text-white mb-3 text-center max-w-5xl">
                        <h1 class="entry-title text-white font-bold text-2xl lg:text-4xl 2xl:text-6xl font-[Monsterat]"><?php the_title(); ?></h1>
                    </div>
                </div>
            <?php else : ?>
                <header class="page__wrapper-head bg-[url(<?php echo $thumbnail; ?>)] bg-center bg-cover md:h-[250px] lg:h-[350px] 2xl:h-[500px] flex items-center font-[Monsterat]">
                    <div class="container mx-auto lg:py-6 px-0 md:px-6 lg:px-8">
                        <div class="flex items-center">
                            <div class="page__title bg-gradient-to-r from-[#CC2027]/80 via-[#E15723]/80 to-transparent pl-4 pr-16 py-6 md:py-3 lg:pl-12 lg:py-8 lg:pr-16 xl:pl-12 xl:py-8 2xl:pr-24 w-fit uppercase">
                                <?php the_title('<h1 class="entry-title text-white font-bold text-2xl lg:text-4xl 2xl:text-6xl">', '</h1>'); ?>
                            </div>
                        </div>
                    </div>
                </header>
            <?php endif; ?>
            <div class="page__wrapper-body relative">
                <div class="bg-[url(<?php echo get_template_directory_uri() . '/assets/images/global-left.svg' ?>)] w-[150px] h-[150px] xl:w-[300px] xl:h-[300px] bg-cover absolute -right-[80px] xl:-right-[150px] top-[10%]"></div>
                <div class="bg-[url(<?php echo get_template_directory_uri() . '/assets/images/global-right.svg' ?>)] w-[150px] h-[150px] xl:w-[300px] xl:h-[300px] bg-cover absolute -left-[80px] xl:-left-[150px] top-[60%]"></div>
                <div class="container relative z-10 mx-auto px-3 md:px-6 lg:px-8">
                    <?php the_content() ?>
                </div>
            </div>

        <?php endwhile; ?>
    </div>
</main>
<?php get_footer() ?>