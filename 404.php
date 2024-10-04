<?php

get_header()
?>
<div id="page-content" class="wrap-page-content">
    <div class="mx-auto error-404 not-found flex items-center justify-center container px-3 md:px-4 lg:px-8">
        <div class="flex items-center justify-center py-8 lg:py-16">
            <div class="inner text-center">
                <div class="number mb-6">
                    <span class="lg:text-8xl text-6xl block">404</span>
                </div>
                <div class="content">
                    <div class="mb-3">
                        <?php echo esc_html__('Trang bạn tìm hiện không tồn tại vui lòng tìm kiếm', 'dvutail') ?>
                    </div>
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>