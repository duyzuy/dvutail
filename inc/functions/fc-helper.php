<?php 
function custom_post_excerpt(){
    global $post;
    $post_excerpt = get_the_excerpt( $post->ID );
    $strln = strlen($post_excerpt);
    // $post_excerpt = substr($post_excerpt, 0, 80);
    echo wp_trim_words($post_excerpt, 26);


}


//*============ archive title============== */
add_filter( 'get_the_archive_title', function ($title) {
    
    if ( is_category() ) :
        $title =   printf( __( '%s', 'dvutheme' ), '<h1 class="archive-title">' . single_cat_title( '', false ) . '</h1>' );
    //  $title =   printf( __( ' ', 'dvutheme' ), single_cat_title( '<h1 class="archive-title">', true ) );

    elseif ( is_tag() ) :
        $title =   printf( __( ' ', 'dvutheme' ), single_tag_title( '<h1 class="archive-title">', true ) );

    elseif ( is_search() ) :
        $title =  printf( __( ' %s', 'dvutheme' ), '<h1 class="archive-title">' . get_search_query() . '</h1>' );

    elseif ( is_author() ) :
        /* Queue the first post, that way we know
         * what author we're dealing with (if that is the case).
        */
        the_post();
        $title =    printf( __( 'Author Archives: %s', 'flatsome' ), '<h1 class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></h1>' );
        /* Since we called the_post() above, we need to
         * rewind the loop back to the beginning that way
         * we can run the loop properly, in full.
         */
        rewind_posts();
    elseif(is_home()):
        // $title =   printf( __( ' ', 'dvutheme' ), single_post_title( '<h1 class="blog-title">', true ) );
        $title =   printf( __( '%s', 'dvutheme' ), '<h1 class="blog-title">' . single_post_title( '', false ) . '</h1>' );
    endif;
    
    });


    function sgh_time_posted(){
        $posted_on = human_time_diff(get_the_time('U'), current_time('timestamp'));
       
        echo '<span class="posted-on"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Viết vào <span>'.$posted_on.'</span> trước </span>';
       
        // echo '<span class="posted-on"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Viết vào <a href="'.esc_url(get_permalink() ).'">'.$posted_on.'</a> trước </span>';
    
    }


//remove version 
add_filter( 'style_loader_src',  'sdt_remove_ver_css_js', 9999, 2 );
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999, 2 );

function sdt_remove_ver_css_js( $src, $handle ) 
{
    $handles_with_version = [ 'style' ]; // <-- Adjust to your needs!

    if ( strpos( $src, 'ver=' ) && ! in_array( $handle, $handles_with_version, true ) )
        $src = remove_query_arg( 'ver', $src );

    return $src;
}