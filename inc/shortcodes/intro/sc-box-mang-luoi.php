<?php
function create_sc_box_mangluoi($atts, $content = null)
{

    $attr = shortcode_atts(array(
        'class' => '',
        'title' =>  'title',
        'sub_title' =>  'sub_title',
        'thumbnail_1'   =>  'thumbnail_1',
        "content_1" =>  'content_1'
    ), $atts);


    ob_start();
?>

    <div class="register-section py-12 relative bg-[url(<?php echo get_template_directory_uri(); ?>/assets/images/bg-global-connect.png)]">
        <div class=" bg-orange-600/80 absolute left-0 right-0 top-0 bottom-0 z-10"></div>
        <div class="container mx-auto relative z-20 px-3 lg:px-0">
            <div class="hero-content text-center max-w-2xl mx-auto text-white">
                <?php echo do_shortcode($content) ?>
            </div>
        </div>
    </div>
<?php
    $output = ob_get_clean();
    return $output;
}
add_shortcode('dvu_box_mangluoi', 'create_sc_box_mangluoi');
