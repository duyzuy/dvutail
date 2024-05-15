<div class="header bg-[url(<?php echo get_template_directory_uri() . '/assets/images/header-img-5.jpg' ?>)] page-header bg-center bg-cover md:h-[250px] lg:h-[350px] 2xl:h-[500px] flex items-center">
    <div class="container mx-auto lg:py-6 px-0 md:px-6 lg:px-8">
        <div class="page__title bg-gradient-to-r from-[#CC2027]/80 via-[#E15723]/80 to-transparent pl-4 pr-16 py-6 md:py-3 lg:pl-12 lg:py-8 lg:pr-16 xl:pl-12 xl:py-8 2xl:pr-24 w-fit uppercase">
            <h1 class="entry-title text-white font-bold text-2xl lg:text-4xl 2xl:text-6xl"><?php is_tax() ?  single_term_title() : post_type_archive_title(); ?></h1>
        </div>
    </div>
</div>