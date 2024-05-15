<?php
function dvu_shortcode_report_file($atts)
{
    $attr = shortcode_atts(array(
        'class' =>  ""
    ), $atts);
    ob_start();
    $args = array(
        'post_type'     =>  'report_file',
        'post_status'   =>  'publish',
        'order'         =>  'DESC',
        'orderby'       =>  'date',
        'posts_per_page'      =>  4,
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1
    );

    $query = new WP_Query($args);

?>
    <div class="dvu__report-file-container <?php echo $attr['class'] ?>">
        <?php if ($query->have_posts()) : ?>
            <div class="article__report-tab-panel w-full">
                <div class="article__report-tabs flex items-center border-b border-b-[#3B5AA7]">
                    <?php
                    $count_head = 0;
                    while ($query->have_posts()) : $query->the_post(); ?>
                        <?php
                        global $post;
                        $file_report = get_post_meta($post->ID, '_dvu_report_file_data', true);
                        ?>
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
                        $file_report = get_post_meta($post->ID, '_dvu_report_file_data', true);
                        ?>
                        <div class="article__report-panel article__report-item-panel-<?php echo $post->ID; ?> <?php echo $count_body == 0 ? 'active' : '' ?>" data-article-panel="<?php echo $post->ID; ?>">
                            <?php foreach ($file_report as $key => $value) { ?>
                                <div class="article__report-item-detail">
                                    <div class="item w-full px-6 border-b py-6 mb-6 bg-white">
                                        <div class="inner flex items-center">
                                            <div class="icon mr-6"><svg class="w-9 h-10 md:w-11 md:h-12" viewBox="0 0 54 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M53.0836 15.1547L38.8169 0.330094C38.6138 0.119219 38.3335 0 38.0409 0H16.7773C14.3976 0 12.4615 1.93528 12.4615 4.31397V19.3846H3.84422C2.06381 19.3846 0.615356 20.8327 0.615356 22.6126V38.7721C0.615356 40.552 2.06381 42 3.84422 42H12.4615V51.6936C12.4615 54.0681 14.3976 56 16.7773 56H49.0689C51.4486 56 53.3846 54.0692 53.3846 51.696V15.9015C53.3846 15.623 53.2767 15.3554 53.0836 15.1547ZM38.3077 2.9073L50.0195 15.0769H38.3077V2.9073ZM3.84422 39.8462C3.2514 39.8462 2.76928 39.3644 2.76928 38.7721V22.6126C2.76928 22.0204 3.25151 21.5385 3.84422 21.5385H32.9251C33.5179 21.5385 34 22.0204 34 22.6126V38.7721C34 39.3644 33.5178 39.8462 32.9251 39.8462H3.84422ZM51.2307 51.696C51.2307 52.8816 50.2609 53.8462 49.0688 53.8462H16.7773C15.5852 53.8462 14.6154 52.8806 14.6154 51.6937V42H32.9251C34.7055 42 36.1539 40.552 36.1539 38.7721V22.6126C36.1539 20.8327 34.7055 19.3846 32.9251 19.3846H14.6154V4.31397C14.6154 3.12277 15.5852 2.15381 16.7773 2.15381H36.1538V16.1538C36.1538 16.7486 36.636 17.2307 37.2307 17.2307H51.2307V51.696Z" fill="#F26D21"></path>
                                                    <path d="M5.996 35V26.6H9.632C10.384 26.6 11.032 26.724 11.576 26.972C12.12 27.212 12.54 27.56 12.836 28.016C13.132 28.472 13.28 29.016 13.28 29.648C13.28 30.272 13.132 30.812 12.836 31.268C12.54 31.724 12.12 32.076 11.576 32.324C11.032 32.564 10.384 32.684 9.632 32.684H7.076L7.94 31.808V35H5.996ZM7.94 32.024L7.076 31.1H9.524C10.124 31.1 10.572 30.972 10.868 30.716C11.164 30.46 11.312 30.104 11.312 29.648C11.312 29.184 11.164 28.824 10.868 28.568C10.572 28.312 10.124 28.184 9.524 28.184H7.076L7.94 27.26V32.024ZM14.4279 35V26.6H18.2439C19.1559 26.6 19.9599 26.776 20.6559 27.128C21.3519 27.472 21.8959 27.956 22.2879 28.58C22.6799 29.204 22.8759 29.944 22.8759 30.8C22.8759 31.648 22.6799 32.388 22.2879 33.02C21.8959 33.644 21.3519 34.132 20.6559 34.484C19.9599 34.828 19.1559 35 18.2439 35H14.4279ZM16.3719 33.404H18.1479C18.7079 33.404 19.1919 33.3 19.5999 33.092C20.0159 32.876 20.3359 32.572 20.5599 32.18C20.7919 31.788 20.9079 31.328 20.9079 30.8C20.9079 30.264 20.7919 29.804 20.5599 29.42C20.3359 29.028 20.0159 28.728 19.5999 28.52C19.1919 28.304 18.7079 28.196 18.1479 28.196H16.3719V33.404ZM25.9019 30.38H29.9339V31.94H25.9019V30.38ZM26.0459 35H24.1019V26.6H30.4499V28.16H26.0459V35Z" fill="#F26D21"></path>
                                                </svg>
                                            </div>
                                            <div class="flex flex-wrap items-center flex-1">
                                                <div class="w-full md:w-3/4">
                                                    <p class="text-[#F26D21] font-[500] lg:text-lg"><?php echo $value['name'] ?></p>
                                                    <p class="text-gray-500 text-sm lg:text-lg"><?php echo $value['size'] ?></p>
                                                </div>
                                                <div class="w-full md:w-1/4">
                                                    <a href="<?php echo $value['url'] ?>" download="" class="icondown flex items-center lg:justify-end">
                                                        <span class="inline-block mr-2 text-gray-600"><?php esc_html_e("Download file PDF") ?></span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 32 32" fill="none">
                                                            <g clip-path="url(#clip0_12_4010)">
                                                                <path d="M16 4V23" stroke="#F26D21" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M7 14L16 23L25 14" stroke="#F26D21" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M5 27H27" stroke="#F26D21" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_12_4010">
                                                                    <rect width="32" height="32" fill="white"></rect>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <?php } ?>
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
        <?php else : ?>
            <div class="py-6">No report found</div>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>



    </div>
<?php
    return ob_get_clean();
}
add_shortcode('dvu_report_file', 'dvu_shortcode_report_file');
