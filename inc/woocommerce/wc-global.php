<?php

function dvu_init_widget()
{

  register_sidebar(array(
    'name'          => __('Shop Sidebar', 'kgcvietnam'),
    'id'            => 'shop-sidebar',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<span class="widget-title shop-sidebar">',
    'after_title'   => '</span><div class="is-divider small"></div>',
  ));
}
add_action('widgets_init', 'dvu_init_widget');


add_filter('woocommerce_breadcrumb_defaults', 'dvutail_custom_breadcrumbs');
function dvutail_custom_breadcrumbs()
{
  return array(
    'delimiter'   => '<span class="sep text-sm">/</span>',
    'wrap_before' => '<ul class="dvutail__breadcrumb flex items-center gap-x-2 whitespace-nowrap text-xs lg:text-sm" itemscope itemtype="http://schema.org/BreadcrumbList">',
    'wrap_after'  => '</ul>',
    'before'      => '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">',
    'after'       => '</li>',
    'home'        => _x('Home', 'breadcrumb', 'woocommerce'),
  );
}


add_filter('woocommerce_output_related_products_args', 'dvutail_custom_output_product_related', 999);
function dvutail_custom_output_product_related($args)
{
  $args['posts_per_page'] = 10; // 4 related products
  $args['columns'] = 2; // arranged in 2 columns
  return $args;
}
