<?php 
function sc_section_blog_post_list( $atts ) {
    wp_enqueue_script('blog_slide');
    $attr = shortcode_atts( array(
        'limit' => '6',
        'cat' => '',
        'class' => '',
        'title' => 'tiêu đề',
    ), $atts );

    ob_start();
    ?>
    <section id="blog-post-list">
		<div class="container">
            <div class="inner-container">
                <div class="row-title">
                    <h3 class="section-title flow-text small-text"><?php echo __( $attr['title'], 'dvtheme' ) ?></h3>
                </div>
                <div class="row-body">
                    <?php
                        $args = array(
                        'post_type' => 'post',
                        'post_status'           => 'publish',
                        'posts_per_page' => $attr['limit'],
                    );

                    if($attr['cat'] != ''){
                        $args = array(
                            'post_type' => 'post',
                            'post_status'           => 'publish',
                            'posts_per_page' => $attr['limit'],
                            'cat'   =>  $attr['cat']
                        );
                    }
                            
                    $loop = new WP_Query( $args );
                        if ( $loop->have_posts() ) { ?>
                            <div class='blog-list row row-small mb-2 mb-lg-3'>
                              <?php   while ( $loop->have_posts() ) : $loop->the_post();
                                    $thumbnail_url = "";
                                    if(has_post_thumbnail()): 
                                        $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large', true );
                                        $thumbnail_url = $thumbnail_url[0];
                                    endif;
                                ?>
                                    <article id="post-<?php the_ID();?>" class="dvu__article col col-6 col-lg-3">                                 
                                        <div class="inner-article">
                                        <a href="<?php the_permalink(); ?>">
                                                <div class="post-box-thumbnail">
                                                        <img src="<?php echo $thumbnail_url ?>" class="img-fluid" alt="<?php the_title() ?>" />
                                                </div>
                                                <div class="post-box-content">
                                                    <div class="inner-box">
                                                        <h3 class="post-title line-clamp line-clamp-2"><?php the_title() ?></h3>
                                                        <p class="post-excerpt"><?php sgh_except_post(); ?></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </article>
                                <?php endwhile; ?>
                            </div>
                                <div>
                                    <a href="" class="btn btn-view-more">
                                        <span class="label"><?php echo _e("Xem thêm", 'dvutheme'); ?></span>
                                        <span class="dvu-icon size-12 ml-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                                        </svg></span>
                                    </a>
                                </div>
                             
                        <?php 
                            } else {
                            echo __( 'Đang cập nhật bài viết' );
                        }
                        wp_reset_postdata();    
                    ?>
                </div>
            </div>
		</div>
	</section>
    <?php
    return ob_get_clean();
   
}
add_shortcode( 'blog_list', 'sc_section_blog_post_list' );