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

    $(".sgh-js-cate-mobile, .btn__mobile-primary-menu > .bar-item").on(
        "click",
        function (e) {
            e.preventDefault();
            $(".sgh__js-action").addClass("active");
            $(".sgh__js-action").parent("body").css({ overflow: "hidden" });
            $(".wrap__sgh-cat").animate(
                {
                    left: "0px",
                    opacity: "1",
                },
                240,
                "linear",
                function () {}
            );
        }
    );

    $(".sgh__js-close-cate").on("click", function () {
        $(".wrap__sgh-cat").animate(
            {
                left: "-320px",
                opacity: "0",
            },
            240,
            "linear",
            function () {
                $(".sgh__js-action").removeClass("active");
                $(".sgh__js-action").parent("body").removeAttr("style");
            }
        );
    });

    $(".sgh-cat-mobile .sghome-next").each(function () {
        $(this).click(function (e) {
            e.preventDefault();
            $(this).parent("a").parent("li").toggleClass("show-child");
        });
    });

    // var header = $("#main-header");
    // var headerHeight = header.height();
    // var mainslide = $("#section-main");

    // if (mainslide) {
    //     var mainslideHeight = mainslide.height();
    //     var totalHeight = headerHeight + mainslideHeight;
    // }

    // $(window).on("scroll", function () {
    //     var windowScroll = $(this).scrollTop();
    //     if (windowScroll > headerHeight) {
    //         header.parent(".wrapper").addClass("fixed_header");
    //         header.height(headerHeight);
    //         if (totalHeight) {
    //             if (windowScroll > totalHeight) {
    //                 $("#bottom-header").addClass("show-bottom");
    //             } else {
    //                 if ($("#bottom-header").hasClass("show-bottom")) {
    //                     $("#bottom-header").removeClass("show-bottom");
    //                 }
    //             }
    //         }
    //     } else {
    //         if (header.parent(".wrapper").hasClass("fixed_header")) {
    //             header.parent(".wrapper").removeClass("fixed_header");
    //             header.removeAttr("style");
    //         }
    //         if ($("#bottom-header").hasClass("show-bottom")) {
    //             $("#bottom-header").removeClass("show-bottom");
    //         }
    //     }
    // });

    // //banner scroll
    // var banner = $(".banner_sgsv");
    // var shop = $("#sgh-main-shop");
    // if (banner.length > 0) {
    //     var bannerHeight = $(".banner_sgsv").height();
    //     var bannerOfsetTop = banner.offset().top;
    //     var footerOfset = $("#main-footer").offset().top;

    //     $(window).on("scroll", function () {
    //         var windowScroll = $(this).scrollTop();

    //         if (windowScroll > bannerOfsetTop) {
    //             if (shop.length > 0) {
    //                 banner.css("top", windowScroll - 100 + "px");
    //                 if (windowScroll + bannerHeight + 180 > footerOfset) {
    //                     banner.css("top", "-70px");
    //                 }
    //             } else {
    //                 banner.css("top", windowScroll - 30 + "px");
    //                 if (windowScroll + bannerHeight + 420 > footerOfset) {
    //                     banner.css("top", "0px");
    //                 }
    //             }
    //         } else {
    //             if (shop.length > 0) {
    //                 banner.css("top", "-70px");
    //             } else {
    //                 banner.css("top", "0px");
    //             }
    //         }
    //     });
    // }

    // /**
    //  *
    //  * tab login myaccount
    //  *
    //  */
    // const btnItemTabs = $(".dvu__auth-nav-items .nav-item");

    // btnItemTabs.on("click", function () {
    //     const _that = $(this)[0];

    //     const tabName = _that.getAttribute("data-tab");

    //     const parent = $(_that)
    //         .parent(".dvu__auth-nav-items")
    //         .parent(".dvu__auth-nav-tabs")
    //         .parent(".dvu__login-register-forms");

    //     const pannel = $(parent).find('div[data-panel="' + tabName + '"]');

    //     if ($(_that).hasClass("active")) {
    //         return;
    //     } else {
    //         btnItemTabs.each(function () {
    //             $(this).removeClass("active");
    //         });

    //         parent.find('div[data-role="panel').each(function () {
    //             $(this).addClass("d-none");
    //         });
    //         $(_that).addClass("active");
    //         $(pannel).removeClass("d-none");
    //     }
    // });

    // //write plugin javascript
    // $.fn.modal = function (opt) {
    //     var settings, createModal, body, closeModal;
    //     settings = $.extend(
    //         {
    //             modal: "js-modal",
    //             close: "js-modal-close",
    //             closeText: "",
    //             overlay: "js-modal-overlay",
    //             modalContainer: "js-modal-container",
    //             modalContent: "neo-modal-content",
    //             animate: "transform: scale(.6); opacity: 0",
    //         },
    //         opt
    //     );
    //     body = $("body");
    //     closeModal = function (overlay, modal) {
    //         modal.remove();
    //         overlay.remove();
    //     };
    //     createModal = function (data) {
    //         var overlay, close, modal, modalContainer, modalContent;
    //         overlay = $("<div></div>", {
    //             class: settings.overlay,
    //             style: "opacity: 0",
    //         }).animate({ opacity: 1 }, 300, function () {});
    //         modal = $("<div></div>", {
    //             class: settings.modal,
    //         });
    //         modalContainer = $("<div></div>", {
    //             class: settings.modalContainer,
    //             style: settings.animate,
    //         }).animate(
    //             {
    //                 opacity: 1,
    //             },
    //             300,
    //             function () {
    //                 $(this).css({ transform: "scale(1)" });
    //             }
    //         );
    //         close = $("<span></span>", {
    //             html: settings.closeText,
    //             class: settings.close,
    //         }).on("click", function () {
    //             closeModal(modal, overlay);
    //         });
    //         modalContent = $("<div></div>", {
    //             html: data,
    //             class: "neo-modal-content",
    //         });
    //         modalContainer.prepend(close, modalContent);
    //         modal.append(modalContainer);
    //         body.prepend(overlay, modal);
    //     };

    //     this.on("click", function (e) {
    //         var self = $(this);
    //         var proid = self.data("pid");
    //         self.addClass("loading");
    //         e.preventDefault();
    //         $.ajax({
    //             url: object.ajaxurl,
    //             type: "GET",
    //             data: {
    //                 product: proid,
    //                 action: "neo_quick_view",
    //             },
    //             success: function (data) {
    //                 setTimeout(function () {
    //                     self.removeClass("loading");
    //                     createModal(data);
    //                 }, 1000);
    //             },
    //             error: function () {
    //                 createModal("no post please try again");
    //             },
    //         });
    //     });
    // };

    // $(".sgh__js-quick-view").modal({
    //     modal: "neo-modal",
    //     close: "neo-close-modal",
    //     closeText: "x",
    //     overlay: "js-overlay-modal",
    //     modalContainer: "neo-modal-container",
    //     modalContent: "neo-modal-content",
    // });

    // showDescription()

    //countdown

    // var promotionDay = $(".promotion__day");

    // promotionDay.each(function () {
    //     if (promotionDay != "") {
    //         var promotionTime, day, minute, second, today, time, timeRemain, x;
    //         promotionTime = promotionDay.data("prtime");

    //         // time = Date.parse(promotionTime);
    //         // time = new Date("Mar 19 2020 00:00:00").getTime();
    //         // time = new Date(promotionTime +'UTC+7').getTime();
    //         time = new Date(changeDateFormat(promotionTime)).getTime();

    //         x = setInterval(() => {
    //             today = new Date().getTime();

    //             timeRemain = time - today;

    //             if (timeRemain > 0) {
    //                 day = Math.floor(timeRemain / (24 * 60 * 60 * 1000));
    //                 hour = Math.floor(
    //                     (timeRemain % (24 * 60 * 60 * 1000)) / (1000 * 60 * 60)
    //                 );
    //                 minute = Math.floor(
    //                     (timeRemain % (60 * 60 * 1000)) / (1000 * 60)
    //                 );
    //                 second = Math.floor((timeRemain % (60 * 1000)) / 1000);

    //                 $("#countdown__time").find("span.days").html(day);
    //                 $("#countdown__time").find("span.hours").html(hour);
    //                 $("#countdown__time").find("span.minutes").html(minute);
    //                 $("#countdown__time").find("span.seconds").html(second);
    //             } else if (timeRemain <= 0) {
    //                 $("#countdown__time").find("span.days").html("0");
    //                 $("#countdown__time").find("span.hours").html("00");
    //                 $("#countdown__time").find("span.minutes").html("00");
    //                 $("#countdown__time").find("span.seconds").html("00");
    //                 clearInterval(x);
    //             }
    //         }, 1000);
    //     }
    // });

    // var btnHotline = document.getElementsByClassName("btn_hotline");

    // var popupHotline = document.getElementById("popup_hotline");
    // for (var i = 0; i < btnHotline.length; i++) {
    //     $(btnHotline[i]).on("click", function (e) {
    //         e.preventDefault();
    //         if (!popupHotline.classList.contains("active")) {
    //             popupHotline.classList.add("active");
    //         } else {
    //             popupHotline.classList.remove("active");
    //         }
    //     });
    // }

    // popupHotline.addEventListener("click", function (e) {
    //     if (e.target.classList[0] == "popup_wrap") {
    //         popupHotline.classList.remove("active");
    //     }
    // });

    // var closePopup = document.getElementsByClassName("close_popup");
    // for (var i = 0; i < closePopup.length; i++) {
    //     $(closePopup[i]).on("click", function (e) {
    //         e.preventDefault();
    //         this.parentElement.parentElement.parentElement.classList.remove(
    //             "active"
    //         );
    //     });
    // }

    // var btnChat = document.getElementsByClassName("btn_chat");
    // var popupChat = document.getElementById("popup_chat");
    // for (var i = 0; i < btnChat.length; i++) {
    //     $(btnChat[i]).on("click", function (e) {
    //         e.preventDefault();
    //         if (!popupChat.classList.contains("active")) {
    //             popupChat.classList.add("active");
    //         } else {
    //             popupChat.classList.remove("active");
    //         }
    //     });
    // }
    // popupChat.addEventListener("click", function (e) {
    //     if (e.target.classList[0] == "popup_wrap") {
    //         popupChat.classList.remove("active");
    //     }
    // });

    // var btnExpand = document.getElementsByClassName("btn-text-expand");
    // for (var i = 0; i < btnChat.length; i++) {
    //     $(btnExpand[i]).on("click", function (e) {
    //         e.preventDefault();
    //         const wrapper = $(this).parent().parent();

    //         wrapper.find(".dvu__single-product-description")[0].style.height =
    //             wrapper.find(".dvu__single-product-description")[0]
    //                 .scrollHeight + "px";
    //         wrapper.addClass("expanded");
    //     });
    // }
})(jQuery);

// function changeDateFormat(inputDate) {
//     // expects Y-m-d
//     var splitDate = inputDate.split("-");
//     if (splitDate.count == 0) {
//         return null;
//     }

//     var year = splitDate[0];
//     var month = splitDate[1];
//     var day = splitDate[2];

//     return month + "/" + day + "/" + year;
// }

// function addCompare(e, obj) {
//     e.preventDefault();
//     var button = jQuery(".sgh__js-compare");
//     var containerbar = jQuery(".js-bar-compare-container");
//     var product_id = obj.id;
//     var parent_selft = button.parent(".sgh-compare-" + product_id);
//     var self = parent_selft.children(".sgh__js-compare");

//     self.addClass("loading");
//     jQuery.ajax({
//         url: object.ajaxurl,
//         type: "GET",
//         data: {
//             product_id: product_id,
//             action: "neo_compare_add_product",
//         },
//         success: function (data) {
//             var response, messange, product, number_product, bar, status;
//             response = JSON.parse(data);
//             messange = response.mess;
//             status = response.status;
//             product = response.product_ids;
//             number_product = response.number;
//             bar = jQuery("div.js-wrap-bar");
//             contentwrap = jQuery(".neo-bar-compare-content");
//             if (status == "success") {
//                 setTimeout(function () {
//                     self.removeClass("loading");
//                     if (!containerbar.hasClass("show")) {
//                         containerbar.addClass("show");
//                     }
//                     parent_selft.append(
//                         "<span class='neo-compare added' title='Đã thêm' action='remove'><i class='sghome-icon sghome-arrows-2'></i></span>"
//                     );
//                     parent_selft.children(".sgh__js-compare").remove();
//                     contentwrap.html("");
//                     contentwrap.append(product);
//                 }, 1000);
//             } else {
//                 setTimeout(function () {
//                     alert(messange);
//                 }, 300);
//                 self.removeClass("loading");
//             }
//         },
//         error: function () {
//             contentwrap.append(
//                 "Không thể thêm sản phẩm để so sánh vào lúc này"
//             );
//         },
//     });
// }

// function removeProduct() {
//     var button = jQuery(".sgh__js-remove-compare");
//     var product_id = button.parent(".wrap-compare-product").data("id");
//     var parent_self = button.parent(".wrap-compare-id-" + product_id);
//     jQuery.ajax({
//         url: object.ajaxurl,
//         type: "GET",
//         data: {
//             product_id: product_id,
//             action: "neo_compare_remove_product_item",
//         },
//         success: function (data) {
//             parent_self.remove();
//             jQuery(".sgh-compare-" + product_id).html("");
//             jQuery(".sgh-compare-" + product_id).append(
//                 '<a id="' +
//                     product_id +
//                     '" href="#" class="neo-compare compare-product sgh__js-compare" onclick="addCompare(event, this)" title="so sánh"><i class="sghome-icon sghome-diagram"></i><i class="loading-icon sgh-loading"></i></a>'
//             );
//             if (jQuery(".list-compare-products-bar").html() == "") {
//                 jQuery(".neo-bar-compare-content").html("");
//                 jQuery(".js-bar-compare-container").removeClass("show");
//             }
//         },
//         error: function () {
//             console.log("khong the xoa vao luc nay");
//         },
//     });
// }

// function showDescription() {
//     jQuery(".dynamic_showmore").addClass("hidden");
//     jQuery(".woocommerce-products-header")
//         .children(".term-description")
//         .addClass("show");
// }

// //lazy loading iamge

// const images = document.querySelectorAll(".dvu-product-thumbnail img");

// const imgOptions = {
//     rootMargin: "0px",
//     threshold: [0, 0.25, 0.5, 0.75, 1],
// };

// function preloadImage(image) {
//     const src = image.getAttribute("data-src");

//     image.src = src;
// }

// const callbackfunction = (entries, observe) => {
//     entries.forEach((entry) => {
//         if (!entry.isIntersecting) {
//             if (entry.target.src === "") {
//                 entry.target.style = "opacity: 0";
//             }

//             return;
//         } else {
//             preloadImage(entry.target);
//             entry.target.style = "opacity: 1";
//         }
//     });
// };

// const imgsObserver = new IntersectionObserver(callbackfunction, imgOptions);

// images.forEach((image) => {
//     imgsObserver.observe(image);
// });

//server worker

// if('serviceWorker' in navigator){
//     window.addEventListener('load', function(){

//         navigator.serviceWorker
//             .register('./wp-content/themes/sgsv/assets/onesignal/OneSignalSDKWorker.js', {scope: './wp-content/themes/sgsv/assets/onesignal/OneSignalSDKWorker'})
//             .then(reg => console.log('Registered'))
//             .catch(error => console.log('error:' + error));
//     })
// }
