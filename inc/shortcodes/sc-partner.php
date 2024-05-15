<?php
function dvu_shortcode_slider_parter($atts, $content)
{
    $attr = shortcode_atts(array(
        'title'     => 'title',
        'sub_title'     => 'sub_title',
    ), $atts);

    ob_start();


?>
    <div class="partner__section py-12">
        <div class="container mx-auto px-3 md:px-6 lg:px-8">
            <div class="partner__section-head text-center uppercase mb-6 lg:mb-12">
                <span class="block mb-2 text-xl lg:text-2xl font-bold"><?php echo $attr['sub_title'] ?></span>
                <h3 class="bg-gradient-to-tr from-[#CC2027] via-[#EB7121] to-[#F48820] inline-block text-transparent bg-clip-text text-2xl lg:text-4xl uppercase font-bold"><?php echo $attr['title']; ?></h3>
            </div>
            <div class="partner__section-body">
                <div class="partner__section-slider -mx-3">
                    <?php echo do_shortcode($content) ?>
                </div>
            </div>
        </div>
    </div>
<?php
    return ob_get_clean();
}
add_shortcode('dvu_slider_partner', 'dvu_shortcode_slider_parter');


function dvu_shortcode_slide($atts)
{
    $attr = shortcode_atts(array(
        'thumbnail'     => "thumbnail",
        'label'     =>  'label'
    ), $atts);
    ob_start();


?>
    <div class="sldier__item mx-3">
        <div class="border">
            <div class="sldier__item-thumbnail italic h-28 flex items-center justify-center">
                <img src="<?php echo $attr['thumbnail'] ?>" class="block h-14 w-[80%] object-contain" alt="<?php echo $attr['label'] ?>" />
            </div>
            <div class="sldier__item-content bg-gray-100 px-4 h-14 flex items-center justify-center border-t">
                <p class="text-xs text-center"><?php echo $attr['label'] ?></p>
            </div>
        </div>
    </div>
<?php
    return ob_get_clean();
}
add_shortcode('dvu_slide_partner', 'dvu_shortcode_slide');
