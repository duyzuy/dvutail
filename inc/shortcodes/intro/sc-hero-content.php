<?php
function create_sc_hero_content_intro($atts, $content = null)
{

    $attr = shortcode_atts(array(
        'class' => '',
        "bg_url"    =>  "",
        "logo_url"  =>  "",
        "title"     =>  "",
        "description"   =>  ""
    ), $atts);


    ob_start();
?>
    <div class="hero bg-[url(<?php echo get_template_directory_uri() . '/assets/images/bg-intro.png' ?>)] bg-cover bg-bottom">
        <div class="container mx-auto flex items-center justify-center py-32 lg:py-56 px-3 md:px-6 lg:px-8">
            <div class="hero-inner-content text-center max-w-4xl">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/logo.svg' ?>" alt="logo" class=" w-60 lg:w-80 italic mb-6 block mx-auto" />
                <div class="content text-white">
                    <?php echo do_shortcode($content); ?>
                </div>
            </div>
        </div>
    </div>
<?php
    $output = ob_get_clean();
    return $output;
}
add_shortcode('dvu_hero_content_intro', 'create_sc_hero_content_intro');
