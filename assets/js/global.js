(function ($) {
    const slickArrowNext = `<span class="slick-next">
    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 40 41" fill="none">
        <g clip-path="url(#clip0_12_15528)">
        <path d="M20 39.25C30.3553 39.25 38.75 30.8553 38.75 20.5C38.75 10.1447 30.3553 1.75 20 1.75C9.64466 1.75 1.25 10.1447 1.25 20.5C1.25 30.8553 9.64466 39.25 20 39.25Z" stroke="url(#paint0_linear_12_15528)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M12.1875 20.5H27.8125" stroke="url(#paint1_linear_12_15528)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M21.5625 14.25L27.8125 20.5L21.5625 26.75" stroke="url(#paint2_linear_12_15528)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
        </g>
        <defs>
        <linearGradient id="paint0_linear_12_15528" x1="-14.75" y1="11.3752" x2="50.9999" y2="11.3752" gradientUnits="userSpaceOnUse">
        <stop stop-color="#3B5AA7"/>
        <stop offset="0.22" stop-color="#3B65AF"/>
        <stop offset="0.62" stop-color="#3D85C5"/>
        <stop offset="1" stop-color="#3FA9DF"/>
        </linearGradient>
        <linearGradient id="paint1_linear_12_15528" x1="5.52085" y1="20.7567" x2="32.9166" y2="20.7567" gradientUnits="userSpaceOnUse">
        <stop stop-color="#3B5AA7"/>
        <stop offset="0.22" stop-color="#3B65AF"/>
        <stop offset="0.62" stop-color="#3D85C5"/>
        <stop offset="1" stop-color="#3FA9DF"/>
        </linearGradient>
        <linearGradient id="paint2_linear_12_15528" x1="18.8958" y1="17.4584" x2="29.8542" y2="17.4584" gradientUnits="userSpaceOnUse">
        <stop stop-color="#3B5AA7"/>
        <stop offset="0.22" stop-color="#3B65AF"/>
        <stop offset="0.62" stop-color="#3D85C5"/>
        <stop offset="1" stop-color="#3FA9DF"/>
        </linearGradient>
        <clipPath id="clip0_12_15528">
        <rect width="40" height="40" fill="white" transform="translate(0 0.5)"/>
        </clipPath>
        </defs>
        </svg>
    </span>`;

    const slickArrowPrev = `<span class="slick-prev"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 40 41" fill="none"><g clip-path="url(#clip0_12_15483)"><path d="M20 1.75C9.64466 1.75 1.25 10.1447 1.25 20.5C1.25 30.8553 9.64466 39.25 20 39.25C30.3553 39.25 38.75 30.8553 38.75 20.5C38.75 10.1447 30.3553 1.75 20 1.75Z" stroke="url(#paint0_linear_12_15483)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M27.8125 20.5L12.1875 20.5" stroke="url(#paint1_linear_12_15483)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.4375 26.75L12.1875 20.5L18.4375 14.25" stroke="url(#paint2_linear_12_15483)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
    </g>
    <defs>
    <linearGradient id="paint0_linear_12_15483" x1="54.75" y1="29.6248" x2="-10.9999" y2="29.6248" gradientUnits="userSpaceOnUse">
    <stop stop-color="#3B5AA7"/>
    <stop offset="0.22" stop-color="#3B65AF"/>
    <stop offset="0.62" stop-color="#3D85C5"/>
    <stop offset="1" stop-color="#3FA9DF"/>
    </linearGradient>
    <linearGradient id="paint1_linear_12_15483" x1="34.4792" y1="20.2433" x2="7.08337" y2="20.2433" gradientUnits="userSpaceOnUse">
    <stop stop-color="#3B5AA7"/>
    <stop offset="0.22" stop-color="#3B65AF"/>
    <stop offset="0.62" stop-color="#3D85C5"/>
    <stop offset="1" stop-color="#3FA9DF"/>
    </linearGradient>
    <linearGradient id="paint2_linear_12_15483" x1="21.1042" y1="23.5416" x2="10.1458" y2="23.5416" gradientUnits="userSpaceOnUse">
    <stop stop-color="#3B5AA7"/>
    <stop offset="0.22" stop-color="#3B65AF"/>
    <stop offset="0.62" stop-color="#3D85C5"/>
    <stop offset="1" stop-color="#3FA9DF"/>
    </linearGradient>
    <clipPath id="clip0_12_15483">
    <rect width="40" height="40" fill="white" transform="translate(40 40.5) rotate(-180)"/>
    </clipPath>
    </defs>
    </svg></span>`;

    const slickArrowNextWhite = `<span class="slick-next">
    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41" fill="none">
    <g clip-path="url(#clip0_1_4765)">
    <path d="M20 39.25C30.3553 39.25 38.75 30.8553 38.75 20.5C38.75 10.1447 30.3553 1.75 20 1.75C9.64466 1.75 1.25 10.1447 1.25 20.5C1.25 30.8553 9.64466 39.25 20 39.25Z" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M12.1875 20.5H27.8125" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M21.5625 14.25L27.8125 20.5L21.5625 26.75" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
    </g><defs><clipPath id="clip0_1_4765"><rect width="40" height="40" fill="white" transform="translate(0 0.5)"/></clipPath></defs></svg></span>`;

    const slickArrowPrevWhite = `<span class="slick-prev"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
    <g clip-path="url(#clip0_121_16832)">
    <path d="M20 1.25C9.64466 1.25 1.25 9.64466 1.25 20C1.25 30.3553 9.64466 38.75 20 38.75C30.3553 38.75 38.75 30.3553 38.75 20C38.75 9.64466 30.3553 1.25 20 1.25Z" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M27.8125 20L12.1875 20" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.4375 26.25L12.1875 20L18.4375 13.75" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
    </g><defs><clipPath id="clip0_121_16832"><rect width="40" height="40" fill="white" transform="matrix(-1 0 0 -1 40 40)"/></clipPath></defs></svg></span>`;

    $(".dvu__home-slider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        prevArrow:
            '<span class="slick-prev "><span class="dvu-icon size-16"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/></svg></span></span>',
        nextArrow:
            '<span class="slick-next "><span class="dvu-icon size-16"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/></svg></span></span>',
        autoplay: true,
        autoplaySpeed: 8000,
        dots: true,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    arrows: false,
                },
            },
        ],
    });

    $(".dvu__slider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        prevArrow: slickArrowPrev,
        nextArrow: slickArrowNext,
        autoplay: true,
        autoplaySpeed: 8000,
        dots: true,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    arrows: false,
                },
            },
        ],
    });

    $(".partner__section-slider").slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: true,
        prevArrow: slickArrowPrev,
        nextArrow: slickArrowNext,
        autoplay: true,
        arrows: true,
        autoplaySpeed: 8000,
        // dots: true,
        // centerPadding: "150px",
        // centerMode: true,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    arrows: false,
                    centerMode: false,
                    slidesToShow: 4,
                },
            },
            {
                breakpoint: 992,
                settings: {
                    arrows: false,
                    centerMode: false,
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 650,
                settings: {
                    arrows: false,
                    centerMode: false,
                    slidesToShow: 2,
                },
            },
        ],
    });

    $(".latest__news-slider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        prevArrow: slickArrowPrev,
        nextArrow: slickArrowNext,
        autoplay: true,
        arrows: false,
        autoplaySpeed: 8000,
        vertical: true,
        dots: true,
        // centerPadding: "150px",
        // centerMode: true,
    });

    /**shortcode popup content */

    $(".article__report-tab-panel").on(
        "click",
        ".article__report-tab",
        function (e) {
            const panelContainer = $(this).parents(
                ".article__report-tab-panel"
            );

            panelContainer.find(".article__report-tab").removeClass("active");
            panelContainer.find(".article__report-panel").removeClass("active");

            $(this).addClass("active");
            const tabId = $(this).data("article-tab");
            panelContainer
                .find("[data-article-panel=" + tabId + "]")
                .addClass("active");
        }
    );

    $(".dvu__report-container").on(
        "click",
        ".dvu__report-tab-item",
        function () {
            $(".dvu__report-tab-item").removeClass("active");
            $(this).addClass("active");
            const tabName = $(this).data("tab");
            $(this)
                .parents(".dvu__report-container ")
                .find(".dvu__report-panel")
                .removeClass("active");
            $(this)
                .parents(".dvu__report-container ")
                .find("[data-panel=" + tabName + "]")
                .addClass("active");
        }
    );
})(jQuery);
