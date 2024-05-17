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
$taxonomy = 'type_store';


// $old_date = explode('/', $date_start);

// $new_data = $old_date[0] . '-' . $old_date[1] . '-' . $old_date[2];

$day = date('d', strtotime($date_start));
$month = date('F', strtotime($date_start));
$year = date('Y', strtotime($date_start));


// $new_date = date('Y-m-d', strtotime($new_data));

?>

<article class="w-full border-b pb-6 mb-6">
    <div class="inner flex flex-wrap lg:items-center">
        <div class="activity-date lg:w-60 w-40 lg:pr-8 pr-3 font-[Monsterat]">
            <span class="inline-flex items-center bg-gradient-to-tr from-[#CC2027] via-[#EB7121] to-[#F48820] text-transparent bg-clip-text uppercase font-bold">
                <span class="lg:text-6xl text-4xl">
                    <?php echo $day; ?>
                </span>
                <span class="ml-2 leading-none">
                    <span class="lg:text-lg text-sm block">
                        <?php echo $month; ?>
                    </span>
                    <span class="lg:text-3xl text-lg block">
                        <?php echo $year; ?>
                    </span>
                </span>
            </span>
        </div>
        <div class="flex flex-1 flex-wrap gap-y-6">
            <div class="activity-thumbnail w-full lg:w-1/4 pr-8">
                <a href="<?php the_permalink(); ?>" alt="<?php the_title() ?>">
                    <?php
                    if (has_post_thumbnail()) :
                        the_post_thumbnail('large', ['class' => 'w-full', 'alt' => esc_attr(get_the_title($post->ID))]);
                    endif;
                    ?>
                </a>
            </div>
            <!--end-box-image-->
            <div class="activity-content w-full lg:w-3/4">
                <div class="header-box">
                    <h3 class="font-[Monsterat]">
                        <a href="<?php the_permalink(); ?>" class="bg-gradient-to-tr from-[#CC2027] via-[#EB7121] to-[#F48820] text-transparent bg-clip-text uppercase font-bold text-xl lg:text-2xl mb-3" alt="<?php the_title() ?>"><?php the_title(); ?> </a>
                    </h3>
                    <div class="mb-3 line-clamp-3">
                        <?php the_excerpt() ?>
                    </div>
                    <div class="flex">
                        <span class="icon mr-3 mt-[2px]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 25" fill="none">
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
                        <p class="pl"><?php echo "{$location_type}, {$timming}"; ?></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</article>