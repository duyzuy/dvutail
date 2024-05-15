<?php
function create_sc_counter_list($atts, $content)
{
    $attr = shortcode_atts(array(
        'class' =>  ""
    ), $atts);
    ob_start();

    $class = 'section bg-[#F6F6F6] py-12';

    if ($attr['class']) {
        $class .= $attr['class'];
    }

?>

    <div class="<?php echo $class; ?>">
        <div class="container mx-auto px-3 md:px-6 lg:px-8">
            <div class="flex flex-wrap justify-between gap-y-6 -mx-3">
                <?php echo do_shortcode($content); ?>
            </div>
        </div>
    </div>

<?php
    return ob_get_clean();
}
add_shortcode('dvu_counters', 'create_sc_counter_list');

function create_sc_counter_item($atts)
{
    $attr = shortcode_atts(array(
        'class' =>  "",
        'counter'   =>  "counter",
        'sub_content'   =>  "sub_content"
    ), $atts);

    ob_start();

    $class = 'lg:w-1/6 w-1/2 px-3';
    if ($attr['class']) {
        $class .= " " . $attr['class'];
    }

?>
    <div class="<?php echo $class; ?>">
        <span class="counter font-bold text-center">
            <div class="block">
                <span class="bg-gradient-to-t from-[#CC2027] via-[#EB7121] to-[#F48820] inline-block text-transparent bg-clip-text text-3xl lg:text-4xl xl:text-5xl">
                    <?php echo $attr['counter'] ?>
                </span>
            </div>
            <div class="block">
                <span class="bg-gradient-to-t from-[#3B5AA7] via-[#3D85C5] to-[#3FA9DF] inline-block text-transparent bg-clip-text text-[16px] lg:text-lg xl:text-xl">
                    <?php echo $attr['sub_content'] ?>
                </span>
            </div>
        </span>
    </div>
<?php
    return ob_get_clean();
}
add_shortcode('dvu_counter', 'create_sc_counter_item');




// [
//     'counter' 	=> 	"30+",
//     "content"	=>	'Countries',
//     "color"		=>	'blue'
// ],
// [
//     'counter' 	=> 	"300+",
//     "content"	=>	'Exhibitors',
//     "color"		=>	'blue'
// ],
// [
//     'counter' 	=> 	"50.000+",
//     "content"	=>	'Visitors',
//     "color"		=>	'blue'
// ],
// [
//     'counter' 	=> 	"10+",
//     "content"	=>	'Forum Sessions',
//     "color"		=>	'orange'
// ],
// [
//     'counter' 	=> 	"300+",
//     "content"	=>	'Experts & Speakers',
//     "color"		=>	'orange'
// ],
// [
//     'counter' 	=> 	"1.000+",
//     "content"	=>	'Networkings',
//     "color"		=>	'orange'
// ]
