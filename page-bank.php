<?php
/*
* Template Name: Blank page
*
*
*/
get_header('blank')
 ?>

<div id="blank-page" class="wrap-page-content">
    
    <div class="container">
        <div class="wrap_page">
            <?php while(have_posts()): the_post(); ?>
                <?php the_content() ?>
            <?php endwhile; ?>
        </div>
      
    </div>
</div>

<?php 
get_footer('blank');
?>

