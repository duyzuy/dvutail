<?php
get_header();

$search_query = get_search_query();

?>

<div id="page-content" class="search-page mb-6">
    <div class="bread-crumbs page__bread-crumbs mb-6">
        <div class="container mx-auto lg:px-8 md:px-6 px-3 py-3">
            <?php custom_breadcrumbs(); ?>
        </div>
    </div>
    <div class="container mx-auto lg:px-8 px-3 md:px-6">
        <div class="search-page__header mb-6">
            <h1 class="text-xl lg:text-2xl">Từ khoá tìm kiếm: <span><?php echo $search_query ?></span></h1>
        </div>
        <div class="search-page__body">
            <div class="search-form mb-6">
                <?php get_search_form(); ?>
            </div>
            <?php if (have_posts()) : ?>
                <div class="grid lg:grid-cols-4 grid-cols-2 gap-3 lg:gap-6">
                    <?php
                    /* Start the Loop */
                    while (have_posts()) : the_post();

                        get_template_part('templates/post/content', 'box');

                    endwhile; // End of the loop.
                    ?>
                </div>
            <?php else : ?>

                <div class="bg-white lg:px-6 px-4 py-3 rounded-md shadow-sm mb-6">
                    <p class="alert alert-warning" role="alert"><?php _e('Không có nội dung khớp với yêu cầu tìm kiếm của bạn, vui lòng tìm nội dung khác', 'saigonhome'); ?></p>
                </div>

            <?php endif; ?>
        </div>
    </div>
</div>
</div>

<?php get_footer() ?>