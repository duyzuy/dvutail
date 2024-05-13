<?php 
function sc_section_banner_product_mobile( $atts ) {
    $attr = shortcode_atts( array(
        'title' => 'Danh mục ngành hàng chính'
    ), $atts );

    ob_start();
   
  
    ?>
    <section id="product-banner-section" class="section-product-banner woocommerce is_mobile">
		<div class="container">
			<div class="row-title">
				<h3 class="section-title flow-text small-text"><?php echo $attr['title'] ?></h3>
			</div>
            <div class="banner-category-list sgh_cat-list">
                <?php 
                 $args = array(
                    'number'     => 16,
                    'orderby'    => 'rand',
                    'order'      => '',
                    'hide_empty' => false,
                    'include'    => array(17, 82, 18, 20, 21, 27, 16, 84, 23, 76, 78, 80, 19, 22, 25, 85)
                );
                
                $product_categories = get_terms( 'product_cat', $args );
                $output = '';
                foreach( $product_categories as $cat )  { 

                    $cat_thumb_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
                    $cat_thumb_url = wp_get_attachment_thumb_url( $cat_thumb_id );
                    $term_link = get_term_link( $cat, 'product_cat' ); 
                    $output .= '<div class="sgh-cat mobile cat-'.$cat->slug.' cat-'.$cat->term_id.'"><a href="'.$term_link.'">';
                    $output .= '<div class="image"><img src="'.$cat_thumb_url.'" alt="'.$cat->name.'" /></div>';
                    $output .= '<div class="content-cat"><p class="cat-label">'.$cat->name.'</p><p><span class="cat-count">'.$cat->count.'</span>'. esc_html__('sản phẩm', 'saigonhome').'</p></div>';
                    $output .= '</a></div>';
                }
                    echo $output;
                ?>
                
                  
			</div>
		</div>
	</section>
    <?php
    return ob_get_clean();
   
}
add_shortcode( 'neobanner_mobile', 'sc_section_banner_product_mobile' );