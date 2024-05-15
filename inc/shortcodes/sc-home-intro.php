<?php
function create_sc_home_video_intro($atts, $content = null)
{

    $attr = shortcode_atts(array(
        'class' => '',
        'video_url' =>  'video_url',
    ), $atts);
    ob_start();
    $class = 'dvu__home-video-container w-full pt-[46%] relative';

    if ($attr['class']) {
        $class .= ' ' . $attr['class'];
    }
?>
    <div class="<?php echo $class; ?>">
        <video autoplay="1" id="myVideo" muted loop class=" absolute top-0 right-0 w-full h-full object-cover">
            <source src="<?php echo $attr['video_url']; ?>" type="video/mp4" muted repeat>
            Your browser does not support the video tag.
        </video>
    </div>
<?php
    return ob_get_clean();
}
add_shortcode('dvu_video_intro', 'create_sc_home_video_intro');
