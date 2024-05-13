<?php


?>
<div class="hero bg-gradient-to-t py-12 lg:py-24 px-3 lg:px-0 relative overflow-hidden from-[#3B5AA7] via-[#3D85C5] to-[#3FA9DF]">
    <div class="pattern absolute w-[18vw] h-[18vw] -top-[6vw] -right-[6vw] bg-no-repeat bg-cover bg-[url(<?php echo get_template_directory_uri() . "/assets/images/pattern-tr.svg" ?>)]"></div>
    <div class="pattern absolute w-[18vw] h-[18vw] -bottom-[6vw] -left-[6vw] bg-no-repeat bg-cover bg-[url(<?php echo get_template_directory_uri() . "/assets/images/pattern-bl.svg" ?>)]"></div>
    <div class="container mx-auto text-white mb-3 text-center max-w-5xl">
        <p class="font-bold text-xl lg:text-4xl mb-3 lg:mb-6"><?php echo isset($args['title']) ? $args['title'] : "" ?></p>
        <p class="text-[16px] lg:text-[18px] lg:px-14"><?php echo isset($args['description']) ? $args['description'] : "" ?></p>
    </div>
</div>