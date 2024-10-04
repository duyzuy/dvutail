<?php if (wp_is_mobile()) : ?>
    <?php get_template_part('templates/partials/drawer-menu', 'mobile') ?>

    <header id="main-header" class="relative z-30">
        <div class="header-wraper relative bg-yellow-400 text-base">
            <div class="mx-auto container px-3 md:px-6 lg:px-8 py-3">
                <div class="relative items-center justify-between flex flex-1 flex-wrap">
                    <div class="flex justify-between items-center">
                        <?php get_template_part('templates/header/elements/element', 'logo') ?>
                    </div>
                    <div class="flex gap-x-3 items-center">
                        <?php get_template_part('templates/header/elements/element', 'cart') ?>
                        <div class="flex items-center">
                            <!-- Mobile menu button-->
                            <button type="button" class="js__btn-primary-menu-mobile relative inline-flex items-center justify-center rounded-md p-1 text-gray-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset" aria-controls="mobile-menu" aria-expanded="false">
                                <span class="absolute -inset-0.5"></span>
                                <span class="sr-only">Open main menu</span>
                                <!--Icon when menu is closed.Menu open: "hidden", Menu closed: "block"-->
                                <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="header-search-form pt-3">
                    <?php get_template_part('templates/header/elements/search', 'form', array(
                        "class" => "flex space-x-6 items-center menu-primary-desktop h-full",
                    )) ?>
                </div>
            </div>
        </div>
    </header>
<?php else: ?>
    <header id="main-header" class="relative z-30">
        <div class="header-wraper relative bg-yellow-400 text-base">
            <div class="header__top">
                <div class="mx-auto container px-3 md:px-6 lg:px-8 py-3">
                    <div class="relative items-center justify-between flex flex-1 flex-wrap">
                        <div class="flex justify-between items-center w-full lg:w-fit lg:mb-0 mb-2">
                            <?php get_template_part('templates/header/elements/element', 'logo') ?>
                            <div class="flex items-center lg:hidden">
                                <!-- Mobile menu button-->
                                <button type="button" class="js__btn-primary-menu-mobile relative inline-flex items-center justify-center rounded-md p-2 text-gray-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset" aria-controls="mobile-menu" aria-expanded="false">
                                    <span class="absolute -inset-0.5"></span>
                                    <span class="sr-only">Open main menu</span>
                                    <!--Icon when menu is closed.Menu open: "hidden", Menu closed: "block"-->
                                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="lg:ml-6 lg:w-auto w-full lg:flex-1">
                            <div class="w-full lg:max-w-[450px] mx-auto">
                                <?php get_template_part('templates/header/elements/search', 'form', array(
                                    "class" => "flex space-x-6 items-center menu-primary-desktop h-full",
                                )) ?>
                            </div>
                        </div>
                        <div class="hidden lg:flex items-center justify-center h-full">
                            <div class="flex items-center justify-center gap-x-6">

                                <?php get_template_part('templates/header/elements/nav', 'contact') ?>
                                <?php get_template_part('templates/header/elements/nav', 'category') ?>
                                <?php get_template_part('templates/header/elements/element', 'cart', array(
                                    "is_mobile" => false
                                )) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php get_template_part('templates/header/header', 'bottom') ?>
        </div>
    </header>
<?php endif;  ?>