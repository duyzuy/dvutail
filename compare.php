<?php
/*
* Template Name: So sánh sản phẩm
*
*
*/
get_header() ?>

<div id="page-content" class="wrap-page-content">
    
    <header class="entry-header page-header">
        <div class="container">
            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
            <div class="bread-crumbs page__bread-crumbs">
                <?php custom_breadcrumbs(); ?>
            </div>
        </div>
    </header>
    <div class="content">
        <div class="container">
        <?php 
            echo do_shortcode( '[compare-product]');
            ?>
        </div>
    </div>
</div>

<?php get_footer() ?>