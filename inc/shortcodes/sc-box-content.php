<?php
function create_sc_box_contents($atts, $content)
{
    $attr = shortcode_atts(array(
        'class' =>  "",
        'title'
    ), $atts);
    ob_start();

    $class = 'section lg:py-24 py-12';

    if ($attr['class']) {
        $class .= " " . $attr['class'];
    }

?>
    <div class="<?php echo  $class; ?>">
        <div class="container mx-auto px-3 md:px-6 lg:px-8 xl:max-w-7xl">
            <div class="header text-center mb-8">
                <h1 class="text-3xl lg:text-5xl font-bold text-gray-600"><span class="bg-gradient-to-r bg-clip-text from-orange-600 to-orange-400 uppercase text-transparent">tại sao chọn</span> iTECH EXPO?</h1>
            </div>
            <div class="boxes flex justify-center flex-wrap gap-y-6 -mx-3">
                <?php echo do_shortcode($content) ?>
            </div>
        </div>
    </div>

<?php
    return ob_get_clean();
}
add_shortcode('dvu_content_boxes', 'create_sc_box_contents');

function create_sc_boxcontent_item($atts)
{
    $attr = shortcode_atts(array(
        'class' =>  "",
        'color'   =>  "orange",
        'item_number'   =>  "item_number",
        'item_content'   =>  "item_content"
    ), $atts);

    ob_start();

    $class = 'w-full sm:w-1/2 lg:w-1/3 px-3';
    if ($attr['class']) {
        $class .= " " . $attr['class'];
    }
    $theme_class = $attr['color'] === 'orange' ? 'from-[#CC2027] via-[#EB7121] to-[#F48820]' : 'from-[#3B5AA7] ia-[#3D85C5] to-[#3FA9DF]';
    $bg_color = $attr['color'] === 'orange' ? 'bg-[#FFF6EF]' : 'bg-[#F2FBFE]';
    $pattern = $attr['color'] === 'orange' ? 'bg-[url(' . get_template_directory_uri() . "/assets/images/pattern-br-orange.svg" . ')]' : 'bg-[url(' . get_template_directory_uri() . "/assets/images/pattern-br.svg" . ')]';

?>

    <div class="<?php echo $class; ?>">
        <div class="box-item bg-gradient-to-t p-[2px] relative h-full <?php echo $theme_class; ?>">
            <div class="inner px-6 py-6 overflow-hidden relative h-full <?php echo $bg_color; ?>">
                <span class="bg-gradient-to-t inline-block text-transparent bg-clip-text text-4xl lg:text-5xl font-bold mb-3 <?php echo $theme_class ?>"><?php echo $attr['item_number']; ?></span>
                <div class="description">
                    <p class="text-14px lg:text-[16px]"><?php echo $attr['item_content']; ?></p>
                </div>
                <div class="absolute w-[86px] h-[86px] -bottom-[30px] -right-[30px] z-10 bg-no-repeat bg-cover <?php echo $pattern; ?>"></div>
            </div>
        </div>
    </div>

<?php
    return ob_get_clean();
}
add_shortcode('dvu_content_box', 'create_sc_boxcontent_item');
