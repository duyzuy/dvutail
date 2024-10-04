<?php
/*
	$logoid = get_theme_mod( 'custom_logo' );

    $imagesrc = wp_get_attachment_image_src( $logoid, 'full'); ?>

    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo( 'description' ); ?>" rel="home">

        <img class="img-fluid" src="<?php echo  $imagesrc[0]?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />

    </a>
    <?php
*/
?>
<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?> - <?php bloginfo('description'); ?>" rel="home">
    <figure class="img-holder">
        <picture>
            <source srcset="<?php echo get_template_directory_uri() . '/assets/images/logo-saigonhome-original.svg' ?>" media="(max-width: 991px)">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/logo-saigonhome-original.svg' ?>" alt="logo" class="w-36 md:w-38 lg:w-52">
        </picture>
    </figure>
</a>