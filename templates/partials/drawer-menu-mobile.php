<?php

$menu_vertical = dvutail_get_menu_items(75);

$terms = get_terms([
  'taxonomy' => "product_brand",
  'hide_empty' => false,
]);

if (!isset($terms) || empty($terms)) return;


function render_vertical_mobile_menu_items($items, $depth = 0)
{
  if ($depth <= 1) :
?>

    <ul class="menu-item <?php echo 'menu-items-depth-' . $depth ?> <?php echo  $depth === 0 ? 'grid grid-cols-2 gap-4' : '' ?>">
      <?php foreach ($items as $key => $item) :

        $href = "";
        if ($item['object'] === "product_cat" && $item['type'] === 'taxonomy') {
          $href = get_home_url() . '/' . 'danh-muc/' . $item['object_slug'];
        }

        if ($item['object'] === "custom" && $item['type'] === 'custom') {
          $href = $item['object_slug'];
        }

      ?>
        <li class="py-2 <?php echo $depth === 0 ? "w-full" : 'w-full'; ?>">
          <h4 class="<?php echo $depth === 0 ? "font-bold mb-2" : "" ?>">
            <a href="<?php echo $href; ?>"><?php echo $item['title'] ?></a>
          </h4>
          <?php if (count($item['child_items'])) :  ?>

            <?php render_vertical_mobile_menu_items($item['child_items'], $depth + 1) ?>

          <?php endif; ?>
        </li>
      <?php endforeach; ?>
    </ul>

  <?php
  endif;
}


if (count($menu_vertical)) :

  ?>
  <div class="menu-primary-mobile fixed z-[99] w-full h-full">
    <div class="overlay bg-gray-950/40 backdrop-blur-md absolute z-10 left-0 top-0 w-full h-full"></div>
    <div class="primary__mobile__menu-container bg-white rounded-t-[30px] absolute bottom-0 w-full z-20" style="height: calc(80vh + env(safe-area-inset-bottom));">
      <div class="primary__mobile__menu-head pt-1 text-center js__close-menu-mobile pb-4">
        <span class="w-12 h-1 bg-slate-200 rounded-full inline-block mx-auto"></span>
      </div>
      <div class="menu-primary-mobile__container overflow-y-auto h-full">
        <div class="row-title mb-3 px-3">
          <h3 class="text-xl text-gray-800">Thương hiệu</h3>
        </div>
        <div class="dvutail-product-brand__container px-3 mb-6">
          <div class="dvutail-product-brand__list grid grid-cols-4 gap-2">
            <?php foreach ($terms as $term):
              $brand_logo_id = get_term_meta($term->term_id, '_brand_logo', true);
              $thumbnail_url = wp_get_attachment_url($brand_logo_id);
            ?>
              <div class="brand-item bg-white p-1 border rounded-md">
                <a class="text-center block max-h-16 h-full mx-auto" href="<?php echo home_url() . '/brand' . '/' . $term->slug; ?>">
                  <?php if ($thumbnail_url): ?>
                    <img src="<?php echo  $thumbnail_url; ?>" class="max-w-full max-h-full mx-auto" />
                  <?php else: ?>
                    <span class="text-xs italic">no image</span>
                  <?php endif; ?>
                </a>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="row-title mb-3 px-3">
          <h3 class="text-xl text-gray-800">Danh mục ngành hàng</h3>
        </div>
        <div class="vertical__menulist-items">
          <div class="vertical__menulist-header overflow-x-auto py-2 sticky top-0 bg-white border-b shadow-sm px-3">
            <div class="vertical__menulist-tabs flex items-center">
              <?php foreach ($menu_vertical as $key => $menu_item) : ?>
                <div class="menu__tab-item px-2 py-2 min-w-[100px] text-center hover:bg-slate-100 cursor-pointer rounded-lg <?php echo $key === 0 ? 'active bg-slate-100' : '' ?>" data-tab-id="<?php echo $menu_item['id']; ?>" data-index="<?php echo $key ?>">
                  <span class="menu__item--thumbnail w-8 h-8 block mb-2 mx-auto">
                    <img src="<?php echo  $menu_item['menu_thumbnail']; ?>" class="w-full" alt="<?php echo $menu_item['title']; ?>" />
                  </span>
                  <span class="text-sm line-clamp-2 h-10"><?php echo $menu_item['title']; ?></span>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="vertical__menulist-panels w-full px-3">
            <div class="vertical__menulist-panels-inner rounded-lg h-full pb-4">
              <?php
              foreach ($menu_vertical as $key => $menu_item) :  ?>
                <div class="vertical__panel-item <?php echo $key === 0 ? 'active' : '' ?>" data-panel-id="<?php echo $menu_item['id']; ?>">
                  <div class="vertical__menuitem-head py-3">
                    <h3 class="text-xl font-semibold"><?php echo $menu_item['title'] ?></h3>
                  </div>
                  <div class="vertical__menuitem-childs text-sm">
                    <?php render_vertical_mobile_menu_items($menu_item['child_items'], 0) ?>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php endif ?>