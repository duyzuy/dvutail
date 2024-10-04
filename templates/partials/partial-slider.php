<?php
$mode = isset($args['mode']) ? $args['mode'] : 'slide';
$class = $args['class'] ? $args['class'] . " " : '';

$query_args = array(
    'post_type' => 'slider',
    'tax_query' => array(
        array(
            'taxonomy' => 'group_slider',
            'field' => 'term_id',
            'terms' =>  103,
        ),
    ),
);
$query = new WP_Query($query_args);
$class .= "home__swiper-container container mx-auto px-3 md:px-6 lg:px-8 relative";
?>

<?php if ($mode === 'slide') : ?>
    <div class="<?php echo $class; ?>">
        <?php

        if ($query->have_posts()) :
            global $post;
            $output_slide = '';
            $output_title = '';

            while ($query->have_posts()) : $query->the_post();

                $slider_options = get_post_meta($post->ID, '_slide_options', true);
                $link = isset($slider_options['link']) ? $slider_options['link'] : "";

                $title = get_the_title();
                $content = get_the_excerpt();
                $output_title .= '<div class="dvu-thumbn-item"><h4>' . $title . '</h4></div>';
                if (has_post_thumbnail()) {
                    $url = get_the_post_thumbnail_url($post->ID, 'full');
                } else {
                    $url = '';
                }
                $output_slide .= '<div class="swiper-slide rounded-lg overflow-hidden">';
                if ($link) {
                    $output_slide .= '<a href="' . $link . '" target="_blank">';
                }
                $output_slide .= '<div class="slide-item__image"><img class="img-fluid"  src="' . $url . '" alt="' . $title . '"/></div>';
                if ($link) {
                    $output_slide .= '</a>';
                }
                $output_slide .= '</div>';
            endwhile;
            wp_reset_postdata();
            echo '<div class="home__swiper-slider swiper"><div class="swiper-wrapper">' . $output_slide . '</div></div><div class="home__swiper-slider-pagination text-center"></div><div class="swiper-button-prev"></div><div class="swiper-button-next"></div>';
        else :
            echo 'no slider';
        endif;
        ?>
    </div>
<?php else : ?>
    <div class="dvu__home-video-container w-full pt-[46%] relative">
        <video autoplay="1" id="myVideo" muted loop class=" absolute top-0 right-0 w-full h-full object-cover">
            <source src="<?php echo get_template_directory_uri() . '/assets/video-intro.mp4' ?>" type="video/mp4" muted repeat>
            Your browser does not support the video tag.
        </video>
    </div>
<?php endif ?>