<?php

function dvu_product_title()
{

    the_title('<h1 class="entry-title single__product-title">', '</h1>');
}
// add_action('neo_product_summary', 'dvu_product_title', 5);

function dvu_product_excerpt()
{

?>

    <div class="product-short-description"> <?php the_excerpt(); ?></div>
    <?php

}
// add_action('neo_product_summary', 'dvu_product_excerpt', 15);

function activity_single_hosts()
{
    global $post;
    $terms = get_the_terms($post->ID, 'activity_host');

    if ($terms) { ?>
        <div class="flex flex-wrap gap-x-3 gap-y-3">
            <?php
            foreach ($terms as $term) {

                // $term_link = get_term_link($term);
                $term_meta = get_term_meta($term->term_id, '_activity_host_term_meta', true);
            ?>

                <div class="item text-center">
                    <div class="thumbnail h-12 mb-2">
                        <img src="<?php echo $term_meta['host_thumbnail']; ?>" alt="<?php echo $term->name; ?>" class=" max-h-full mx-auto" />
                    </div>
                    <span class="text-[13px]"><?php echo $term->name; ?></span>
                </div>
            <?php
            }
            ?>
        </div>
    <?php
    } else {
        echo "--";
    }
}
// add_action('neo_product_summary', 'neo_product_cats', 25);

function neo_product_tags()
{
    global $post;
    $terms = get_the_terms($post->ID, 'tags_product');
    $output = '';
    $spec = ', ';
    $i = 1;
    if ($terms) {
        foreach ($terms as $term) {

            $term_link = get_term_link($term);
            $termid = $term->term_id;
            if ($i > 1) {
                $output .= $spec;
                $output .= '<a class="product-tags" href="' . esc_url($term_link) . '">' . $term->name . '</a>';
            } else {
                $output .= '<a class="product-tags" href="' . esc_url($term_link) . '">' . $term->name . '</a>';
            }
            $i++;
        }
        echo '<p class="product-cats"><span class="cat-title">Xem thêm:</span>' . $output . '</p>';
    }
}
add_action('neo_product_summary', 'neo_product_tags', 35);


function neo_product_share()
{
    ?>
    <div class="product-share"><span class="share-title">Chia sẻ: </span>
        <ul class="socials-shares">

            <li class="js-social js-social-facebook facebook">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" rel="nofollow" target="_blank">
                    <i class="interior icon-facebook"></i>
                </a>
            </li>
            <li class="js-social js-social-twitter twitter">
                <a href="https://twitter.com/intent/tweet?text=<?php the_title() ?> &amp;url=<?php the_permalink() ?>" title="" rel="nofollow" target="_blank">
                    <i class="interior icon-twitter"></i>
                </a>
            </li>
            <li class="js-social js-social-google google">
                <a href="https://plus.google.com/share?url=<?php the_permalink() ?>" rel="nofollow" target="_blank">
                    <i class="interior icon-google-plus-logo"></i>
                </a>
            </li>
            <li class="js-social js-social-pinterest pinterest">
                <a href="#" rel="nofollow" target="_blank">
                    <i class="interior icon-pinterest"></i>
                </a>
            </li>
            <li class="js-social js-social-linkedin linkedin">
                <a href="#" rel="nofollow" target="_blank">
                    <i class="interior icon-linkedin-logo"></i>
                </a>
            </li>

        </ul>
    </div>
<?php
}
add_action('neo_product_summary', 'neo_product_share', 55);



function product_gallery()
{

    wp_enqueue_style('light_gallery');
    wp_enqueue_script('light_gallery');
    wp_enqueue_script('mouse_wheel');
    // wp_enqueue_script('product_lightbox');

    global $post;
    $gallery = get_post_meta($post->ID, '_gallery_product_id', true);
    $output = '';
    $thumbnail = '';
    $thumbnail_show = '';
    $data_img = array();
    if ($gallery) {
        $elements = explode(',', $gallery);
        if (has_post_thumbnail()) {
            $url_full = get_the_post_thumbnail_url($post->ID, 'full');
            $data_img[0]['src'] = get_the_post_thumbnail_url($post->ID, 'full');
            $data_img[0]['thumb'] = get_the_post_thumbnail_url($post->ID, 'thumbnail');
            $url_thumbnail = get_the_post_thumbnail_url($post->ID, 'thumbnail');
            $output = '<figure class="first dynamic_gallery" style="text-align: center"><img src="' . $url_full . '" class="img-fluid"></figure>';
            $thumbnail = '<button class="product-thumb thumb-image-0 dynamic_gallery"><img src="' . $url_thumbnail . '"></button>';
            $thumbnail_show = '<button class="product-thumb thumb-image-0 dynamic_gallery"><img src="' . $url_thumbnail . '"></button>';

            for ($i = 0; $i < count($elements); $i++) {
                $n = $i + 1;
                $img_full = wp_get_attachment_image_src($elements[$i], 'full');
                $data_img[$i + 1]['src'] = wp_get_attachment_image_src($elements[$i], 'full')[0];
                $data_img[$i + 1]['thumb'] = wp_get_attachment_image_src($elements[$i], 'thumbnail')[0];
                $img_thumbnail = wp_get_attachment_image_src($elements[$i], 'thumbnail');
                $thumbnail .= '<button class="product-thumb thumb-image-' . $n . ' dynamic_gallery"><img src="' . $img_thumbnail[0] . '"></button>';

                if ($i < 3) {
                    $thumbnail_show .= '<button class="product-thumb thumb-image-' . $n . ' dynamic_gallery"><img src="' . $img_thumbnail[0] . '"></button>';
                }
                if ($i == 3) {
                    $thumbnail_show .= '<button class="product-thumb thumb-image-4 dynamic_gallery"><img src="' . wp_get_attachment_image_src($elements[3], 'thumbnail')[0] . '"><div class="count"><span>+' . (count($elements) - 4) . '</span></div></button>';
                }
            };
        } else {

            for ($i = 0; $i < count($elements); $i++) {
                $img_full = wp_get_attachment_image_src($elements[$i], 'full');
                $data_img[$i]['src'] = wp_get_attachment_image_src($elements[$i], 'full')[0];
                $data_img[$i]['thumb'] = wp_get_attachment_image_src($elements[$i], 'thumbnail')[0];
                $img_thumbnail = wp_get_attachment_image_src($elements[$i], 'thumbnail');
                $thumbnail .= '<button class="product-thumb thumb-image-' . $i . ' dynamic_gallery"><img src="' . $img_thumbnail[0] . '"></button>';
                if ($i < 5) {
                    $thumbnail_show .= '<button class="product-thumb thumb-image-' . $i . ' dynamic_gallery"><img src="' . $img_thumbnail[0] . '"></button>';
                }
            };
        }
    } else {
        if (has_post_thumbnail()) {
            $url_full = get_the_post_thumbnail_url($post->ID, 'full');
            $data_img[0]['src'] = get_the_post_thumbnail_url($post->ID, 'full');
            $data_img[0]['thumb'] = get_the_post_thumbnail_url($post->ID, 'thumbnail');
            $output = '<figure class="first dynamic" style="text-align: center" data-src="' . $url_full . '"><img src="' . $url_full . '" class="img-fluid"></figure>';
        }
    }
    $gallery = $output . '<div class="product_thumbails">' . $thumbnail_show . '</div>';
    echo '<div id="single_product-gallery" class="product__gallery">' . $gallery . '</div>';
?>
    <script type="text/javascript">
        $('.dynamic_gallery').each(function() {
            $(this).on('click', function(e) {
                $(this).lightGallery({

                    addClass: 'fb-comments',
                    mode: 'lg-fade',
                    dynamic: true,
                    download: false,
                    enableDrag: false,
                    thumbnail: true,
                    animateThumb: false,
                    showThumbByDefault: false,
                    download: false,
                    autoplayControls: false,
                    hash: false,
                    dynamicEl: [
                        <?php for ($i = 0; $i < count($data_img); $i++) { ?> {
                                src: '<?php echo $data_img[$i]['src'] ?>',
                                thumb: '<?php echo $data_img[$i]['thumb'] ?>',
                            },
                        <?php } ?>
                    ]
                });
            });


        })
    </script>

    <?php

}
add_action('dvu_product_image', 'product_gallery', 5);

function dvu_product_inform()
{
    global $post;
    $barcode = get_post_meta($post->ID, '_product_barcode', true);
    $size = get_post_meta($post->ID, '_product_size', true);
    $weight = get_post_meta($post->ID, '_product_weight', true);
    $output = '';
    if ($barcode) {
        $output .= '<li><strong>Barcode: ' . $barcode . '</strong></li>';
    }
    if ($size) {
        $output .= '<li><strong>Kích thước: ' . $size . '</strong></li>';
    }
    if ($weight) {
        $output .= '<li><strong>Trọng lượng: ' . $weight . '</strong></li>';
    }


    echo $output;
}

function product_downloadable()
{
    global $post;

    $product_download_id = get_post_meta($post->ID, '_product_download', true);

    $args = array('post_type' => 'download', 'p' => $product_download_id);

    //get looop post download name
    $loop = get_posts($args);

    //get ID of file download 
    $file_id = get_post_meta($loop[0]->ID, '_downloadable_id', true);

    //get full file download
    $file = get_post($file_id);
    $url = $file->guid;


    echo '<a href="' . $url . '" download><i class="dvu dvu-download mr-1"></i> Tải ngay ' . $loop[0]->post_title . '</a>';
}



function dvu_get_speakers($speaker_ids)
{
    global $post;
    $argpps = array(
        'post_type' => 'speaker',
        'post_status' => 'publish',
        'posts_per_page' => -1, // you may edit this number
        'orderby' => 'rand',
        // 'post__not_in'  => array($post->ID),
        'post__in' => $speaker_ids
    );
    $query = new WP_Query($argpps);

    if ($query->have_posts()) :
    ?>
        <div class="seapkers flex items-center -mx-3">
            <?php while ($query->have_posts()) : $query->the_post();

                $position = get_post_meta(get_the_ID(), '_speaker_position', true);
                $desc = get_post_meta(get_the_ID(), '_speaker_description', true);
            ?>
                <div class="speaker-item w-1/2 md:w-1/3 lg:w-1/5 px-3">
                    <div class="border rounded-sm p-3">
                        <div class="speaker-avt mb-3">
                            <?php
                            if (has_post_thumbnail()) :
                                the_post_thumbnail('large', ['class'   =>  'img-fluid', 'alt' =>  esc_attr(get_the_title())]);
                            endif;
                            ?>
                        </div>
                        <div class="speaker-content text-center">
                            <h3 class="bg-gradient-to-tr from-[#CC2027] via-[#EB7121] to-[#F48820] inline-block text-transparent bg-clip-text text-md lg:text-lg font-bold"><?php the_title(); ?></h3>
                            <p class="text-xs"><?php echo $position; ?></p>
                        </div>
                    </div>
                </div>

            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>
    <?php else : ?>

        <div>no sepaker</div>

    <?php endif;
}


function dvu_product_related()
{
    global $post;
    $custom_taxterms = wp_get_object_terms($post->ID, 'category_product', array('fields' => 'ids'));
    $argpps = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => 6, // you may edit this number
        'orderby' => 'rand',
        'post__not_in'  => array($post->ID),
        'tax_query' => array(
            array(
                'taxonomy' => 'category_product',
                'field' => 'ids',
                'terms' => $custom_taxterms
            )
        ),
    );
    $loop_portfolio = new WP_Query($argpps);

    if ($loop_portfolio->have_posts()) :
    ?>
        <div class=" scg__product__list swiper-container">
            <div class="swiper-wrapper">
                <?php
                while ($loop_portfolio->have_posts()) : $loop_portfolio->the_post(); ?>
                    <div class="swiper-slide product__box">
                        <div class="product__inner">
                            <a href="<?php the_permalink() ?>">
                                <div class="product__image">
                                    <?php
                                    if (has_post_thumbnail()) :
                                        the_post_thumbnail('large', ['class'   =>  'img-fluid', 'alt' =>  esc_attr(get_the_title())]);
                                    endif;
                                    ?>
                                </div>
                                <div class="product__content">
                                    <div class="header-box">
                                        <h3 class="title"><?php the_title(); ?></h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
<?php
    endif;
}
