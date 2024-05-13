<nav class="bg-white drop-shadow-sm relative z-10">
    <div class="mx-auto container px-2 md:px-6 lg:px-8">
        <div class="relative flex lg:h-[90px] h-[60px] items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center lg:hidden">
                <!-- Mobile menu button-->
                <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!--Icon when menu is closed.Menu open: "hidden", Menu closed: "block"-->
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!--Icon when menu is open. Menu open: "block", Menu closed: "hidden" -->
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center lg:items-stretch lg:justify-start h-full">
                <div class="flex flex-shrink-0 items-center">
                    <?php get_template_part('templates/header/elements/element', 'logo') ?>
                </div>
                <div class="hidden lg:ml-6 lg:flex items-center flex-1 justify-center h-full">
                    <?php get_template_part('templates/header/elements/element', 'primary-menu', array(
                        "class" => "flex space-x-6 items-center menu-primary-desktop h-full"
                    )) ?>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 lg:static lg:inset-auto lg:ml-6 lg:pr-0">
                <div class="language group/item relative">
                    <div class="lang-item flex items-center lg:border lg:border-orange-500 text-orange-500 px-3 py-2 justify-between  cursor-pointer">
                        <span class="flex items-center mr-3">
                            <img src="<?php echo get_template_directory_uri() . '/assets/icons/flag-vi.png' ?>" width="18" height="18" class="mr-2" />
                            <span class="font-bold">VIE</span>
                        </span>
                        <span class="hidden lg:block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-[12px]" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"></path>
                            </svg>
                        </span>
                    </div>
                    <div class="absolute group/dropdown invisible group-hover/item:visible right-0 w-32 origin-top-right bg-white z-20 py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <a href="#" class="block px-4 py-3 text-sm text-gray-700 hover:text-sky-700" role="menuitem" tabindex="-1">
                            <span class="flex items-center">
                                <img src="<?php echo get_template_directory_uri() . '/assets/icons/flag-vi.png' ?>" width="18" height="18" class="mr-2" />
                                <span class="font-[500]">VIE</span>
                            </span>
                        </a>
                        <a href="#" class="block px-4 py-3 text-sm text-gray-700 hover:text-sky-700" role="menuitem" tabindex="-1">
                            <span class="flex items-center">
                                <img src="<?php echo get_template_directory_uri() . '/assets/icons/flag-en.png' ?>" width="18" height="18" class="mr-2" />
                                <span class="font-[500]">ENG</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</nav>