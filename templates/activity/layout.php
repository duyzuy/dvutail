<div class="archive__activity">
    <?php get_template_part("templates/activity/partials/header", "") ?>

    <div class="container px-3 md:px-6 lg:px-8 mx-auto xl:max-w-7xl">
        <?php get_template_part("templates/activity/partials/form-filter", "", array("class" => "py-12")) ?>
        <div class="activity__list-container">
            <?php if (have_posts()) : ?>

                <?php while (have_posts()) : the_post(); ?>

                    <?php get_template_part('templates/activity/content', 'box'); ?>

                <?php endwhile;  ?>

        </div>
        <div class="row row-pagination">
            <nav class="pagination">
                <?php echo paginate_links(array(
                    'prev_text' => __('<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>', 'dvutheme'),
                    'next_text' => __('<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>', 'dvutheme'),
                    'prev_next' => true,
                )); ?>
            </nav>
        </div>

    <?php else : ?>
        <?php get_template_part('templates/post/content', 'empty'); ?>
    <?php endif; ?>

    </div>
</div>