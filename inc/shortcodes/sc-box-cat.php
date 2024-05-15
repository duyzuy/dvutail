<?php
function create_sc_box_cat($atts, $content)
{
    $attr = shortcode_atts(array(
        'class' =>  "",
        'color' =>  "orange",
        "title" =>  "title",
        "thumbnail" =>  "thumbnail",
        "excerpt" =>  "excerpt",
        "href" =>  "href",
    ), $atts);
    ob_start();

    $class = 'md:w-1/2 lg:w-1/3 px-3';

    if ($attr['class']) {
        $class .= " " . $attr['class'];
    }
    $theme_class =  $attr['color'] === 'orange' ? "from-[#CC2027] via-[#D23125] via-[#E15723] via-[#EB7121] to-[#F48820]" : "from-[#3B5AA7] via-[#3B65AF] via-[#3D85C5] via-[#3D85C5] to-[#3FA9DF]";
    $stroke_color =  $attr['color'] === 'orange' ? "#F26D21" : "#3D85C5";
?>

    <div class="<?php echo $class ?>">
        <div class="article bg-gradient-to-tr p-[2px] relative h-full <?php echo  $theme_class; ?>">
            <div class="inner">
                <div class="article__head py-4 text-center">
                    <h3 class="text-white text-2xl font-bold"><?php echo $attr['title'] ?></h3>
                </div>
                <div class="article__body bg-white p-6 text-center">
                    <div class="article__thumbnail mb-3">
                        <img src="<?php echo $attr['thumbnail']; ?>" alt="<?php echo $attr['title'] ?>" />
                    </div>
                    <div class="article__content text-[14px] mb-3 text-left">
                        <p class="line-clamp-3"><?php echo $attr['excerpt'] ?></p>
                    </div>
                    <a href="<?php echo $attr['href'] ?>" class="bg-gradient-to-r inline-flex text-transparent bg-clip-text text-[16px] font-[500] <?php echo  $theme_class; ?>">
                        <?php esc_html_e("Xem thêm", 'dvutheme') ?>
                        <span class="ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                                <path d="M13.1143 22.1989C18.3686 22.1989 22.6281 17.9394 22.6281 12.6851C22.6281 7.43083 18.3686 3.17139 13.1143 3.17139C7.86003 3.17139 3.60059 7.43083 3.60059 12.6851C3.60059 17.9394 7.86003 22.1989 13.1143 22.1989Z" stroke="<?php echo $stroke_color ?>" stroke-width="1.58562" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M11.5293 8.7207L15.4934 12.6848L11.5293 16.6488" stroke="<?php echo $stroke_color ?>" stroke-width="1.58562" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php
    return ob_get_clean();
}
add_shortcode('dvu_box_cat', 'create_sc_box_cat');
