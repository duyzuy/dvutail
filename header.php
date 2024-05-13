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
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                },
                container: {
                    center: true,
                },
            }
        }
    </script>
    <?php wp_head(); ?>
</head>

<body <?php echo body_class() ?>>
    <!-- if(wp_is_mobile()) -->
    <header id="main-header">
        <?php get_template_part('templates/header/wrap', 'header'); ?>
    </header>