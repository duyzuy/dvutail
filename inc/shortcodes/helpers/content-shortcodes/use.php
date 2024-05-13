<?php 
function use_shorcode( $atts, $content = null ) {

    $attr = shortcode_atts( array(
       'use_1'  =>  '3g mỗi ngày',
       'use_2'  =>  '1 lần mỗi ngày',
       'use_3'  =>  'trước hoặc sau khi ăn',
       'use_4'  =>  'lưu trữ nhiệt độ phòng'

    ), $atts );


  $content = id_fix_shortcodes($content );
  $url = get_template_directory_uri();
    ob_start();

    ?>
        <ul class="single_product-use">
         
                <li><span class="icon"><img src="<?php echo $url?>/assets/images/icon/icon_kgcvietnam-1.png" alt="huong dan su dung"  height="28px"></span><p><?php echo $attr['use_1'] ?></p></li>
        
                <li><span class="icon"><img src="<?php echo $url?>/assets/images/icon/icon_kgcvietnam-2.png" alt="huong dan su dung"  height="28px"></span><p><?php echo $attr['use_2'] ?></p></li>
        
                <li><span class="icon"><img src="<?php echo $url?>/assets/images/icon/icon_kgcvietnam-3.png" alt="huong dan su dung"  height="28px"></span><p><?php echo $attr['use_3'] ?></p></li>
    
    
                <li><span class="icon"><img src="<?php echo $url?>/assets/images/icon/icon_kgcvietnam-4.png" alt="huong dan su dung" height="28px"></span><p><?php echo $attr['use_4'] ?></p></li>

                
        </ul>
    <?php
 

	return ob_get_clean();
}

add_shortcode( 'use', 'use_shorcode' );

