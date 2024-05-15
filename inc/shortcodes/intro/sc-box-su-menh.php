<?php
function create_sc_sumenh_boxes($atts, $content = null)
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
    <div class="content__section py-12">
        <div class="container mx-auto px-3 md:px-6 lg:px-8">
            <div class="content__section-head text-center uppercase mb-16 lg:mb-24">
                <span class="block mb-2 text-xl lg:text-2xl font-bold"><?php echo $attr['sub_title'] ?></span>
                <h3 class="bg-gradient-to-tr from-[#CC2027] via-[#EB7121] to-[#F48820] inline-block text-transparent bg-clip-text text-2xl lg:text-4xl uppercase font-bold"><?php echo $attr['title'] ?></h3>
            </div>
            <div class="content__section-body">
                <div class="flex flex-wrap justify-center -mx-3 gap-y-16">
                    <?php echo do_shortcode($content) ?>
                </div>
            </div>
        </div>
    </div>
<?php
    $output = ob_get_clean();
    return $output;
}
add_shortcode('dvu_su_menh_section', 'create_sc_sumenh_boxes');


function create_su_menh_box($atts, $content = null)
{

    $attr = shortcode_atts(array(
        'class' => '',
        'thumbnail'   =>  'thumbnail_1',
        "content" =>  'content'
    ), $atts);


    ob_start();
?>
    <div class="md:w-1/2 lg:w-1/3 px-3">
        <div class="bg-gradient-to-tr p-[2px] relative h-full from-[#CC2027] via-[#D23125] to-[#F48820] rounded-[16px]">
            <div class="inner bg-[#FFF6EF] px-6 pt-1 pb-8 rounded-[14px] h-full">
                <div class="thumb -mt-[50px] mb-6 flex items-center justify-center">
                    <img src="<?php echo $attr['thumbnail'] ?>" class="w-20 lg:w-24" />
                </div>
                <p class="text-[16px] lg:text-lg text-center"><?php echo do_shortcode($content) ?></p>
            </div>
        </div>
    </div>
<?php

    return ob_get_clean();
}
add_shortcode('dvu_su_menh_box', 'create_su_menh_box');
