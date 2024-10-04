<?php

class DvuTail_product_brand_metaboxes
{

  private $taxonomy_name = "product_brand";

  public function __construct()
  {

    if (!is_admin()) {
      return;
    }

    add_action("{$this->taxonomy_name}_edit_form_fields", array($this, 'wc_edit_field_product_brand'), 10, 2);
    add_action("{$this->taxonomy_name}_add_form_fields", array($this, 'wc_product_brand_create_fields'), 10, 2);
    add_action("edited_{$this->taxonomy_name}", array($this, 'dvutail_save_product_brand_fields'), 10, 2);
    add_action("create_{$this->taxonomy_name}", array($this, 'dvutail_save_product_brand_fields'), 10, 2);
    add_action('admin_footer', array($this, 'dvutail_add_script_to_admin'));
  }
  public function wc_edit_field_product_brand($term, $taxonomy)
  {

    $t_id = $term->term_id;
    $term_image = get_term_meta($t_id, '_brand_logo', true);

?>
    <tr class="form-field">
      <th>
        <label for="product_brand_image"><?php _e('Logo', 'dvutemplate'); ?></label>
      </th>
      <td class="pyre_field">
        <div class="product-brand-logo__preview pyre_thumbnail">
          <?php
          if ($term_image) {
            echo wp_get_attachment_image($term_image, 'large', '', array("class" => "img-responsive"));
          } else {
            echo '<span>No image</span>';
          }
          ?>
        </div>
        <a href="#" class="button btn-upload-banner">Thay hình ảnh</a>
        <a href="#" class="delete btn-remove-banner">Xoá hình ảnh</a>
        <input type="hidden" name="product_brand_image" id="product_brand_image" value="<?php echo esc_attr($term_image) ? esc_attr($term_image) : ''; ?>">
      </td>
    </tr>
  <?php
  }
  function wc_product_brand_create_fields($taxonomy)
  {

  ?>
    <div class="form-field pyre_field product_brand-logo">
      <label for="product_brand_image"><?php _e('Logo', 'dvutemplate'); ?></label>
      <div class="product-brand-logo__preview pyre_thumbnail">
        <span>No image</span>
      </div>
      <a href="#" class="button btn-upload-banner">Chọn logo</a>
      <input type="hidden" name="product_brand_image" id="product_brand_image" value="">
    </div>
  <?php

  }
  function dvutail_save_product_brand_fields($term_id)
  {

    // Check if user has permissions to save data.
    $user = wp_get_current_user();
    $allowed_roles = array('editor', 'administrator', 'author');

    if (!array_intersect($allowed_roles, $user->roles)) {
      return;
    }

    if (array_key_exists('product_brand_image', $_POST)) {

      update_term_meta($term_id, '_brand_logo', sanitize_text_field($_POST['product_brand_image']));
    }
  }
  function dvutail_add_script_to_admin()
  {
    $current_screen = get_current_screen();
    if (
      !isset($current_screen->base) || $current_screen->post_type !== "product" || $current_screen->taxonomy !== "product_brand" || $current_screen->id !== "edit-product_brand"
    ) {
      return;
    }
    wp_enqueue_media();
  ?>

    <style>
      .pyre_thumbnail img {
        max-width: 100%;
        object-fit: contain;
      }

      .product-brand-logo__preview {
        background-color: #f1f1f1;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #cdcdcd;
        border-radius: 5px;
        overflow: hidden;
        margin-bottom: 15px;
        width: 100px;
        height: 100px;
      }
    </style>
    <script>
      (function($) {


        $('#addtag').on('submit', function(e) {
          console.log('submited')
        });

      })(jQuery);
    </script>
<?php
  }
}

new DvuTail_product_brand_metaboxes();
