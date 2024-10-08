<?php
function create_sc_home_video_intro($atts, $content = null)
{

    $attr = shortcode_atts(array(
        'class' => '',
        'video_url' =>  'video_url',
        "thumbnail_url" =>  "",
        "video_type"  =>  'video_type' //video/mp4, video/webm
    ), $atts);
    ob_start();
    $class = 'dvu__home-video-container w-full pt-[46%] relative';

    if ($attr['class']) {
        $class .= ' ' . $attr['class'];
    }
?>
    <div class="<?php echo $class; ?>">
        <?php if (wp_is_mobile()) : ?>
            <img src="<?php echo $attr['thumbnail_url'] ?>" alt="ITEXPO INTRO" class="absolute left-0 top-0 w-full h-full object-cover" />
        <?php else : ?>
            <video autoplay="1" id="myVideo" muted loop class="absolute top-0 right-0 w-full h-full object-cover">
                <source src="<?php echo $attr['video_url']; ?>" type="<?php echo $attr['video_type'] ?>" muted repeat>
                Your browser does not support the video tag.
            </video>
        <?php endif; ?>

    </div>
<?php
    return ob_get_clean();
}
add_shortcode('dvu_video_intro', 'create_sc_home_video_intro');
