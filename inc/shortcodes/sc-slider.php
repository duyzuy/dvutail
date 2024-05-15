<?php
function dvu_slider($atts)
{
    $attr = shortcode_atts(array(
        'slider_id'     => 92,
        'class' =>  ""
    ), $atts);
    ob_start();
    $slide_args = array(
        'post_type' => 'slider',
        'tax_query' => array(
            array(
                'taxonomy' => 'group_slider',
                'field' => 'term_id',
                'terms' =>  $attr['slider_id'],
            ),
        ),
    );
?>
    <div class="section-slide <?php echo $attr['class'] ?>">
        <?php
        $query = new WP_Query($slide_args);
        if ($query->have_posts()) :
            global $post;
            $output_slide = '';
            $output_title = '';

            while ($query->have_posts()) : $query->the_post();

                $slider_options = get_post_meta($post->ID, '_slide_options', true);
                $link = isset($slider_options['link']) ? $slider_options['link'] : "";

                $title = get_the_title();
                $content = get_the_excerpt();

                $output_title .= '<div class="dvu__thumbn-item"><h4>' . $title . '</h4></div>';

                if (has_post_thumbnail()) {
                    $url = get_the_post_thumbnail_url($post->ID, 'full');
                } else {
                    $url = '';
                }
                $output_slide .= '<div class="dvu__item-slide">';
                if ($link) {
                    $output_slide .= '<a href="' . $link . '" target="_blank">';
                }
                $output_slide .= '<div class="slide-item__image"><img class="block italic w-full"  src="' . $url . '" alt="' . $title . '"/></div>';
                if ($link) {
                    $output_slide .=    '</a>';
                }
                $output_slide .=    '</div>';
            endwhile;
            wp_reset_postdata();
            echo '<div class="dvu__slider slider">' . $output_slide . '</div>';

        endif;
        ?>
    </div>
<?php
    return ob_get_clean();
}
add_shortcode('dvu_slider', 'dvu_slider');
