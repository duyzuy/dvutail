<?php


global $post;

$categories =  get_the_category($post->ID);

?>
<div class="dvu__single mx-auto container px-3 md:px-6 lg:px-8 py-12 xl:max-w-7xl">
    <div class="dvu__single-head">
        <?php the_title('<h1 class="bg-gradient-to-tr from-[#CC2027] via-[#EB7121] to-[#F48820] inline-block text-transparent bg-clip-text text-2xl lg:text-4xl font-bold">', '</h1>', true); ?>
        <div class="post-meta flex items-center mb-6">
            <?php single_post_meta(); ?>
            <div class="flex items-center ml-3">
                <span class="mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 21 21" fill="none">
                        <path d="M0.969375 9.96937C0.828988 9.82883 0.750092 9.63834 0.75 9.43969V0.75H9.43969C9.63834 0.750092 9.82883 0.828988 9.96937 0.969375L19.2806 10.2806C19.4212 10.4213 19.5001 10.612 19.5001 10.8108C19.5001 11.0096 19.4212 11.2003 19.2806 11.3409L11.3438 19.2806C11.2031 19.4212 11.0124 19.5001 10.8136 19.5001C10.6148 19.5001 10.4241 19.4212 10.2834 19.2806L0.969375 9.96937Z" stroke="url(#paint0_linear_67_10343)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <defs>
                            <linearGradient id="paint0_linear_67_10343" x1="-5.54428" y1="21.308" x2="10.9611" y2="21.308" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#CC2027" />
                                <stop offset="0.11" stop-color="#D23125" />
                                <stop offset="0.37" stop-color="#E15723" />
                                <stop offset="0.62" stop-color="#EB7121" />
                                <stop offset="0.83" stop-color="#F18220" />
                                <stop offset="1" stop-color="#F48820" />
                            </linearGradient>
                        </defs>
                    </svg>
                </span>
                <ul class="cat-items gap-x-2 flex items-center">
                    <?php foreach ($categories as $key => $cat) {
                        $count = 0;
                        $link = get_term_link($cat->term_id);
                    ?>
                        <?php if ($count !== 0) : ?>
                            <li class="text-xs text-gray-400">|</li>
                        <?php endif  ?>

                        <li>
                            <a href="<?php echo $link ?>" itemprop="item" class="text-[#EB7121]">
                                <?php echo $cat->name;  ?>
                            </a>
                        </li>

                    <?php $count++;
                    } ?>
                </ul>
            </div>
        </div>
        <?php if (has_post_thumbnail()) :
            $url = get_the_post_thumbnail_url(); ?>
            <div class="single_post-thumb mb-6">
                <img src="<?php echo $url ?>" alt="<?php the_title() ?>" />
            </div>
        <?php endif;
        ?>
    </div>
    <div class="dvu__single-body mb-12">
        <?php the_content() ?>
    </div>
    <div class="border-t pt-6">
        <?php dvu_post_related(); ?>
    </div>
</div>