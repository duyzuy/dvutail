<?php

include_once(ABSPATH . 'wp-admin/includes/plugin.php');
if (is_plugin_active('polylang/polylang.php')) {



    $translations =  pll_the_languages(array('raw' => 1));

    // echo '<pre>';
    // var_dump($translations);
    // echo '</pre>';

    // // $currentLang = array_search()
    // $languages = array();
?>
    <div class="dvu-item-language">
        <?php foreach ($translations as $translate) {

            if ($translate['current_lang']) {
                echo '<div class="lang-select"><span class="label">' . $translate['name'] . '</span>
            <span class="dvu-icon size-12 ml-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
          </svg></span></div>';
            }
        } ?>
        <div class="lang-dropdown">
            <?php foreach ($translations as $translate) {  ?>
                <div class="lang-item">
                    <?php if ($translate['current_lang']) {
                        echo '<span>' . $translate['name'] . '</span>';
                    } else {
                        echo '<a href="' . $translate['url'] . '">' . $translate['name'] . '</a>';
                    } ?>
                </div>
            <?php } ?>
        </div>
    </div>
<?php
} else {
?>

    <div class="">
        <div class="lang-item"></div>
    </div>
<?php


}
