<?php

$body_classes = get_body_class('bg-[#f6f9fc] mx-auto');

if (wp_is_mobile()) {
    array_push($body_classes, "is-mobile");
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#facc15">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="manifest" href="<?php echo get_template_directory_uri() ?>/assets/js/manifest.json">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri() ?>/assets/logo-icon-192.png">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head(); ?>
</head>

<body class="<?php echo implode(" ", $body_classes); ?> ">


    <?php get_template_part('templates/header/wrap', 'header'); ?>

    <div class="w-full relative polygon-header">
        <div class="polygons-header flex items-center justify-center absolute h-[30px] md:h-[160px] lg:h-[280px] left-0 right-0 -z-10">
            <div class="polygons-header-left w-1/2 bg-yellow-400 h-full" style="clip-path: polygon(-50% 0%, 100% 100%, 100% 0%);"></div>
            <div class="polygons-header-right w-1/2 bg-yellow-400 h-full" style="clip-path: polygon(0% 0%, 150% 0%, 0% 100%);"></div>
        </div>
    </div>
    <main class="relative">