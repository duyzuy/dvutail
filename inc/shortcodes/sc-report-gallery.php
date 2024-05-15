<?php
function dvu_shortcode_report_gallery($atts)
{
    $attr = shortcode_atts(array(
        'slider_id'     => 92,
        'class' =>  ""
    ), $atts);
    ob_start();
    $args = array(
        'post_type'     =>  'report_gallery',
        'post_status'   =>  'publish',
        'order'         =>  'DESC',
        'orderby'       =>  'date',
        'posts_per_page'      =>  4,
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1
    );

    $query = new WP_Query($args);

?>
    <div class="dvu__report-gallery-container <?php echo $attr['class'] ?>">

        <?php if ($query->have_posts()) : ?>
            <div class="article__report-tab-panel w-full">
                <div class="article__report-tabs flex items-center border-b border-b-[#3B5AA7]">
                    <?php
                    $count_head = 0;
                    while ($query->have_posts()) : $query->the_post(); ?>
                        <?php global $post; ?>
                        <div class="article__report-tab min-w-[25%] py-2 lg:py-3 text-center <?php echo $count_head == 0 ? 'active' : '' ?>" data-article-tab="<?php echo $post->ID; ?>">
                            <div class="inner">
                                <span class="font-[500]"><?php echo get_the_title() ?></span>
                            </div>
                        </div>
                    <?php $count_head++;
                    endwhile; ?>
                </div>
                <div class="article__report-panels">
                    <?php
                    $count_body = 0;
                    while ($query->have_posts()) : $query->the_post(); ?>
                        <?php
                        global $post;
                        $galleries = get_post_meta($post->ID, '_dvu_report_gallery_data', true);
                        ?>
                        <div class="article__report-panel article__report-item-panel-<?php echo $post->ID; ?> <?php echo $count_body == 0 ? 'active' : '' ?>" data-article-panel="<?php echo $post->ID; ?>">
                            <div class="galleries flex flex-wrap -mx-3 gap-y-6 pt-8">
                                <?php foreach ($galleries as $key => $image) { ?>
                                    <div class="article__report-item-detail w-1/2 md:w-1/3 lg:w-1/4 px-3">
                                        <div class="item bg-white relative w-full pt-[52.25%]">
                                            <img src="<?php echo $image['originalUrl'] ?>" loading="lazy" alt="<?php echo $image['name'] ?>" class="w-full h-full object-cover absolute left-0 top-0" />
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php $count_body++;
                    endwhile; ?>
                </div>
            </div>
            <div class="paginations mb-12">
                <?php
                $prev_arrow = '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 40 41" fill="none"><g clip-path="url(#clip0_1 _15483)"><path d="M20 1.75C9.64466 1.75 1.25 10.1447 1.25 20.5C1.25 30.8553 9.64466 39.25 20 39.25C30.3553 39.25 38.75 30.8553 38.75 20.5C38.75 10.1447 30.3553 1.75 20 1.75Z" stroke="url(#paint0_linear_12_15483)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M27.8125 20.5L12.1875 20.5" stroke="url(#paint1_linear_12_15483)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M18.4375 26.75L12.1875 20.5L18.4375 14.25" stroke="url(#paint2_linear_12_15483)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
    </g><defs><linearGradient id="paint0_linear_12_15483" x1="54.75" y1="29.6248" x2="-10.9999" y2="29.6248" gradientUnits="userSpaceOnUse"><stop stop-color="#3B5AA7"></stop><stop offset="0.22" stop-color="#3B65AF"></stop><stop offset="0.62" stop-color="#3D85C5"></stop><stop offset="1" stop-color="#3FA9DF"></stop></linearGradient>
    <linearGradient id="paint1_linear_12_15483" x1="34.4792" y1="20.2433" x2="7.08337" y2="20.2433" gradientUnits="userSpaceOnUse"><stop stop-color="#3B5AA7"></stop><stop offset="0.22" stop-color="#3B65AF"></stop>
    <stop offset="0.62" stop-color="#3D85C5"></stop><stop offset="1" stop-color="#3FA9DF"></stop></linearGradient><linearGradient id="paint2_linear_12_15483" x1="21.1042" y1="23.5416" x2="10.1458" y2="23.5416" gradientUnits="userSpaceOnUse">
    <stop stop-color="#3B5AA7"></stop><stop offset="0.22" stop-color="#3B65AF"></stop><stop offset="0.62" stop-color="#3D85C5"></stop><stop offset="1" stop-color="#3FA9DF"></stop></linearGradient><clipPath id="clip0_12_15483"><rect width="40" height="40" fill="white" transform="translate(40 40.5) rotate(-180)"></rect></clipPath></defs></svg>';
                $next_arrow = '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 40 41" fill="none"><g clip-path="url(#clip0_12_15528)"><path d="M20 39.25C30.3553 39.25 38.75 30.8553 38.75 20.5C38.75 10.1447 30.3553 1.75 20 1.75C9.64466 1.75 1.25 10.1447 1.25 20.5C1.25 30.8553 9.64466 39.25 20 39.25Z" stroke="url(#paint0_linear_12_15528)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
    <path d="M12.1875 20.5H27.8125" stroke="url(#paint1_linear_12_15528)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M21.5625 14.25L27.8125 20.5L21.5625 26.75" stroke="url(#paint2_linear_12_15528)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
    </g><defs><linearGradient id="paint0_linear_12_15528" x1="-14.75" y1="11.3752" x2="50.9999" y2="11.3752" gradientUnits="userSpaceOnUse"><stop stop-color="#3B5AA7"></stop><stop offset="0.22" stop-color="#3B65AF"></stop>
    <stop offset="0.62" stop-color="#3D85C5"></stop><stop offset="1" stop-color="#3FA9DF"></stop></linearGradient><linearGradient id="paint1_linear_12_15528" x1="5.52085" y1="20.7567" x2="32.9166" y2="20.7567" gradientUnits="userSpaceOnUse">
    <stop stop-color="#3B5AA7"></stop><stop offset="0.22" stop-color="#3B65AF"></stop><stop offset="0.62" stop-color="#3D85C5"></stop><stop offset="1" stop-color="#3FA9DF"></stop></linearGradient><linearGradient id="paint2_linear_12_15528" x1="18.8958" y1="17.4584" x2="29.8542" y2="17.4584" gradientUnits="userSpaceOnUse">
    <stop stop-color="#3B5AA7"></stop><stop offset="0.22" stop-color="#3B65AF"></stop><stop offset="0.62" stop-color="#3D85C5"></stop><stop offset="1" stop-color="#3FA9DF"></stop></linearGradient><clipPath id="clip0_12_15528"><rect width="40" height="40" fill="white" transform="translate(0 0.5)"></rect></clipPath></defs></svg>';

                echo paginate_links(array(
                    'base' => str_replace(99999, '%#%', esc_url(get_pagenum_link(99999))),
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $query->max_num_pages,
                    'type'  =>  'list',
                    'before_page_number' => '',
                    'after_page_number' => '',
                    'mid_size' => 5,
                    'aria_current' => 'current',
                    'prev_text' => $prev_arrow,
                    'next_text' => $next_arrow
                )); ?>
            </div>
        <?php wp_reset_postdata();
        endif; ?>
    </div>
<?php
    return ob_get_clean();
}
add_shortcode('dvu_report_gallery', 'dvu_shortcode_report_gallery');
