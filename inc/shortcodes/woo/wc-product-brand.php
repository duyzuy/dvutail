<?php
function dvutail_create_shortcode_brand($atts)
{
  $attr = shortcode_atts(array(
    'slider_id'     => 92,
  ), $atts);
  ob_start();

  $terms = get_terms([
    'taxonomy' => "product_brand",
    'hide_empty' => false,
  ]);

  if (!isset($terms) || empty($terms)) return;

?>
  <div class="dvutail-product-brand container mx-auto lg:px-8 md:px-6 px-3">
    <div class="row-title mb-3 lg:mb-6">
      <h3 class="text-2xl lg:text-3xl text-gray-800">Thương hiệu hàng đầu</h3>
    </div>
    <div class="dvutail-product-brand__container">
      <div class="dvutail-product-brand__swiper swiper">
        <div class="swiper-wrapper py-3">
          <?php foreach ($terms as $term):
            $brand_logo_id = get_term_meta($term->term_id, '_brand_logo', true);
            $thumbnail_url = wp_get_attachment_url($brand_logo_id);
          ?>
            <div class="brand-item swiper-slide w-[80px] lg:w-[120px] bg-white rounded-md px-1 py-2 shadow-sm hover:shadow-md cursor-pointer hover:translate-y-[-2px] transition-transform flex items-center justify-center">
              <a class="text-center block" href="<?php echo home_url() . '/brand' . '/' . $term->slug; ?>">
                <div class="brand-item__logo w-full max-w-16 lg:max-w-24 bg-white rounded-lg mb-1 mx-auto flex items-center justify-center">
                  <?php if ($thumbnail_url): ?>
                    <img src="<?php echo  $thumbnail_url; ?>" class="max-w-full max-h-full" />
                  <?php else: ?>
                    <span class="text-xs italic">no image</span>
                  <?php endif; ?>
                </div>
                <h4 class="text-gray-800 text-sm lg:text-base"><?php echo $term->name ?></h4>
                <span class="text-xs text-gray-500 hidden"><?php echo $term->count . ' sản phẩm'; ?></span>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
<?php
  return ob_get_clean();
}
add_shortcode('dvutail_brand', 'dvutail_create_shortcode_brand');
