<?php
function sc_section_blog_post($atts)
{
    wp_enqueue_script('blog_slide');
    $attr = shortcode_atts(array(
        'limit' => '12',
        'cat' => '',
        'class' => 'py-12 lg:py-24',
        'blog_title' => 'blog_title',
    ), $atts);

    ob_start();
    if ($attr['cat'] != '') {
        $args = array(
            'post_type' => 'post',
            'post_status'           => 'publish',
            'posts_per_page' => $attr['limit'],
            'cat'   =>  $attr['cat']
        );
    } elseif ($attr['cat'] == '') {
        $args = array(
            'post_type' => 'post',
            'post_status'           => 'publish',
            'posts_per_page' => $attr['limit'],
        );
    }
    $loop = new WP_Query($args);


?>
    <section class="dvu__blog <?php echo $attr['class'] ?>">
        <div class="container mx-auto px-3 md:px-6 lg:px-8">
            <div class="dvu__blog-title mb-12 text-center">
                <h3 class="bg-gradient-to-tr from-[#CC2027] via-[#EB7121] to-[#F48820] inline-block text-transparent bg-clip-text text-3xl lg:text-5xl uppercase font-bold font-[Monsterat]"><?php echo $attr['blog_title'] ?></h3>
            </div>
            <div class="dvu__blog-body">
                <div>
                    <?php if ($loop->have_posts()) : ?>
                        <div class="flex flex-wrap -mx-3 gap-y-6">
                            <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                <div class="w-full md:w-1/2 lg:w-1/4 px-3">
                                    <?php get_template_part('templates/post/content', 'box'); ?>
                                </div>

                            <?php endwhile; ?>
                        </div>
                    <?php else : ?>
                        <div class="py-6">Updating...</div>
                    <?php wp_reset_postdata();
                    endif;

                    ?>
                </div>
            </div>
        </div>
    </section>
<?php
    return ob_get_clean();
}
add_shortcode('dvu_blog', 'sc_section_blog_post');
