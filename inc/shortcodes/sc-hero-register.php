<?php
function create_sc_hero_register($atts, $content)
{
    $attr = shortcode_atts(array(
        'class' =>  "",
        'color' =>  "orange",
        "title" =>  "title",
        "sub_title" =>  "sub_title",
        "excerpt" =>  "excerpt",
        "href" =>  "href",
    ), $atts);
    ob_start();

    $class = 'md:w-1/2 lg:w-1/3 px-3';

    if ($attr['class']) {
        $class .= " " . $attr['class'];
    }
    $theme_class =  $attr['color'] === 'orange' ? "from-[#CC2027] via-[#D23125] via-[#E15723] via-[#EB7121] to-[#F48820]" : "from-[#3B5AA7] via-[#3B65AF] via-[#3D85C5] via-[#3D85C5] to-[#3FA9DF]";
    $stroke_color =  $attr['color'] === 'orange' ? "#F26D21" : "#3D85C5";
?>

    <div class="register-section py-24 relative bg-[url(<?php echo get_template_directory_uri() . '/assets/images/bg-global-connect.png' ?>)]">
        <div class=" bg-orange-600/80 absolute left-0 right-0 top-0 bottom-0 z-10"></div>
        <div class="container mx-auto relative z-20 px-3 md:px-6 lg:px-8">
            <div class="hero-content text-center max-w-2xl mx-auto text-white">
                <div class="content mb-12">
                    <p class="text-3xl font-bold font-[Monsterat]"><?php echo $attr['sub_title'] ?></p>
                    <h3 class="lg:text-7xl text-3xl font-bold lg:mb-6 mb-3 font-[Monsterat]"><?php echo $attr['title'] ?></h3>
                    <p class="lg:text-[16px] text-[14px] mb-3"><?php echo $attr['excerpt'] ?></p>
                </div>
                <a href="<?php echo $attr['href'] ?>" class="lg:text-4xl text-xl italic inline-block font-bold lg:px-24 px-12 py-4 lg:py-6 lg:border-4 border-2 font-[Monsterat]"><?php esc_html_e("Register now!", "dvutheme") ?></a>
            </div>
        </div>
    </div>


<?php
    return ob_get_clean();
}
add_shortcode('dvu_hero_register', 'create_sc_hero_register');
