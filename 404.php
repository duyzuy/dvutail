<?php

get_header()
?>
<div id="page-content" class="wrap-page-content">
    <div class="content error-404 not-found flex items-center justify-center container">
        <div class="px-3 md:px-4 lg:px-8 flex items-center justify-center lg:py-32">
            <div class="inner text-center">
                <div class="number mb-6">
                    <span class="lg:text-8xl text-4xl text-gray-300 fond-bold block">404</span>
                    <?php custom_breadcrumbs(); ?>
                </div>
                <div class="content">
                    <?php echo esc_html__('Trang bạn tìm hiện không tồn tại vui lòng tìm kiếm', 'dvutheme') ?>
                    <?php get_search_form(); ?>
                </div>

            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>