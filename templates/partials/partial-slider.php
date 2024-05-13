<?php
$mode = isset($args['mode']) ? $args['mode'] : 'slide';

$query_args = array(
    'post_type' => 'slider',
    'tax_query' => array(
        array(
            'taxonomy' => 'group_slider',
            'field' => 'term_id',
            'terms' =>  5,
        ),
    ),
);

?>
<div class="section-home-promote">
    <?php if ($mode === 'slide') : ?>
        <div id="dvu-home-slider" class="dvu__wrap-slider dvu-home-slide">
            <?php
            $query = new WP_Query($query_args);
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
                    $output_slide .= '<div class="dvu-item-slide">';
                    if ($link) {
                        $output_slide .= '<a href="' . $link . '" target="_blank">';
                    }
                    $output_slide .= '<div class="slide-item__image"><img class="img-fluid"  src="' . $url . '" alt="' . $title . '"/></div>';
                    if ($link) {
                        $output_slide .=    '</a>';
                    }
                    $output_slide .=    '</div>';
                endwhile;
                wp_reset_postdata();
                echo '<div class="dvu__home-slider slider">' . $output_slide . '</div>';
            else :
                echo 'no slider';
            endif;
            ?>
        </div>
        <?php get_template_part('templates/partials/partial', 'merque', array('class' => "front-page mb-lg-5 mb-md-4 mb-3")) ?>

    <?php else : ?>
        <div class="dvu__home-video-container w-full pt-[46%] relative">
            <video autoplay="1" id="myVideo" muted loop class=" absolute top-0 right-0 w-full h-full object-cover">
                <source src="<?php echo get_template_directory_uri() . '/assets/video-intro.mp4' ?>" type="video/mp4" muted repeat>
                Your browser does not support the video tag.
            </video>
        </div>
    <?php endif ?>
</div>