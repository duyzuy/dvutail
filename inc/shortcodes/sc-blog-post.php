<?php 
function sc_section_blog_post( $atts ) {
    wp_enqueue_script('blog_slide');
    $attr = shortcode_atts( array(
        'limit' => '12',
        'cat' => '',
        'class' => '',
        'title' => 'tiêu đề',
    ), $atts );

    ob_start();
    ?>
    <section id="blog-post">
		<div class="container">
			<div class="row-title">
				<h3 class="section-title flow-text small-text"><?php echo $attr['title'] ?></h3>
			</div>
            <div class="blog-slide">
                            <?php
                            if($attr['cat'] != ''){
                                $args = array(
                                    'post_type' => 'post',
                                    'post_status'           => 'publish',
                                    'posts_per_page' => $attr['limit'],
                                    'cat'   =>  $attr['cat']
                                );
                            }
                            elseif($attr['cat'] == ''){
                                $args = array(
                                    'post_type' => 'post',
                                    'post_status'           => 'publish',
                                    'posts_per_page' => $attr['limit'],
                                );
                            }
                            $loop = new WP_Query( $args );
                                if ( $loop->have_posts() ) {
                                        while ( $loop->have_posts() ) : $loop->the_post();
                                          get_template_part('templates/post/content', 'box');
                                        endwhile;
                                    } else {
                                        echo __( 'Đang cập nhật bài viết' );
                                    }
                                    wp_reset_postdata();
                            ?>
			</div>
		</div>
	</section>
    <?php
    return ob_get_clean();
   
}
add_shortcode( 'blog', 'sc_section_blog_post' );