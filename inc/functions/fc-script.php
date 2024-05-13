<?php 
function after_body_script_close(){
 

}
add_action('body_script_after_close','after_body_script_close', 10 );


function after_footer_script_close(){

  
}
add_action('body_script_after_close','after_footer_script_close', 10 );
