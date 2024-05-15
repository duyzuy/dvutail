<?php


//add metabox

function dvu_register_report_file_metabox()
{
    add_meta_box(
        'dvu_report-file-info',
        __('File report', 'dvutheme'),
        'dvu_callback_report_file_fields',
        'report_file'
    );
}
add_action('add_meta_boxes', 'dvu_register_report_file_metabox');

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function dvu_callback_report_file_fields($post)
{
    // Display code/markup goes here. Don't forget to include nonces!

    wp_nonce_field(basename(__FILE__), 'metabox-nonce_field-report-file');


    $file_report = get_post_meta($post->ID, '_dvu_report_file_data', true);


?>

    <div>
        <div class="dvu__container-form-file-fields" data-files='<?php echo json_encode($file_report, true) ?>'>

        </div>
        <button class="button button-primary js__btn-addmore-file" type="button">Add file</button>
    </div>

<?php
}

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function dvu_save_report_file_metabox($post_id)
{
    // Save logic goes here. Don't forget to include nonce checks!

    if (!isset($_POST["metabox-nonce_field-report-file"]) || !wp_verify_nonce($_POST["metabox-nonce_field-report-file"], basename(__FILE__)))
        return $post_id;

    if (!current_user_can("edit_post", $post_id))
        return $post_id;

    if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;


    $data = $_POST['dvu_report_file'];

    update_post_meta($post_id, '_dvu_report_file_data', $data);
}
add_action('save_post', 'dvu_save_report_file_metabox');
