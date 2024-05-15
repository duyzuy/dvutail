<?php
function dvu_shortcode_report($atts)
{
    $attr = shortcode_atts(array(
        'class' =>  ""
    ), $atts);
    ob_start();
?>
    <div class="dvu__report-container <?php echo $attr['class'] ?>">

        <div class="dvu__report-tab flex items-center mb-12">
            <div class="dvu__report-tab-item active" data-tab="file">
                <div class="dvu__report-tab-item-inner">
                    <span class="label font-[500] lg:text-lg"><?php esc_html_e("PDF report", "dvutheme") ?></span>
                </div>
            </div>
            <div class="dvu__report-tab-item" data-tab="gallery">
                <div class="dvu__report-tab-item-inner">
                    <span class="label font-[500] lg:text-lg"><?php esc_html_e("Image event", "dvutheme") ?></span>
                </div>
            </div>
        </div>

        <div class="dvu__report-panels">
            <div class="dvu__report-panel panel-file active" data-panel="file">
                <?php echo do_shortcode('[dvu_report_file]')  ?>
            </div>
            <div class="dvu__report-panel panel-gallery" data-panel="gallery">
                <?php echo do_shortcode('[dvu_report_gallery]')  ?>
            </div>
        </div>
    </div>
<?php
    return ob_get_clean();
}
add_shortcode('dvu_report', 'dvu_shortcode_report');
