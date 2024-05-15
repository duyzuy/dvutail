<?php
function create_sc_intro_content_section($atts, $content = null)
{

    $attr = shortcode_atts(array(
        'class' => '',
        'color' =>  'orange',
        'title' =>  'title',
        'highlight_text'    =>  'highlight_text'
    ), $atts);

    ob_start();

    $theme_class = "hero bg-gradient-to-t py-6 py-12 lg:py-24 px-3 lg:px-0 relative overflow-hidden from-[#FF9C3D] via-[#F65E1D] to-[#F38620]";
    $text_color = 'text-[#F65E1D]';

    if ($attr['color'] == 'blue') {
        $theme_class = 'hero bg-gradient-to-t py-12 lg:py-24 px-3 lg:px-0 relative overflow-hidden from-[#3B5AA7] via-[#3D85C5] to-[#3FA9DF]';
        $text_color = 'text-[#3B5AA7]';
    }

?>
    <div class="<?php echo $theme_class ?>">
        <div class="pattern absolute w-[18vw] h-[18vw] -top-[6vw] -right-[6vw] bg-no-repeat bg-cover bg-[url(<?php echo get_template_directory_uri() . '/assets/images/pattern-tr.svg' ?>)]"></div>
        <div class="pattern absolute w-[18vw] h-[18vw] -bottom-[6vw] -left-[6vw] bg-no-repeat bg-cover bg-[url(<?php echo get_template_directory_uri() . '/assets/images/pattern-bl.svg' ?>)]"></div>
        <div class="container mx-auto px-3 md:px-6 lg:px-8 text-white mb-3 text-center max-w-5xl">
            <p class="font-bold text-xl lg:text-4xl mb-3 lg:mb-6"><?php echo $attr['title'] ?></p>
            <div class="mb-6 relative flex justify-center">
                <span class=" border-solid border-t-[56px] border-r-[56px] border-b-[0px] border-l-[0px] border-t-transparent border-white inline-block -left-[56px] bottom-0 top-0"></span>
                <div class="bg-white h-[56px] flex items-center justify-center flex-1">
                    <p class="uppercase text-lg leading-tight lg:text-2xl lg:leading-normal font-bold <?php echo $text_color; ?>"><?php echo $attr['highlight_text'] ?></p>
                </div>
                <span class=" border-solid border-t-[56px] border-l-[56px] border-b-[0px] border-r-[0px] border-t-transparent border-white inline-block -right-[56px] bottom-0 top-0"></span>
            </div>
            <div class="text-[13px] lg:text-[14px]">
                <?php echo do_shortcode($content) ?>
            </div>
        </div>
    </div>
<?php
    return ob_get_clean();
}
add_shortcode('dvu_content_section', 'create_sc_intro_content_section');
