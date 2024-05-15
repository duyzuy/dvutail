<?php
function create_sc_linhvuc_section($atts, $content = null)
{

    $attr = shortcode_atts(array(
        'class' => '',
        'title' =>  'title',
        'sub_title' =>  'sub_title',
    ), $atts);


    ob_start();
?>
    <div class="section__content">
        <div class="container mx-auto py-12 px-3 md:px-6 lg:px-8">
            <div class="section__content-head text-center uppercase mb-16 lg:mb-24">
                <span class="block mb-2 text-xl lg:text-2xl font-bold text-gray-800"><?php echo $attr['sub_title'] ?></span>
                <h3 class="bg-gradient-to-tr from-[#3B5AA7] via-[#3D85C5] to-[#3FA9DF] inline-block text-transparent bg-clip-text text-2xl lg:text-4xl uppercase font-bold"><?php echo $attr['title'] ?></h3>
            </div>
            <div class="section__content-body">
                <div class="flex flex-wrap gap-y-6 -mx-3">
                    <?php echo do_shortcode($content) ?>
                </div>
            </div>
        </div>
    </div>

<?php

    return  ob_get_clean();
}
add_shortcode('dvu_linhvuc_section', 'create_sc_linhvuc_section');


function create_sc_box_icon($atts, $content = null)
{

    $attr = shortcode_atts(array(
        'class' => '',
        'thumbnail'   =>  'thumbnail',
        "content" =>  'content',
        'ml'    =>  0
    ), $atts);

    ob_start();

?>

    <div class="item w-1/3 lg:w-1/6 px-3">
        <div class="inner-item text-center">
            <div class="item__thumb">
                <img src="<?php echo $attr['thumbnail'] ?>" class="block mx-auto italic" alt="<?php echo $attr['content'] ?>" />
            </div>
            <div class="text-[12px] md:text-[13px] lg:text-[14px]">
                <span><?php echo $attr['content'] ?></span>
            </div>
        </div>
    </div>
<?php

    return ob_get_clean();
}
add_shortcode('dvu_box_icon', 'create_sc_box_icon');
