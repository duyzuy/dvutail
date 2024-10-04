<?php



function neo_ajax_enqueue_script()
{
    wp_enqueue_script('dvu-ajax', get_template_directory_uri() . '/assets/js/dvu.ajax.js', array('jquery'), '1.1.0', true);
    wp_localize_script('dvu-ajax', 'dvutail_ajax_object', array(
        'ajaxurl'   => admin_url('admin-ajax.php'),
        'wpnonce'  => wp_create_nonce('ajax_custom_nonce_validate'),
        'loading'   => 'loading...',
    ));
}
add_action('wp_enqueue_scripts', 'neo_ajax_enqueue_script');

add_action('wp_ajax_nopriv_dvutail_send_contact_action', 'dvutail_send_contact_action');
add_action('wp_ajax_dvutail_send_contact_action', 'dvutail_send_contact_action');
function dvutail_send_contact_action()
{

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $mess = $_POST['mess'];
    $nonce = $_POST['nonce'];

    if (!wp_verify_nonce($nonce, 'ajax_custom_nonce_validate'))
        die('Xin lỗi, không gửi được mail');

    $data = array(
        'name'  => $name,
        'email' => $email,
    );

    $to = 'vutruongduy2109@gmail.com';

    $subject = 'LIÊN HỆ -' . $name;

    $headers[] = 'From: ' . get_bloginfo('name') . '<' . $to . '>';
    $headers[] = 'Reply-to: ' . $name . '<' . $email . '>';
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $infor = 'Họ tên: ' . $name . '<br/> Email: ' . $email . '<br/> Phone: (+84)' . $phone . '<br/> Nội dung khác: ' . $mess . '';
    wp_mail($to, $subject, $infor, $headers);
    echo wp_json_encode($data);
    die();
}


add_action('wp_ajax_nopriv_dvu_filter_activity_post', 'dvu_filter_activity_post');
add_action('wp_ajax_dvu_filter_activity_post', 'dvu_filter_activity_post');
function dvu_filter_activity_post()
{

    $onsite = $_POST['onsite'];
    $offsite = $_POST['offsite'];
    $beforeEv = $_POST['beforeEv'];
    $inEv = $_POST['inEv'];
    $afterEv = $_POST['afterEv'];
    $startDate = $_POST['startDate'];
    $term_id = $_POST['term_id'];
    $taxonomy = $_POST['taxonomy'];
    $endDate = $_POST['endDate'];

    $args = array(
        'post_type' => 'activity',
        'posts_per_page' => -1,
        'orderby' => 'date', // newest
        'order' => 'DESC', //to the top
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,   // taxonomy name
                'field' => 'term_id',           // term_id, slug or name
                'terms' => $term_id,                  // term id, term slug or term name
            )
        )

    );

    if ($onsite == "true" && $offsite == "false" || $onsite == "false" && $offsite == "true") {
        $args['meta_query'][] =
            array(
                'key' => '_location_type',
                'value' => $onsite == "true" ? 'onsite' : "offsite",
                'compare' => 'LIKE',
                'type'  =>  "CHAR"
            );
    }

    if ($inEv == "true" || $beforeEv == "true" || $afterEv == "true") {

        $values = [];

        if ($inEv == 'true') {
            $values[] = "in_event";
        }
        if ($beforeEv == 'true') {
            $values[] = "before_event";
        }
        if ($afterEv == 'true') {
            $values[] = "after_event";
        }

        $args['meta_query'][] = array(
            'key' => '_timming',
            'value' => $values,
            'compare' => 'IN',
            'type'  =>  "CHAR"
        );
    };
    // array(
    //     'key' => 'event_end_date_time',
    //     'value' => date("Y-m-d H:i"),
    //     'compare' => '>=',
    //     'type' => 'DATE'
    //     )
    //   )

    if ($startDate !== "") {

        $args['meta_query'][] = array(
            'key' => '_date_start',
            'value' => $startDate,
            'compare' => '>=',
            'type'  =>  "CHAR"
        );
    };


    if ($endDate !== "") {

        $args['meta_query'][] = array(
            'key' => '_date_start',
            'value' => $endDate,
            'compare' => '<=',
            'type'  =>  "CHAR"
        );
    };





    $query = new WP_Query($args);
    $data = array();

    if ($query->have_posts()) :

        while ($query->have_posts()) : $query->the_post();
            $activity_meta = get_post_meta(get_the_ID(), '_dvu_activity_data', true);
            $date_start = isset($activity_meta['date_start']) ? $activity_meta['date_start'] : "";


            $day = date('d', strtotime($date_start));
            $month = date('F', strtotime($date_start));
            $year = date('Y', strtotime($date_start));


            $data[] = array(
                "id" => get_the_ID(),
                "title" => get_the_title(),
                "excerpt" => get_the_excerpt(),
                "href"  =>  get_the_permalink(),
                "thumbnail" =>  get_the_post_thumbnail_url(get_the_ID(), 'large'),
                "locationType"  =>   $activity_meta['location_type'],
                "timming"  =>   $activity_meta['timming'],
                "day"   =>  $day,
                "month" =>   $month,
                "year"  =>  $year,
                "raw"   =>  $activity_meta
            );


        endwhile;

        wp_reset_postdata();
    endif;



    $nonce = $_POST['nonce'];

    if (!wp_verify_nonce($nonce, 'ajax_custom_nonce_validate'))
        die('Xin lỗi, không gửi được mail');


    echo wp_json_encode($data);
    die();
}
