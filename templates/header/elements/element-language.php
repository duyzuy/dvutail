<?php
include_once(ABSPATH . 'wp-admin/includes/plugin.php');
if (defined('ICL_SITEPRESS_VERSION')) {
    //WPML is enabled

    $current_lang_code =  apply_filters('wpml_current_language', null);
    $lang_list = apply_filters('wpml_active_languages', NULL, array("skip_missing" => 1));
    $current_lang = $lang_list[$current_lang_code];

    $lang_short_name =  $current_lang['native_name'];

    if ($current_lang_code == 'vi') {
        $lang_short_name = "VIE";
    }
    if ($current_lang_code == 'en') {
        $lang_short_name = "ENG";
    }

?>

    <div class="language group/item relative">
        <div class="lang-item flex items-center lg:border lg:border-orange-600 text-orange-600 px-3 py-2 justify-between  cursor-pointer">
            <span class="flex items-center mr-3">
                <img src="<?php echo get_template_directory_uri() . "/assets/icons/flag-{$current_lang_code}.png" ?>" width="18" height="18" class="mr-2" />
                <span class="font-[500] uppercase"><?php echo $lang_short_name; ?></span>
            </span>
            <span class="hidden lg:block">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-[12px]" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"></path>
                </svg>
            </span>
        </div>
        <div class="absolute group/dropdown invisible group-hover/item:visible right-0 w-40 origin-top-right bg-white z-20 py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <?php foreach ($lang_list as $key => $lang) { ?>

                <a href="<?php echo $lang['url']; ?>" class="block px-4 py-3 text-sm text-gray-700 hover:text-sky-700" role="menuitem" tabindex="-1">
                    <span class="flex items-center">
                        <img src="<?php echo get_template_directory_uri() . "/assets/icons/flag-{$key}.png" ?>" width="18" height="18" class="mr-2" />
                        <span class="font-[500]"><?php echo $lang['native_name']; ?></span>
                    </span>
                </a>

            <?php } ?>
        </div>
    </div>
<?php


}
