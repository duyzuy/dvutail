<?php
function create_sc_cotloi_boxes($atts, $content = null)
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
    <div class="section__content py-12 lg:py-24">
        <div class="container mx-auto px-3 md:px-6 lg:px-8">
            <div class="section__content-head text-center uppercase mb-16 lg:mb-24 font-[Monsterat]">
                <span class="block mb-2 text-xl lg:text-2xl font-bold text-gray-800"><?php echo $attr['sub_title'] ?></span>
                <h3 class="bg-gradient-to-tr from-[#3B5AA7] via-[#3D85C5] to-[#3FA9DF] inline-block text-transparent bg-clip-text text-2xl lg:text-4xl uppercase font-bold"><?php echo $attr['title'] ?></h3>
            </div>
            <div class="section__content-body">
                <div class="flex flex-wrap -mx-3 gap-y-6 lg:mb-12">
                    <?php echo do_shortcode($content) ?>
                </div>
            </div>
        </div>
    </div>

<?php
    $output = ob_get_clean();
    return $output;
}
add_shortcode('dvu_cotloi_section', 'create_sc_cotloi_boxes');


function create_sc_cotloi_box($atts, $content = null)
{

    $attr = shortcode_atts(array(
        'class' => '',
        'number'   =>  'number',
        "content" =>  'content',
        'ml'    =>  0
    ), $atts);

    ob_start();

    $class = 'item w-full lg:w-[45%] px-3';

    if ($attr['class']) {
        $class .= ' ' . $attr['class'];
    }

    if ($attr['ml']) {
        $class .= ' lg:ml-[' . $attr['ml'] . '%]';
    }
?>
    <div class="<?php echo $class; ?>">
        <div class="box-inner flex">
            <div class="bg-gradient-to-tr from-[#3B5AA7] via-[#3D85C5] to-[#3FA9DF] w-40 h-36 flex items-center justify-center" style="clip-path: polygon(25% 0%, 75% 0%, 100% 50%, 75% 100%, 25% 100%, 0% 50%)">
                <span class="text-5xl lg:text-6xl font-bold text-white"><?php echo $attr['number'] ?></span>
            </div>
            <div class="bg-gradient-to-tr from-[#3B5AA7] via-[#3D85C5] to-[#3FA9DF] p-[2px] flex-1 -ml-20 pl-20 rounded-[16px]">
                <div class="bg-white h-full flex items-center -ml-20 pl-24 pr-4 py-4 rounded-[14px]">
                    <p class="text-[14px] md:text-[16px]"><?php echo $attr['content'] ?></p>
                </div>
            </div>
        </div>
    </div>
<?php

    return ob_get_clean();
}
add_shortcode('dvu_cotloi_box', 'create_sc_cotloi_box');
