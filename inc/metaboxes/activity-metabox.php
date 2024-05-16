<?php


//add metabox

function dvu_register_activity_metabox()
{
    add_meta_box(
        'dvu_activity-info',
        __('Activity information', 'dvutheme'),
        'dvu_callback_activity_fields',
        'activity'
    );
}
add_action('add_meta_boxes', 'dvu_register_activity_metabox');

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function dvu_callback_activity_fields($post)
{
    // Display code/markup goes here. Don't forget to include nonces!

    wp_nonce_field(basename(__FILE__), 'metabox-nonce_field-activity');

    // $alldata = get_post_meta($post->ID);
    // echo "<pre>";
    // print_r($alldata);
    // echo "</pre>";

    $data = get_post_meta($post->ID, '_dvu_activity_data', true);
    $date_start = isset($data['date_start']) ? $data['date_start'] : "";
    $time_start = isset($data['time_start']) ? $data['time_start'] : "";
    $time_end = isset($data['time_end']) ? $data['time_end'] : "";
    $location_type = isset($data['location_type']) ? $data['location_type'] : "";
    $address = isset($data['address']) ? $data['address'] : "";
    $registration_link = isset($data['link']) ? $data['link'] : "";
    $timming = isset($data['timming']) ? $data['timming'] : "";
    $speaker_ids  = isset($data['speaker']) ? $data['speaker'] : array();
    $agenda_list  = isset($data['activity_agenda']) ? $data['activity_agenda'] : array();

?>

    <div class="dvu-flex mb-3">
        <div class="w-2-12">
            <label for="activity_date_start" class="dvu-block mb-2"><?php esc_html_e("Start date", "dvutheme") ?></label>
        </div>
        <div class="flex-1">
            <input type="text" id="activity_date_start" name="dvu_activity[date_start]" class="w-full dvu_date-picker" value="<?php esc_html_e($date_start); ?>" placeholder="Start date" />
        </div>
    </div>
    <div class="dvu-flex mb-3">
        <div class="w-2-12">
            <label for="activity_time_start" class="dvu-block mb-2"><?php esc_html_e("Start time", "dvutheme") ?></label>
        </div>
        <div class="flex-1">
            <input type="text" id="activity_time_start" name="dvu_activity[time_start]" placeholder="Start time" class="w-full dvu_time-picker activity-start" value="<?php esc_html_e($time_start); ?>" />
        </div>
    </div>
    <div class="dvu-flex mb-3">
        <div class="w-2-12">
            <label for="activity_time_end" class="dvu-block mb-2"><?php esc_html_e("End time", "dvutheme") ?></label>
        </div>
        <div class="flex-1">
            <input type="text" id="activity_time_end" name="dvu_activity[time_end]" placeholder="End time" class="w-full dvu_time-picker activity-end" value="<?php esc_html_e($time_end); ?>" />
        </div>
    </div>
    <div class="dvu-flex mb-3">
        <div class="w-2-12">
            <label for="activity_location_type" class="mb-2"><?php esc_html_e("Location type", "dvutheme") ?></label>
        </div>
        <div class="flex-1">
            <select name="dvu_activity[location_type]" id="activity_location_type">
                <option value=""><?php esc_html_e("Select location type", "dvutheme") ?></option>
                <option value="onsite" <?php echo $location_type == 'onsite' ? 'selected' : "" ?>>Onsite</option>
                <option value="offsite" <?php echo $location_type == 'offsite' ? 'selected' : "" ?>>Offsite</option>
            </select>
        </div>
    </div>
    <div class="dvu-flex mb-3">
        <div class="w-2-12">
            <label for="activity_location_address" class="dvu-block mb-2"><?php esc_html_e("Address", "dvutheme") ?></label>
        </div>
        <div class="flex-1">
            <input type="text" id="activity_location_address" placeholder="Address" name="dvu_activity[address]" class="w-full" value="<?php esc_html_e($address) ?>" />
        </div>
    </div>
    <div class="dvu-flex mb-3">
        <div class="w-2-12">
            <label for="activity_registration_link" class="dvu-block mb-2"><?php esc_html_e("Registration link", "dvutheme") ?></label>
        </div>
        <div class="flex-1">
            <input type="text" id="activity_registration_link" placeholder="Registration link" name="dvu_activity[link]" class="w-full" value="<?php esc_html_e($registration_link) ?>" />
        </div>
    </div>

    <div class="dvu-flex mb-3">
        <div class="w-2-12">
            <label for="activity_timming" class="mb-2"><?php esc_html_e("Timming", "dvutheme") ?></label>
        </div>
        <div class="flex-1">
            <select name="dvu_activity[timming]">
                <option value=""><?php esc_html_e("Select timming", "dvutheme") ?></option>
                <option value="before_event" <?php echo $timming == 'before_event' ? 'selected' : "" ?>><?php esc_html_e("Before event", 'dvutheme') ?></option>
                <option value="in_event" <?php echo $timming == 'in_event' ? 'selected' : "" ?>><?php esc_html_e("In event", 'dvutheme') ?></option>
                <option value="after_event" <?php echo $timming == 'after_event' ? 'selected' : "" ?>><?php esc_html_e("After event", 'dvutheme') ?></option>
            </select>
        </div>
    </div>
    <div class="dvu-flex mb-3">
        <div class="w-2-12">
            <label for="activity_speaker" class="mb-2"><?php esc_html_e("Speakers", "dvutheme") ?></label>
        </div>
        <div class="flex-1">
            <select id="activity_speaker" name="dvu_activity[speaker][]" class="dvu__activity-speaker form-control" multiple="multiple">
                <?php
                $args = array(
                    'post_type' => 'speaker',
                    'posts_per_page' => -1
                );
                $query = new WP_Query($args);

                if ($query->have_posts()) :

                    while ($query->have_posts()) : $query->the_post();
                        $id = get_the_ID();
                ?>
                        <option value="<?php echo $id ?>" <?php echo in_array($id, $speaker_ids) ? 'selected' : '' ?>><?php the_title() ?></option>
                <?php
                    endwhile;

                    wp_reset_postdata();
                endif;

                ?>
            </select>
        </div>
    </div>
    <div class="activity__agenda">
        <div class="mb-3">
            <label for="activity_agenda" class="mb-2"><?php esc_html_e("Agenda", "dvutheme") ?></label>
        </div>
        <div class="dvu-flex">
            <div class="w-2-12">
            </div>
            <div class="w-10-12">
                <div class="activity__agenda-container" data-activity='<?php echo json_encode($agenda_list) ?>'></div>
            </div>
        </div>
        <div>
            <button class="button-primary js__btn-add-agenda" type="button">Add agenda</button>
        </div>
    </div>
<?php
}

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function dvu_save_activity_metabox($post_id)
{
    // Save logic goes here. Don't forget to include nonce checks!

    if (!isset($_POST["metabox-nonce_field-activity"]) || !wp_verify_nonce($_POST["metabox-nonce_field-activity"], basename(__FILE__)))
        return $post_id;

    if (!current_user_can("edit_post", $post_id))
        return $post_id;

    if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;


    $data = $_POST['dvu_activity'];

    if (isset($_POST['activity_date_start'])) {
        $date_start = sanitize_text_field($_POST['activity_date_start']);
    }
    if (isset($_POST['activity_time_start'])) {
        $time_start = sanitize_text_field($_POST['activity_time_start']);
    }
    if (isset($_POST['activity_time_end'])) {
        $time_end = sanitize_text_field($_POST['activity_time_end']);
    }
    if (isset($_POST['activity_location_type'])) {
        $location_type = sanitize_text_field($_POST['activity_location_type']);
    }
    if (isset($_POST['activity_location_address'])) {
        $location_address = sanitize_text_field($_POST['activity_location_address']);
    }
    if (isset($_POST['activity_timming'])) {
        $timming = sanitize_text_field($_POST['activity_timming']);
    }
    if (isset($_POST['activity_speaker'])) {
        $speaker = sanitize_text_field($_POST['activity_speaker']);
    }

    foreach ($data as $key => $value) {
        update_post_meta($post_id, "_{$key}", $value);
    }
    update_post_meta($post_id, '_dvu_activity_data', $data);
}
add_action('save_post', 'dvu_save_activity_metabox');
