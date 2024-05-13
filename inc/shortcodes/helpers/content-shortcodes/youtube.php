<?php 
function sc_youtube( $atts, $content = null ) {
    $attr = shortcode_atts( array(
      'id'   => '',
      'title' => '',
    ), $atts );
   
    ob_start();
  
    ?>
    <div class="wrap_youtube" style="margin: 20px 0;">
    <object>
            <param name="movie" value="http://www.youtube.com/embed/<?php echo $attr['id'] ?>?html5=1&amp;rel=0&amp;hl=en_US&amp;version=3"/>
            <param name="allowFullScreen" value="true"/>
            <param name="allowscriptaccess" value="always"/>
            <embed src="http://www.youtube.com/embed/<?php echo $attr['id'] ?>?html5=1&amp;rel=0&amp;hl=en_US&amp;version=3" class="youtube-player" type="text/html" allowscriptaccess="always" allowfullscreen="true"/>
        </object>
    </div>
    <style>
    .wrap_youtube{
        width: 100%;
        position: relative;
        padding-top: 56.25%
    }
    .wrap_youtube object, .wrap_youtube iframe{
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0
    }
    </style>
    <?php 
	return ob_get_clean();
}
add_shortcode( 'youtube', 'sc_youtube' );