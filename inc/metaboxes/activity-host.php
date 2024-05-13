<?php

/*
 * Thêm custom field vào custom taxonomy
 * */
class Devvn_Custom_Field_For_Taxonomy
{
    private $taxonomy = 'activity_host';
    function __construct()
    {
        //Thêm css và script vào footer của trang chuyên mục
        add_action('admin_footer', array($this, 'add_script_to_admin'));
        //Thêm field vào form thêm mới taxonomy
        add_action(sprintf('%s_add_form_fields', $this->taxonomy), array($this, 'add_form_fields_meta_fields'));
        //Thêm field vào form sửa taxonomy
        add_action(sprintf('%s_edit_form_fields', $this->taxonomy), array($this, 'edit_form_fields_meta_fields'));
        //lưu meta field khi sửa taxonomy
        add_action(sprintf('edited_%s', $this->taxonomy), array($this, 'save_taxonomy_custom_meta'), 10);
        //lưu meta field khi thêm mới taxonomy
        add_action(sprintf('created_%s', $this->taxonomy), array($this, 'save_taxonomy_custom_meta'), 10);
        //Hiển thị custom field ra ngoài
        add_filter(sprintf('manage_edit-%s_columns', $this->taxonomy), array($this, 'add_columns'));
        add_filter(sprintf('manage_%s_custom_column', $this->taxonomy), array($this, 'add_column_content'), 10, 3);
    }
    function add_script_to_admin()
    {
        $current_screen = get_current_screen();
        if (
            (isset($current_screen->base) && !in_array($current_screen->base, array('edit-tags', 'term')))
            || (isset($current_screen->id) && $current_screen->id != 'edit-' . $this->taxonomy)
        ) {
            return false;
        }
        wp_enqueue_media();
?>
        <style>
            .devvn_upload_img {
                width: 100%;
                max-width: 800px;
            }

            .devvn_upload_img .flex-col.flex-grow {
                margin-right: 10px;
            }

            .devvn_upload_img.flex-row {
                align-items: flex-start;
                display: flex;
                flex-flow: row nowrap;
                justify-content: space-between;
                width: 100%;
                height: 100%;
            }

            .devvn_upload_img .flex-col {
                max-height: 100%;
            }

            .devvn_upload_img .flex-left {
                margin-right: auto;
            }

            .devvn_upload_img .flex-right {
                margin-left: auto;
            }

            .devvn_upload_img .flex-grow {
                -ms-flex-negative: 1;
                -ms-flex-preferred-size: auto !important;
                flex: 1;
            }

            .devvn_upload_img .devvn_upload_value {
                margin-bottom: 10px;
            }

            .devvn_upload_img .devvn_upload_value~img {
                width: 100%;
                max-width: 150px;
                height: auto;
            }

            td.thumb.column-thumb img {
                width: 80px;
                height: auto;
            }

            .column-thumb {
                text-align: center;
                width: 80px;
            }
        </style>
        <script>
            jQuery('body').on('click', '.devvn_upload-btn', function(e) {
                e.preventDefault();
                let thisUpload = jQuery(this).parents('.devvn_upload_img');
                let meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
                    title: 'Upload Image',
                    button: {
                        text: 'Upload Image'
                    },
                    library: {
                        type: 'image'
                    },
                    multiple: false
                });
                meta_image_frame.on('select', function() {
                    var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
                    if (media_attachment.url) {
                        thisUpload.find('.devvn_upload_value').val(media_attachment.url);
                        thisUpload.find('img').attr('src', media_attachment.url);
                    }
                });
                meta_image_frame.open();
            });
        </script>
    <?php
    }
    function add_form_fields_meta_fields()
    {
    ?>

        <div class="form-field term-meta-wrap">
            <label for="term_meta[host_thumbnail]">
                <?php esc_html_e('Thumbnail', 'dvutheme'); ?>
            </label>
            <div class="devvn_upload_img flex-row">
                <div class="flex-col flex-grow">
                    <img src="" width="60" height="60" class="hidden" />
                    <input type="text" class="devvn_upload_value" name="term_meta[host_thumbnail]" id="term_meta[host_thumbnail]" placeholder="<?php _e('Đường dẫn hình ảnh', 'devvn') ?>" value="" />
                </div>
                <div class="flex-col"><input type="button" class="devvn_upload-btn button" value="<?php _e('Chọn Ảnh', 'devvn') ?>" /></div>
            </div>
        </div>
    <?php
    }
    function edit_form_fields_meta_fields($term)
    {
        $t_id = $term->term_id;
        $term_meta = get_term_meta($t_id, '_activity_host_term_meta', true);
        // $custom_input = isset($term_meta['custom_input']) ? esc_attr($term_meta['custom_input']) : '';
        $custom_img = isset($term_meta['host_thumbnail']) ? esc_attr($term_meta['host_thumbnail']) : '';
        // $content = esc_textarea(isset($term_meta['custom_textarea'])) ? esc_textarea($term_meta['custom_textarea']) : '';
    ?>
        <tr class="form-field">
            <th scope="row">
                <label for="term_meta[host_thumbnail]"><?php _e('Thumbnail', 'dvutheme'); ?></label>
            </th>
            <td>
                <div class="devvn_upload_img flex-row">
                    <div class="flex-col flex-grow">
                        <input type="text" class="devvn_upload_value" name="term_meta[host_thumbnail]" id="term_meta[custom_img]" placeholder="<?php _e('Đường dẫn hình ảnh', 'devvn') ?>" value="<?php echo esc_attr(esc_url($custom_img)); ?>" />
                        <img src="<?php echo esc_attr(esc_url($custom_img)); ?>" alt="">
                    </div>
                    <div class="flex-col"><input type="button" class="devvn_upload-btn button" value="<?php _e('Chọn Ảnh', 'dvutheme') ?>" /></div>
                </div>
            </td>
        </tr>
<?php
    }
    function save_taxonomy_custom_meta($term_id)
    {
        if (isset($_POST['term_meta'])) {
            $term_meta = array();
            $cat_keys = array_keys($_POST['term_meta']);
            foreach ($cat_keys as $key) {
                if (isset($_POST['term_meta'][$key])) {
                    $term_meta[$key] = $_POST['term_meta'][$key];
                }
            }
            update_term_meta($term_id, '_activity_host_term_meta', $term_meta);
        }
    }
    function add_columns($columns)
    {
        $columns['thumb'] = 'Hình ảnh';
        return $columns;
    }
    function add_column_content($content, $column_name, $term_id)
    {
        $term_meta = get_term_meta($term_id, '_activity_host_term_meta', true);
        $custom_img = isset($term_meta['host_thumbnail']) ? esc_attr($term_meta['host_thumbnail']) : '';
        switch ($column_name) {
            case 'thumb':
                $content = '<img src="' . $custom_img . '" alt="">';
                break;
        }
        return $content;
    }
}
new Devvn_Custom_Field_For_Taxonomy();
