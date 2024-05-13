<?php get_header() ?>



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
        if ( have_posts() ) :
            echo '<div class="row">';
			/* Start the Loop */
			while ( have_posts() ) : the_post();
          
				get_template_part( 'templates/post/content', 'search' );

			endwhile; // End of the loop.

            echo '</div>';
		else : ?>

			<p  class="alert alert-warning" role="alert"><?php _e( 'Không có nội dung khớp với yêu cầu tìm kiếm của bạn, vui lòng tìm nội dung khác', 'saigonhome' ); ?></p>
			<?php
				get_search_form();

		endif;
		?>
        </div>
    </div>
</div>

<?php get_footer() ?>