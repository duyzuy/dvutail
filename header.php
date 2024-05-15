<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#bf1e2e">
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="manifest" href="<?php echo get_template_directory_uri() ?>/assets/js/manifest.json">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri() ?>/assets/icon/itech-192x192.png">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head(); ?>
</head>

<body <?php echo body_class() ?>>
    <?php if (wp_is_mobile()) : ?>
        <div class="primary__mobile__menu">
            <div class="overlay bg-gray-950/60 backdrop-blur-md absolute z-10 left-0 top-0 w-full h-full"></div>
            <div class="primary__mobile__menu-wrapper bg-white w-full max-w-[320px] relative z-20 h-full">
                <div class="primary__mobile__menu-head h-16 py-3 px-4 shadow-sm flex justify-between items-center">
                    <span class="logo">
                        <?php get_template_part('templates/header/elements/element', 'logo') ?>
                    </span>
                    <span class="js__close-menu-mobile cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32" fill="none">
                            <g clip-path="url(#clip0_1_5337)">
                                <path d="M25 7L7 25" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M25 25L7 7" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_1_5337">
                                    <rect width="32" height="32" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </span>
                </div>
                <div class="primary__mobile__menu-items py-6">
                    <?php get_template_part('templates/header/elements/element', 'menu-mobile') ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <header id="main-header">
        <?php get_template_part('templates/header/wrap', 'header'); ?>
    </header>