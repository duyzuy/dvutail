<?php
function create_sc_slogan_shortcode($atts, $content = null)
{

    $attr = shortcode_atts(array(
        'class' => '',
        'text_1'    =>  "text_1",
        'text_2'    =>  "text_2",
        'text_3'    =>  "text_3",
        'text_4'    =>  "text_4",
        'text_5'    =>  "text_4",
    ), $atts);


    ob_start();
?>
    <div class="slogan">
        <div class="container mx-auto px-3 md:px-6 lg:px-8 py-12">
            <div class="flex items-center justify-center flex-wrap font-[Monsterat]">
                <div class="bg-gradient-to-tr from-[#CC2027] via-[#EB7121] to-[#F48820] text-transparent bg-clip-text font-bold text-4xl md:text-5xl md:leading-[3.5rem]">
                    <span class="block"><?php echo $attr['text_1'] ?></span>
                    <span class="block"><?php echo $attr['text_2'] ?></span>
                </div>
                <span class="bg-gradient-to-t from-[#3B5AA7] via-[#3D85C5] to-[#3FA9DF] inline-block text-transparent bg-clip-text text-8xl md:text-[9rem] leading-[8rem] font-bold mx-4"><?php echo $attr['text_3'] ?></span>
                <div>
                    <span class="bg-gradient-to-tr from-[#3B5AA7] via-[#3B65AF] to-[#3FA9DF] relative block px-2 text-white font-bold text-3xl py-1">
                        <?php echo $attr['text_4'] ?>
                        <span class="absolute border-solid border-t-[0px] border-r-[50px] border-b-[50px] border-l-[0px] border-b-transparent border-white inline-block right-0 bottom-0"></span>
                    </span>
                    <span class="bg-gradient-to-tr from-[#CC2027] via-[#EB7121] to-[#F48820] block text-transparent bg-clip-text uppercase font-bold text-4xl leading-snug md:text-5xl md:leading-[4rem]"> <?php echo $attr['text_5'] ?></span>
                </div>
            </div>
        </div>
    </div>
<?php
    $output = ob_get_clean();
    return $output;
}
add_shortcode('dvu_slogan', 'create_sc_slogan_shortcode');
