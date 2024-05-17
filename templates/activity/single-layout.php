<?php


global $post;

$categories =  get_the_category($post->ID);


$data = get_post_meta($post->ID, '_dvu_activity_data', true);
$date_start = isset($data['date_start']) ? $data['date_start'] : "";
$time_start = isset($data['time_start']) ? $data['time_start'] : "";
$time_end = isset($data['time_end']) ? $data['time_end'] : "";
$location_type = isset($data['location_type']) ? $data['location_type'] : "";
$address = isset($data['address']) ? $data['address'] : "";
$timming = isset($data['timming']) ? $data['timming'] : "";
$speaker_ids = isset($data['speaker']) ? $data['speaker'] : array();
$agenda_list  = isset($data['activity_agenda']) ? $data['activity_agenda'] : array();
$registration_link  = isset($data['link']) ? $data['link'] : array();

$location_type_label = "";
if ($location_type == 'onsite') {
    $location_type_label = esc_html__("Onsite", 'dvutheme');
}
if ($location_type == 'offsite') {
    $location_type_label = esc_html__("Offsite", 'dvutheme');
}

$timming_text = '';

if ($timming == 'before_event') {
    $timming_text = esc_html__("Before event", 'dvutheme');
}
if ($timming == 'in_event') {
    $timming_text = esc_html__("In event", 'dvutheme');
}

if ($timming == 'after_event') {
    $timming_text = esc_html__("After event", 'dvutheme');
}


?>
<div class="activity__layout">
    <div class="activity__layout-head">
        <?php echo do_shortcode('[dvu_slider slider_id="12"]') ?>
    </div>
    <div class="activity__layout-content mx-auto container px-3 md:px-6 lg:px-8 py-12 xl:max-w-7xl">
        <div class="activity__layout-head mb-12">
            <div class="flex items-center flex-wrap gap-y-6">
                <div class="title w-full lg:w-4/6 lg:pr-12 font-[Monsterat]">
                    <h1 class="bg-gradient-to-tr from-[#CC2027] via-[#EB7121] to-[#F48820] inline-block text-transparent bg-clip-text text-2xl lg:text-4xl font-bold"><?php the_title() ?></h1>
                </div>
                <div class="w-full lg:w-2/6 text-center">
                    <a href="<?php echo $registration_link; ?>" target="_blank" rel="nofollow" class="text-center text-white bg-gradient-to-r from-[#E15723] via-[#EB7121] to-[#F48820] px-8 py-3 rounded-full font-[500] inline-block text-lg lg:text-xl uppercase"><?php esc_html_e("Đăng ký ngay", 'dvutheme') ?> </a>
                </div>
            </div>
        </div>
        <div class="activity__layout-body mb-12">
            <div class="flex flex-wrap -mx-6">
                <div class="w-full lg:w-1/3 px-6">
                    <div class="inner">
                        <div class="flex mb-6">
                            <span class="icon mr-3 mt-[2px]"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <g clip-path="url(#clip0_1_4782)">
                                        <path d="M19.5 3.75H4.5C4.08579 3.75 3.75 4.08579 3.75 4.5V19.5C3.75 19.9142 4.08579 20.25 4.5 20.25H19.5C19.9142 20.25 20.25 19.9142 20.25 19.5V4.5C20.25 4.08579 19.9142 3.75 19.5 3.75Z" stroke="url(#paint0_linear_1_4782)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M16.5 2.25V5.25" stroke="url(#paint1_linear_1_4782)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7.5 2.25V5.25" stroke="url(#paint2_linear_1_4782)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M3.75 8.25H20.25" stroke="url(#paint3_linear_1_4782)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M12 13.5C12.6213 13.5 13.125 12.9963 13.125 12.375C13.125 11.7537 12.6213 11.25 12 11.25C11.3787 11.25 10.875 11.7537 10.875 12.375C10.875 12.9963 11.3787 13.5 12 13.5Z" fill="url(#paint4_linear_1_4782)" />
                                        <path d="M16.125 13.5C16.7463 13.5 17.25 12.9963 17.25 12.375C17.25 11.7537 16.7463 11.25 16.125 11.25C15.5037 11.25 15 11.7537 15 12.375C15 12.9963 15.5037 13.5 16.125 13.5Z" fill="url(#paint5_linear_1_4782)" />
                                        <path d="M7.875 17.25C8.49632 17.25 9 16.7463 9 16.125C9 15.5037 8.49632 15 7.875 15C7.25368 15 6.75 15.5037 6.75 16.125C6.75 16.7463 7.25368 17.25 7.875 17.25Z" fill="url(#paint6_linear_1_4782)" />
                                        <path d="M12 17.25C12.6213 17.25 13.125 16.7463 13.125 16.125C13.125 15.5037 12.6213 15 12 15C11.3787 15 10.875 15.5037 10.875 16.125C10.875 16.7463 11.3787 17.25 12 17.25Z" fill="url(#paint7_linear_1_4782)" />
                                        <path d="M16.125 17.25C16.7463 17.25 17.25 16.7463 17.25 16.125C17.25 15.5037 16.7463 15 16.125 15C15.5037 15 15 15.5037 15 16.125C15 16.7463 15.5037 17.25 16.125 17.25Z" fill="url(#paint8_linear_1_4782)" />
                                    </g>
                                    <defs>
                                        <linearGradient id="paint0_linear_1_4782" x1="-2.53981" y1="16.8267" x2="-2.53981" y2="3.9006" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#3B5AA7" />
                                            <stop offset="0.22" stop-color="#3B65AF" />
                                            <stop offset="0.62" stop-color="#3D85C5" />
                                            <stop offset="1" stop-color="#3FA9DF" />
                                        </linearGradient>
                                        <linearGradient id="paint1_linear_1_4782" x1="16.1188" y1="4.62758" x2="16.1188" y2="2.27738" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#3B5AA7" />
                                            <stop offset="0.22" stop-color="#3B65AF" />
                                            <stop offset="0.62" stop-color="#3D85C5" />
                                            <stop offset="1" stop-color="#3FA9DF" />
                                        </linearGradient>
                                        <linearGradient id="paint2_linear_1_4782" x1="7.1188" y1="4.62758" x2="7.1188" y2="2.27738" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#3B5AA7" />
                                            <stop offset="0.22" stop-color="#3B65AF" />
                                            <stop offset="0.62" stop-color="#3D85C5" />
                                            <stop offset="1" stop-color="#3FA9DF" />
                                        </linearGradient>
                                        <linearGradient id="paint3_linear_1_4782" x1="-2.53981" y1="9.04253" x2="-2.53981" y2="8.25913" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#3B5AA7" />
                                            <stop offset="0.22" stop-color="#3B65AF" />
                                            <stop offset="0.62" stop-color="#3D85C5" />
                                            <stop offset="1" stop-color="#3FA9DF" />
                                        </linearGradient>
                                        <linearGradient id="paint4_linear_1_4782" x1="10.0173" y1="13.0332" x2="10.0173" y2="11.2705" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#3B5AA7" />
                                            <stop offset="0.22" stop-color="#3B65AF" />
                                            <stop offset="0.62" stop-color="#3D85C5" />
                                            <stop offset="1" stop-color="#3FA9DF" />
                                        </linearGradient>
                                        <linearGradient id="paint5_linear_1_4782" x1="14.1423" y1="13.0332" x2="14.1423" y2="11.2705" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#3B5AA7" />
                                            <stop offset="0.22" stop-color="#3B65AF" />
                                            <stop offset="0.62" stop-color="#3D85C5" />
                                            <stop offset="1" stop-color="#3FA9DF" />
                                        </linearGradient>
                                        <linearGradient id="paint6_linear_1_4782" x1="5.8923" y1="16.7832" x2="5.8923" y2="15.0205" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#3B5AA7" />
                                            <stop offset="0.22" stop-color="#3B65AF" />
                                            <stop offset="0.62" stop-color="#3D85C5" />
                                            <stop offset="1" stop-color="#3FA9DF" />
                                        </linearGradient>
                                        <linearGradient id="paint7_linear_1_4782" x1="10.0173" y1="16.7832" x2="10.0173" y2="15.0205" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#3B5AA7" />
                                            <stop offset="0.22" stop-color="#3B65AF" />
                                            <stop offset="0.62" stop-color="#3D85C5" />
                                            <stop offset="1" stop-color="#3FA9DF" />
                                        </linearGradient>
                                        <linearGradient id="paint8_linear_1_4782" x1="14.1423" y1="16.7832" x2="14.1423" y2="15.0205" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#3B5AA7" />
                                            <stop offset="0.22" stop-color="#3B65AF" />
                                            <stop offset="0.62" stop-color="#3D85C5" />
                                            <stop offset="1" stop-color="#3FA9DF" />
                                        </linearGradient>
                                        <clipPath id="clip0_1_4782">
                                            <rect width="24" height="24" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg></span>

                            <div>
                                <p class="mb-2"><span class="text-transparent bg-clip-text text-lg bg-gradient-to-tr from-[#3B5AA7] via-[#3B65AF] to-[#3FA9DF] font-[500] font-[Monsterat]"><?php esc_html_e("Date", 'dvutheme') ?></span></p>
                                <div>
                                    <p><?php echo "{$date_start} {$time_start} - {$time_end}" ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="flex mb-6">
                            <span class="icon mr-3 mt-[2px]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <g clip-path="url(#clip0_1_4798)">
                                        <path d="M12 12.75C13.6569 12.75 15 11.4069 15 9.75C15 8.09315 13.6569 6.75 12 6.75C10.3431 6.75 9 8.09315 9 9.75C9 11.4069 10.3431 12.75 12 12.75Z" stroke="url(#paint0_linear_1_4798)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M19.5 9.75C19.5 16.5 12 21.75 12 21.75C12 21.75 4.5 16.5 4.5 9.75C4.5 7.76088 5.29018 5.85322 6.6967 4.4467C8.10322 3.04018 10.0109 2.25 12 2.25C13.9891 2.25 15.8968 3.04018 17.3033 4.4467C18.7098 5.85322 19.5 7.76088 19.5 9.75Z" stroke="url(#paint1_linear_1_4798)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <linearGradient id="paint0_linear_1_4798" x1="6.7128" y1="11.5052" x2="6.7128" y2="6.80476" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#3B5AA7" />
                                            <stop offset="0.22" stop-color="#3B65AF" />
                                            <stop offset="0.62" stop-color="#3D85C5" />
                                            <stop offset="1" stop-color="#3FA9DF" />
                                        </linearGradient>
                                        <linearGradient id="paint1_linear_1_4798" x1="-1.21801" y1="17.7043" x2="-1.21801" y2="2.42798" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#3B5AA7" />
                                            <stop offset="0.22" stop-color="#3B65AF" />
                                            <stop offset="0.62" stop-color="#3D85C5" />
                                            <stop offset="1" stop-color="#3FA9DF" />
                                        </linearGradient>
                                        <clipPath id="clip0_1_4798">
                                            <rect width="24" height="24" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </span>
                            <div>
                                <p class="mb-2"><span class="text-transparent bg-clip-text text-lg bg-gradient-to-tr from-[#3B5AA7] via-[#3B65AF] to-[#3FA9DF] font-[500] font-[Monsterat]"><?php esc_html_e("Address", 'dvutheme') ?></span></p>
                                <div>
                                    <p><?php echo $address; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="flex mb-6">
                            <span class="icon mr-3 mt-[2px]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 26" fill="none">
                                    <path d="M6.84375 10.1269L10.7895 6.18107" stroke="url(#paint0_linear_1_4807)" stroke-width="1.77778" stroke-miterlimit="10" />
                                    <mask id="mask0_1_4807" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="26">
                                        <path d="M0 -8.96454e-05H24V25.9999H0V-8.96454e-05Z" fill="white" />
                                    </mask>
                                    <g mask="url(#mask0_1_4807)">
                                        <path d="M10.7883 6.17906C10.8604 5.02448 10.4603 3.84595 9.58731 2.95781C7.96811 1.31048 5.29356 1.27894 3.63771 2.88942C1.94758 4.53324 1.93342 7.23609 3.595 8.89777C4.4861 9.78881 5.67653 10.1976 6.84255 10.1249L17.2582 19.2461L19.9096 16.5947L10.7883 6.17906Z" stroke="url(#paint1_linear_1_4807)" stroke-width="1.77778" stroke-miterlimit="10" />
                                        <path d="M18.5839 17.9208L20.9456 20.2825C22.4267 21.7635 21.3777 24.2958 19.2832 24.2958C18.8982 24.2958 18.519 24.2012 18.1791 24.0204L14.4157 22.0184C11.1582 20.2855 7.25223 20.2858 3.99498 22.0192L2.35938 22.8896" stroke="url(#paint2_linear_1_4807)" stroke-width="1.77778" stroke-miterlimit="10" />
                                    </g>
                                    <defs>
                                        <linearGradient id="paint0_linear_1_4807" x1="5.33961" y1="6.99971" x2="5.33961" y2="10.0908" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#3B5AA7" />
                                            <stop offset="0.22" stop-color="#3B65AF" />
                                            <stop offset="0.62" stop-color="#3D85C5" />
                                            <stop offset="1" stop-color="#3FA9DF" />
                                        </linearGradient>
                                        <linearGradient id="paint1_linear_1_4807" x1="-4.33079" y1="5.34166" x2="-4.33079" y2="19.086" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#3B5AA7" />
                                            <stop offset="0.22" stop-color="#3B65AF" />
                                            <stop offset="0.62" stop-color="#3D85C5" />
                                            <stop offset="1" stop-color="#3FA9DF" />
                                        </linearGradient>
                                        <linearGradient id="paint2_linear_1_4807" x1="-4.99" y1="19.2434" x2="-4.99" y2="24.2376" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#3B5AA7" />
                                            <stop offset="0.22" stop-color="#3B65AF" />
                                            <stop offset="0.62" stop-color="#3D85C5" />
                                            <stop offset="1" stop-color="#3FA9DF" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </span>
                            <div>
                                <p class="mb-2"><span class="text-transparent bg-clip-text text-lg bg-gradient-to-tr from-[#3B5AA7] via-[#3B65AF] to-[#3FA9DF] font-[500] font-[Monsterat]"><?php esc_html_e("Host", 'dvutheme') ?></span></p>
                                <div class="mt-2"><?php activity_single_hosts() ?></div>
                            </div>

                        </div>
                        <div class="flex mb-6">
                            <span class="icon mr-3 mt-[2px]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                    <g clip-path="url(#clip0_1_4893)">
                                        <path d="M3.96938 13.2401C3.82899 13.0995 3.75009 12.909 3.75 12.7104V4.02069H12.4397C12.6383 4.02078 12.8288 4.09968 12.9694 4.24007L22.2806 13.5513C22.4212 13.692 22.5001 13.8826 22.5001 14.0815C22.5001 14.2803 22.4212 14.471 22.2806 14.6116L14.3438 22.5513C14.2031 22.6919 14.0124 22.7708 13.8136 22.7708C13.6148 22.7708 13.4241 22.6919 13.2834 22.5513L3.96938 13.2401Z" stroke="url(#paint0_linear_1_4893)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7.875 9.27069C8.49632 9.27069 9 8.76701 9 8.14569C9 7.52437 8.49632 7.02069 7.875 7.02069C7.25368 7.02069 6.75 7.52437 6.75 8.14569C6.75 8.76701 7.25368 9.27069 7.875 9.27069Z" fill="url(#paint1_linear_1_4893)" />
                                    </g>
                                    <defs>
                                        <linearGradient id="paint0_linear_1_4893" x1="-3.39756" y1="18.8807" x2="-3.39756" y2="4.19183" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#3B5AA7" />
                                            <stop offset="0.22" stop-color="#3B65AF" />
                                            <stop offset="0.62" stop-color="#3D85C5" />
                                            <stop offset="1" stop-color="#3FA9DF" />
                                        </linearGradient>
                                        <linearGradient id="paint1_linear_1_4893" x1="5.8923" y1="8.80388" x2="5.8923" y2="7.04123" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#3B5AA7" />
                                            <stop offset="0.22" stop-color="#3B65AF" />
                                            <stop offset="0.62" stop-color="#3D85C5" />
                                            <stop offset="1" stop-color="#3FA9DF" />
                                        </linearGradient>
                                        <clipPath id="clip0_1_4893">
                                            <rect width="24" height="24" fill="white" transform="translate(0 0.270691)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </span>
                            <div>
                                <p class="mb-2"><span class="text-transparent bg-clip-text text-lg bg-gradient-to-tr from-[#3B5AA7] via-[#3B65AF] to-[#3FA9DF] font-[500] font-[Monsterat]"><?php esc_html_e("Tag", 'dvutheme') ?></span></p>
                                <p class="pl"><?php echo "{$location_type_label}, {$timming_text}"; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-2/3 px-6 dvu__thecontent">
                    <?php the_content() ?>
                </div>
            </div>
            <div class="sepakers font-[Monsterat]">
                <div class="sepakers__head mb-6">
                    <h3 class="bg-gradient-to-tr from-[#CC2027] via-[#EB7121] to-[#F48820] inline-block text-transparent bg-clip-text text-2xl lg:text-4xl font-bold uppercase font-[Monsterat]"><?php esc_html_e("Speakers", "dvutheme") ?></h3>
                </div>
                <?php dvu_get_speakers($speaker_ids) ?>
            </div>
        </div>
        <div class="agenda pt-6 font-[Monsterat]">
            <div class="sepakers__head mb-6">
                <h3 class="bg-gradient-to-tr from-[#CC2027] via-[#EB7121] to-[#F48820] inline-block text-transparent bg-clip-text text-2xl lg:text-4xl font-bold uppercase font-[Monsterat]"><?php esc_html_e("Agenda", "dvutheme") ?></h3>
            </div>
            <?php
            $last = count($agenda_list) - 1;
            $item_count = 0;
            foreach ($agenda_list as $key => $value) {

            ?>
                <div class="agenda__timeline flex <?php echo $item_count !== $last ? "border-b" : "" ?>" data-item="<?php echo $item_count ?>">
                    <div class="agenda__timeline-time w-28 lg:w-44 py-6">
                        <span class="text-lg lg:text-xl flex item-center text-transparent bg-clip-text bg-gradient-to-tr from-[#3B5AA7] via-[#3B65AF] to-[#3FA9DF] font-[500]">
                            <?php echo "{$value['time_start']} - {$value['time_end']}" ?>
                        </span>
                    </div>
                    <?php if ($item_count == 0 || $item_count == $last) :  ?>
                        <div class="w-[2px] bg-gradient-to-t from-[#3B5AA7] via-[#3B65AF] to-[#3FA9DF] mx-6"></div>
                    <?php else : ?>
                        <div class="w-[2px] bg-gradient-to-t from-[#CC2027] via-[#EB7121] to-[#F48820] mx-6"></div>
                    <?php endif; ?>
                    <div class="agenda__timeline-content flex-1 flex flex-wrap py-6">
                        <div class="w-full lg:w-1/3 lg:pr-6">
                            <p class="font-[500] lg:text-lg"><?php echo $value['title'] ?></p>
                        </div>
                        <div class="w-full lg:w-2/3">
                            <p class="lg:text-lg text-gray-600"><?php esc_html_e("Speaker", 'dvutheme') ?></p>
                            <p class="lg:text-lg"><?php echo $value['speaker'] ?></p>
                        </div>
                    </div>
                </div>
            <?php $item_count++;
            } ?>
        </div>
    </div>
</div>