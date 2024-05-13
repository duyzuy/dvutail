<?php
function dvu_slider_partner($atts)
{
    $attr = shortcode_atts(array(
        'image_ids'     => array(),
    ), $atts);
    ob_start();
    $image_ids = $atts['image_ids'];
    $image_ids = explode(',', $image_ids);

?>
    <section id="partner" class="last-section">
        <div class="container">
            <div class="row-title mb-40">
                <h3 class="section-title flow-text small-text">Các đối tác lớn</h3>
            </div>
            <div class="partner-list neo__partner">
                <?php
                foreach ($image_ids as $image_id) {
                    $imgurl = wp_get_attachment_url($image_id);
                    $attachment_title = get_the_title($image_id);
                    echo '<div class="brand-item"><img src="' . $imgurl . '" class="responsive-img" alt="' . $attachment_title . '"></div>';
                } ?>
            </div>
        </div>
    </section>
    <script>
        //<![CDATA[

        //]]>
    </script>
<?php
    return ob_get_clean();
}
add_shortcode('dvu_slider_partner', 'dvu_slider_partner');
