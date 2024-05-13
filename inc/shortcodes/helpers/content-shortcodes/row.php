<?php 
function row_shortcode( $atts, $content = null ) {

    $attr = shortcode_atts( array(
       'class'      =>  '',
       'background_color'   =>  '',
       'padding'    => '',
       'margin'     => '',
       'center'     => false,
       'container'  => false,

    ), $atts );

     

  $css_args = array(
    'background' => array(
      'attribute' => 'background-color',
      'value' => $attr['background_color'],
    ),
    'padding' => array(
      'attribute' => 'padding',
      'value' => $attr['padding'],
    ),
    'margin' => array(
      'attribute' => 'margin',
      'value' => $attr['margin'],
    )
  );
  $classes = '';
  if($attr['center'] == 'true'){
      $classes = 'align-items-center';
  }
  
  $content = id_fix_shortcodes($content );
    ob_start();
    if($attr['container'] == 'true'){
        echo '<div class="container">';
    }
    ?>
        <div class="row <?php echo $classes ?>" <?php echo get_css_arg($css_args) ?> >

            <?php echo do_shortcode($content) ?>
            
        </div>
    <?php
      if($attr['container'] == 'true'){
        echo '</div>';
    }

	return ob_get_clean();
}

add_shortcode( 'dv__row', 'row_shortcode' );


function col_shortcode( $atts, $content = null ) {

  $attr = shortcode_atts( array(
      'col'         =>  12,
      'col__sm'     =>  '',
      'col__md'     =>  '',
      'col__lg'     =>  '',
      'class'       =>  '',
      'style'       =>  '',

  ), $atts );
  $classes = '';
  if($attr['col'] != ''){
      $classes .= 'col-' . $attr['col'] . ' ';
  }
  if($attr['col__sm'] != ''){
      $classes .= 'col-sm-' . $attr['col__sm'] . ' ';
  }
  if($attr['col__md'] != ''){
      $classes .= 'col-md-' . $attr['col__md'] . ' ';
  }
  if($attr['col__lg'] != ''){
      $classes .= 'col-lg-' . $attr['col__lg'] . ' ';
  }
  if($attr['class'] != ''){
      $classes .= $attr['class'];   
  }
  ob_start();
  $content = id_fix_shortcodes($content);
  ?>
  <div class="dv-col <?php echo $classes ?>" <?php echo (($attr['style'] != '') ? 'style="'.$attr['style'].'"' : '') ?>>
      <?php      
          echo do_shortcode($content) ?>
      </div>
  <?php
return ob_get_clean();
}

add_shortcode( 'dv__col', 'col_shortcode' );