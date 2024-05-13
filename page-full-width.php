<?php
/*
* Template Name: page full width
*
*
*/
get_header() ?>

<div id="page-content" class="wrap-page-content">

    <div class="content">
        <?php while (have_posts()) : the_post(); ?>
            <?php the_content() ?>
        <?php endwhile; ?>
    </div>
</div>

<?php get_footer() ?>