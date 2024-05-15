<?php

$items = isset($args['items']) ? $args['items'] : array();

?>
<div class="section bg-[#F6F6F6] py-12">
    <div class="container mx-auto px-3 md:px-6 lg:px-8">
        <div class="flex flex-wrap justify-between gap-y-6 -mx-3">
            <?php
            $count = 0;
            foreach ($items as $key => $item) {

                if (
                    $count == 1 || $count == 3 || $count == 5
                ) {
                    $classes = "border-l border-orange-500";
                }

                if ($count == 2 || $count == 4) {
                    $classes = "lg:border-l border-orange-500";
                }
            ?>
                <div class="lg:w-1/6 w-1/2 px-3 <?php echo $classes ?>">
                    <span class="counter font-bold text-center">
                        <div class="block">
                            <span class="bg-gradient-to-t from-[#CC2027] via-[#EB7121] to-[#F48820] inline-block text-transparent bg-clip-text text-3xl lg:text-4xl xl:text-5xl">
                                <?php echo $item['counter'] ?>
                            </span>
                        </div>
                        <div class="block">
                            <span class="bg-gradient-to-t from-[#3B5AA7] via-[#3D85C5] to-[#3FA9DF] inline-block text-transparent bg-clip-text text-[16px] lg:text-lg xl:text-xl">
                                <?php echo $item['content'] ?>
                            </span>
                        </div>
                    </span>
                </div>
            <?php
                $count++;
            } ?>
        </div>
    </div>
</div>