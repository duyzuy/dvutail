<?php
function create_sc_hero_content($atts, $content = null)
{

    $attr = shortcode_atts(array(
        'class' => '',
        'color' =>  '',
        "title" =>  "title",
        "description"   =>  "description"
    ), $atts);


    ob_start();
?>
    <div class="hero bg-gradient-to-t py-12 lg:py-24 px-3 lg:px-0 relative overflow-hidden from-[#3B5AA7] via-[#3D85C5] to-[#3FA9DF] <?php echo $attr['class'] ?>">
        <div class="pattern absolute w-[18vw] h-[18vw] -top-[6vw] -right-[6vw] bg-no-repeat bg-cover bg-[url(<?php echo get_template_directory_uri() . "/assets/images/pattern-tr.svg" ?>)]"></div>
        <div class="pattern absolute w-[18vw] h-[18vw] -bottom-[6vw] -left-[6vw] bg-no-repeat bg-cover bg-[url(<?php echo get_template_directory_uri() . "/assets/images/pattern-bl.svg" ?>)]"></div>
        <div class="container mx-auto text-white mb-3 text-center max-w-5xl px-3 md:px-6 lg:px-8">
            <p class="font-bold text-xl lg:text-4xl mb-3 lg:mb-6 font-[Monsterat]"><?php echo $attr['title'] ?></p>
            <p class="text-[14px] lg:text-[16px] lg:px-14"><?php echo $attr['description'] ?></p>
        </div>
    </div>
<?php
    $output = ob_get_clean();
    return $output;
}
add_shortcode('dvu_hero_content', 'create_sc_hero_content');
