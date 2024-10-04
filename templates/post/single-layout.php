<div class="container mx-auto px-3 md:px-6 lg:px-8">
    <div class="overflow-x-auto whitespace-nowrap py-4">
        <?php custom_breadcrumbs() ?>
    </div>
</div>
<div class="dvutail-single-post mx-auto container px-3 md:px-6 lg:px-8 mb-6">
    <div class="dvutail-sing-post__inner bg-white rounded-md py-6 lg:py-12 px-3">
        <div class="dvutail-sing-post__inner-content max-w-[850px] mx-auto">
            <div class="dvutail-single-post__head">
                <div class="post-meta flex items-center mb-3 py-3 overflow-x-auto">
                    <?php single_post_meta(); ?>
                </div>
                <h1 class="font-bold text-xl md:text-2xl lg:text-3xl lg:leading-[48px] mb-6">
                    <?php the_title(); ?>
                </h1>
                <div class="py-2 border-b mb-6">
                    <?php single_share_post() ?>
                </div>
                <?php if (has_post_thumbnail()) :
                    $url = get_the_post_thumbnail_url(); ?>
                    <div class="single_post-thumb mb-6 hidden">
                        <img src="<?php echo $url ?>" alt="<?php the_title() ?>" />
                    </div>
                <?php endif;
                ?>
            </div>
            <div class="dvutail-single-post__body mb-12">
                <?php the_content() ?>
            </div>
            <div class="py-3 border-t border-b">
                <?php dvutail_tags_post() ?>
            </div>
            <div class="pt-6">
                <?php dvu_post_related(); ?>
            </div>
        </div>
    </div>
</div>