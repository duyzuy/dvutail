<?php

$items = isset($args['items']) ? $args['items'] : array();

?>
<div class="news__section py-12 lg:py-24">
    <div class="container mx-auto px-3 lg:px-0">
        <div class="news__section-title text-center mb-9">
            <h3 class="bg-gradient-to-tr from-[#CC2027] via-[#EB7121] to-[#F48820] inline-block text-transparent bg-clip-text text-3xl lg:text-5xl uppercase font-bold">tin tức</h3>
        </div>
        <div class="news__section-body">
            <div class="flex flex-wrap -mx-3 gap-y-6">
                <?php foreach ($items as $key => $item) {
                    $classes =  "from-[#CC2027] via-[#D23125] via-[#E15723] via-[#EB7121] to-[#F48820]";
                    $stroke_color = "#F26D21";
                ?>
                    <div class="md:w-1/2 lg:w-1/4 px-3">
                        <div class="article shadow-md">
                            <div class="inner">
                                <div class="article__post-thumbnail mb-3">
                                    <img src="<?php echo $item['thumbnail']; ?>" alt="image" />
                                </div>
                                <div class="article__post-body px-3 pb-6">
                                    <div class="post-meta flex gap-x-3 py-3">
                                        <span class="date inline-flex items-center text-[#929292]">
                                            <span class="mr-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                                    <path d="M6.60759 3.96407V2.20227M14.5357 3.96407V2.20227M6.60759 7.48768H14.5357M3.96489 18.0585H17.1784C17.6649 18.0585 18.0593 17.6641 18.0593 17.1776V4.84498C18.0593 4.35847 17.6649 3.96407 17.1784 3.96407H3.96489C3.47838 3.96407 3.08398 4.35847 3.08398 4.84498V17.1776C3.08398 17.6641 3.47838 18.0585 3.96489 18.0585Z" stroke="#929292" stroke-width="1.58562" stroke-linecap="round" />
                                                </svg>
                                            </span>
                                            <span><?php echo $item['date']; ?></span>
                                        </span>
                                        <span class="author inline-flex items-center text-[#929292]">
                                            <span class="mr-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                                    <path d="M5.01305 16.8276C6.20147 15.0915 8.15698 13.9635 10.5707 13.9635C12.9845 13.9635 14.94 15.0915 16.1284 16.8276M5.01305 16.8276C6.49103 18.1414 8.43768 18.9394 10.5707 18.9394C12.7037 18.9394 14.6504 18.1414 16.1284 16.8276M5.01305 16.8276C3.28858 15.2947 2.20215 13.0597 2.20215 10.5708C2.20215 5.949 5.94888 2.20227 10.5707 2.20227C15.1925 2.20227 18.9393 5.949 18.9393 10.5708C18.9393 13.0597 17.8529 15.2947 16.1284 16.8276M13.6539 8.80904C13.6539 10.5118 12.2735 11.8922 10.5707 11.8922C8.86793 11.8922 7.48756 10.5118 7.48756 8.80904C7.48756 7.10625 8.86793 5.72588 10.5707 5.72588C12.2735 5.72588 13.6539 7.10625 13.6539 8.80904Z" stroke="#929292" stroke-width="1.58562" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <span><?php echo $item['author']; ?></span>
                                        </span>
                                    </div>
                                    <h3 class="line-clamp-2 mb-3 text-[20px] font-bold"><?php echo $item['title'] ?></h3>
                                    <p class="line-clamp-3 mb-6 text-gray-700"><?php echo $item['excerpt'] ?></p>
                                    <a href="<?php echo $item['href'] ?>" class="bg-gradient-to-r inline-flex text-transparent bg-clip-text text-[16px] font-[500] <?php echo  $classes; ?>">
                                        <?php esc_html_e("Xem thêm", 'dvutheme') ?>
                                        <span class="ml-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                                                <path d="M13.1143 22.1989C18.3686 22.1989 22.6281 17.9394 22.6281 12.6851C22.6281 7.43083 18.3686 3.17139 13.1143 3.17139C7.86003 3.17139 3.60059 7.43083 3.60059 12.6851C3.60059 17.9394 7.86003 22.1989 13.1143 22.1989Z" stroke="<?php echo $stroke_color ?>" stroke-width="1.58562" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M11.5293 8.7207L15.4934 12.6848L11.5293 16.6488" stroke="<?php echo $stroke_color ?>" stroke-width="1.58562" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>