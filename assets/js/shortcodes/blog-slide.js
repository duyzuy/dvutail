jQuery('.blog-slide').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    touchMove: true,
    swipe: true,
    prevArrow: '<span class="arrow arrow-back"><i class="sghome-icon sghome-back"></i></span>',
    nextArrow: '<span class="arrow arrow-next"><i class="sghome-icon sghome-next"></i></span>',
    responsive: [{ breakpoint: 1200, settings: { slidesToShow: 3 } }, { breakpoint: 992, settings: { slidesToShow: 3 } }, { breakpoint: 768, settings: { slidesToShow: 2 } }, { breakpoint: 350, settings: { slidesToShow: 1 } }]
});