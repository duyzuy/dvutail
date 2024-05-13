<?php 

function get_css_arg($args){
	$output = "";
    if($args['background']['value'] != ''){

        $output .= $args['background']['attribute'].':'.$args['background']['value'].'; ';
    }
    if($args['padding']['value'] != ''){
        $output .= $args['padding']['attribute'].':'.$args['padding']['value'].'; ';
    }
    if($args['margin']['value'] != ''){
        $output .= $args['margin']['attribute'].':'.$args['margin']['value'].'; ';
    }
    return 'style="'.$output.'"';
};



if( !function_exists('id_fix_shortcodes') ) {

    function id_fix_shortcodes($content){
        $array = array (
            '<p>[' => '[',
            ']</p>' => ']',
            ']<br />' => ']'
        );
        $content = strtr($content, $array);
        return $content;
    }
    add_filter('the_content', 'id_fix_shortcodes');
}


// Hook only in this admin pages

foreach( array( 'post', 'post-new' ) as $hook )

    add_action( "load-$hook.php", 'dv_setup_tag' );



// Hook only for the 'page'  post type

function dv_setup_tag()
{
    global $typenow;

    add_filter( 'quicktags_settings', 'dv_setup_quicktags', 10, 2 );
    add_action( 'admin_print_footer_scripts', 'dv_custom_quicktag' );

}

function dv_setup_quicktags( $qtInit, $editor_id ) 
{
    if( 'content' === $editor_id )

        $qtInit['buttons'] = 'link,block,img,ul,ol,li,code,more,spell,close,fullscreen';

    return $qtInit;

}


// Add new buttons

function dv_custom_quicktag() 

{ 

    // Don't know how to target only the main content editor. Changes are applied to both editors (content and comments).
    if (wp_script_is('quicktags')){
        ?>

        <script type="text/javascript">

            //QTags.addButton('ID', 'label', 'start_tag', 'end_tag', 'access_key', 'title', 'priority', 'instance');

            QTags.addButton( 'dv__row', 'Add row', '[dv__row class="" background_color="" margin="" padding="" center="false" container="false"][/dv__row]', '', '', 'add row', '1', '' );

            QTags.addButton( 'dv__col', 'Add col', '[dv__col col="12" col__md="6" col__lg="" class="" style=""][/dv__col]', '', '', 'Tooltip about the shortcode 2', '1', '' );

            // QTags.addButton( 'dv__gallery', 'Add Gallery', '[dv__gallery name="tenvietlien" height="130"][dv__image image="link hình ảnh" alt=""]...[/dv__gallery]', '', '', 'Thư viện ảnh với lightbox', '1', '' );

            QTags.addButton( 'youtube', 'Add video', '[youtube id="" title=""]', '', '', 'video youtube', '1', '' );
            // QTags.addButton( 'Dropcap', 'Dropcap', '[drop_cap color="#f37121" font_size="50"]Đ[/drop_cap]', '', '', 'Dropcap', '1', '' );

            // QTags.addButton( 'Flipbox', 'Flipbox', '[flipbox img="link hình ảnh" title="Tiêu đề..."]Nội dung...[/flipbox]', '', '', 'Flipbox', '1', '' );

            

        </script>

        <?php
    }


}