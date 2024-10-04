(function ($) {
    const homeSwiper = new Swiper(".dvuytail__swiper-product-featured", {
        // Optional parameters
        loop: true,
        slidesPerView: 2,
        spaceBetween: 12,
        autoplay: true,
        // If we need pagination
        pagination: {
            el: ".product__featured-slide-pagination",
        },
        // // Navigation arrows
        navigation: {
            nextEl: ".product__featured-slide-next",
            prevEl: ".product__featured-slide-prev",
        },
        breakpoints: {
            480: {
                slidesPerView: 3,
                spaceBetween: 12,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 24,
            },
            976: {
                slidesPerView: 5,
                spaceBetween: 16,
            },
        },
    });
})(jQuery);
