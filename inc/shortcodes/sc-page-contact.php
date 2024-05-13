<?php
function contact_form_shortcode( $atts, $content = null ) {
	
    ob_start();
    ?>
    	<form id="sgh_contact" class="form-contact" action="" method="">
      
			        <div class="form-group">
                        <label for="yourname" class="sr-only"><?php esc_html_e( 'Họ và tên', 'kgcvietnam' ) ?></label>
                        <input id="yourname" name="yourname" type="text" class="form-control form-control-sm" placeholder="<?php esc_html_e( 'Họ và tên', 'kgcvietnam' ) ?>">
                        <div></div> 
					</div>
					<div class="form-group">
                        <label for="yourphone" class="sr-only"><?php esc_html_e( 'Điện thoại', 'kgcvietnam' ) ?></label>
					    <input id="yourphone" name="yourphone" type="text" class="form-control form-control-sm"  placeholder="<?php esc_html_e( 'Số điện thoại', 'kgcvietnam' ) ?>">
                        <div></div> 
					</div>
					<div class="form-group">
                        <label for="youremail" class="sr-only"><?php esc_html_e( 'Email', 'kgcvietnam' ) ?></label>
                        <input id="youremail" name="youremail" type="email" class="form-control form-control-sm" placeholder="<?php esc_html_e( 'Email', 'kgcvietnam' ) ?>">
                        <div></div> 
					</div>
					<div class="form-group">
                        <label for="messange" class="sr-only"><?php esc_html_e( 'Lời nhắn', 'kgcvietnam' ) ?></label>
                        <textarea id="messange" rows="6"  class="form-control" placeholder="<?php esc_html_e( 'Lời nhắn', 'kgcvietnam' ) ?>"></textarea>
					</div>
					<div class="form-group">
                        <input type="submit" name="submit"class="btn btn-warning" value="<?php esc_html_e( 'Gửi liên hệ', 'kgcvietnam' ) ?>"/>
                        <p class="notice"></p>
					</div>
				
        </form>
        <?php
        $output = ob_get_clean();
		return $output;
}
add_shortcode( 'neo_contact_form', 'contact_form_shortcode' );



