<?php

$items = isset($args['items']) ? $args['items'] : array();

?>
<div class="section lg:py-24 py-12">
    <div class="container mx-auto px-3 md:px-6 lg:px-8 xl:max-w-7xl">
        <div class="header text-center mb-8">
            <h1 class="text-3xl lg:text-5xl font-bold text-gray-800"><span class="bg-gradient-to-r bg-clip-text from-orange-600 to-orange-400 uppercase text-transparent">tại sao chọn</span> iTECH EXPO?</h1>
        </div>
        <div class="boxes flex justify-center flex-wrap gap-y-6 -mx-3">
            <?php foreach ($items as $key => $item) {

                $classes = $item['color'] === 'orange' ? 'from-[#CC2027] via-[#EB7121] to-[#F48820]' : 'from-[#3B5AA7] ia-[#3D85C5] to-[#3FA9DF]';
                $bg_color = $item['color'] === 'orange' ? 'bg-[#FFF6EF]' : 'bg-[#F2FBFE]';
                $pattern = $item['color'] === 'orange' ? 'bg-[url(' . get_template_directory_uri() . "/assets/images/pattern-br-orange.svg" . ')]' : 'bg-[url(' . get_template_directory_uri() . "/assets/images/pattern-br.svg" . ')]';
            ?>
                <div class="w-full sm:w-1/2 lg:w-1/3 px-3">
                    <div class="box-item bg-gradient-to-t p-[2px] relative h-full <?php echo $classes; ?>">
                        <div class="inner px-6 py-6 overflow-hidden relative h-full <?php echo $bg_color; ?>">
                            <span class="bg-gradient-to-t inline-block text-transparent bg-clip-text text-4xl lg:text-5xl font-bold mb-3 <?php echo $classes ?>"><?php echo $item['number']; ?></span>
                            <div class="description">
                                <p class="text-14px lg:text-[16px]"><?php echo $item['content']; ?></p>
                            </div>
                            <div class="absolute w-[86px] h-[86px] -bottom-[30px] -right-[30px] z-10 bg-no-repeat bg-cover <?php echo $pattern; ?>"></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>