<?php

function dv_register_post_type_gift()
{

    $labels = array(
        'name'                  => _x('Speaker', 'Post type general name', 'dvutheme'),
        'singular_name'         => _x('Speaker', 'Post type singular name', 'dvutheme'),
        'menu_name'             => _x('Speaker', 'Admin Menu text', 'dvutheme'),
        'name_admin_bar'        => _x('Speaker', 'Add New on Toolbar', 'dvutheme'),
        'add_new'               => __('Add new', 'dvutheme'),
        'add_new_item'          => __('Add new Speaker', 'dvutheme'),
        'new_item'              => __('Add new Speaker', 'dvutheme'),
        'edit_item'             => __('Edit', 'dvutheme'),
        'all_items'             => __('All Speakers', 'dvutheme'),
        'search_items'          => __('Search', 'dvutheme'),
        'parent_item_colon'     => __('Parent Speaker', 'dvutheme'),
        'not_found'             => __('No Speaker.', 'dvutheme'),
        'not_found_in_trash'    => __('No Speaker in trash.', 'dvutheme'),


        'featured_image'        => _x('Avatar', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'dvutheme'),
        'set_featured_image'    => _x('Set avatar image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'dvutheme'),
        'remove_featured_image' => _x('Remove avatar image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'dvutheme'),
        'use_featured_image'    => _x('Use as avatar image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'dvutheme'),
        'archives'              => _x('Speaker archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'dvutheme'),
        'insert_into_item'      => _x('Insert into speaker', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'dvutheme'),
        'uploaded_to_this_item' => _x('Uploaded to this speaker', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'dvutheme'),
        'filter_items_list'     => _x('Filter speaker list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'dvutheme'),
        'items_list_navigation' => _x('Speakers list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'dvutheme'),

    );


    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'speaker'),
        'capability_type'    => 'post',
        'menu_icon'          => 'dashicons-megaphone',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'thumbnail'),


    );

    register_post_type('speaker', $args);
}

add_action('init', 'dv_register_post_type_gift');


//add metabox

function dvu_speaker_box_fields()
{
    add_meta_box('meta-box-id', __('Speaker Information', 'dvutheme'), 'wc_callback_speaker_information', 'speaker');
}
add_action('add_meta_boxes', 'dvu_speaker_box_fields');

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function wc_callback_speaker_information($post)
{
    // Display code/markup goes here. Don't forget to include nonces!

    wp_nonce_field(basename(__FILE__), 'metabox-nonce_field-gift');


    $position = get_post_meta($post->ID, '_speaker_position', true);
    $desc = get_post_meta($post->ID, '_speaker_description', true);
?>
    <p style="margin-bottom: 10px">
        <label for="speaker_position">Position</label><br />
        <input type="text" id="speaker_position" name="speaker_position" class="w-full" value="<?php esc_html_e($position) ?>" />
    </p>
    <p style="margin-bottom: 10px">
        <label for="peaker_description">Decriptions</label>
        <?php
        wp_editor(htmlspecialchars_decode($desc), 'peaker_description', $settings = array('textarea_name' => 'peaker_description'))
        ?>

    </p>
<?php
}

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function wpdocs_save_meta_box($post_id)
{
    // Save logic goes here. Don't forget to include nonce checks!

    if (!isset($_POST["metabox-nonce_field-gift"]) || !wp_verify_nonce($_POST["metabox-nonce_field-gift"], basename(__FILE__)))
        return $post_id;

    if (!current_user_can("edit_post", $post_id))
        return $post_id;

    if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;


    $position = '';
    $desc = '';

    if (isset($_POST['speaker_position'])) {
        $position = $_POST['speaker_position'];
    }
    update_post_meta($post_id, '_speaker_position', $position);

    if (isset($_POST['peaker_description'])) {
        $desc = $_POST['peaker_description'];
    }

    update_post_meta($post_id, '_speaker_description', $desc);
}
add_action('save_post', 'wpdocs_save_meta_box');
