<?php

require_once(ABSPATH . 'wp-admin/includes/screen.php');

$keys_fields = array('pyre_slide_link, pyre_banner_desktop_url', 'pyre_banner_mobile_url', 'pyre_slide_showhide');
function neo_create_metabox_slide()
{

    add_meta_box(
        'dv_portfolio_mb',
        esc_html__('Slide option', 'dvtheme'),
        'neo_slide_mtb_callback',
        'slider',
        'advanced',
        'high'
    );
}
add_action('add_meta_boxes', 'neo_create_metabox_slide');

function neo_slide_mtb_callback($post)
{

    wp_nonce_field('dv_save_slider_data', 'dv_slide_nonce');

    $slider_options = get_post_meta($post->ID, '_slide_options', true) ? get_post_meta($post->ID, '_slide_options', true) :  array(
        "link" => "",
    );

?>
    <div class="pyre_wrap_content">


        <div class="pyre_row">
            <div class="pyre_metabox_field pyre_col">
                <label for="pyre_gallery_project_recent">Đường dẫn banner</label>
                <div class="pyre_field">
                    <input type="text" class="form-control" name="pyre_slide_link" id="pyre_slide_link" value="<?php echo esc_attr($slider_options['link']) ?>">
                </div>
            </div>

        </div>
    </div>
<?php
}

function dv_save_slider_data($post_id)
{

    $nonce_name   = isset($_POST['dv_slide_nonce']) ? $_POST['dv_slide_nonce'] : '';
    $nonce_action = 'dv_save_slider_data';

    // Check if nonce is set.
    if (!isset($nonce_name)) {
        return;
    }

    // Check if nonce is valid.
    if (!wp_verify_nonce($nonce_name, $nonce_action)) {
        return;
    }

    // Check if user has permissions to save data.
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    //Check if not an autosave.
    if (wp_is_post_autosave($post_id)) {
        return;
    }

    //Check if not a revision.
    if (wp_is_post_revision($post_id)) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (array_key_exists('pyre_slide_link', $_POST)) {
        update_post_meta($post_id, '_slide_link', sanitize_text_field($_POST['pyre_slide_link']));
    }

    $data = array(
        "link" => sanitize_text_field($_POST['pyre_slide_link']),
    );
    update_post_meta($post_id, '_slide_options', $data);
    // foreach($keys_fields as $key => $value){
    //     if(array_key_exists($key, $_POST)){
    //         update_post_meta( $post_id, '_slide_options', $data);
    //     }
    // }


}

add_action('save_post', 'dv_save_slider_data');
