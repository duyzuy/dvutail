(function ($) {
    const homeSwiper = new Swiper(".home__swiper-slider", {
        // Optional parameters

        loop: true,
        slidesPerView: 1,
        spaceBetween: 24,
        autoplay: true,
        pagination: {
            el: ".home__swiper-slider-pagination",
        },

        // Navigation arrows
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            480: {
                slidesPerView: 1,
                spaceBetween: 8,
            },
            768: {
                slidesPerView: 2,
            },
            976: {
                slidesPerView: 3,
            },
        },
    });

    new Swiper(".primary__menu-swiper", {
        slidesPerView: "auto",
        spaceBetween: 8,
        freeMode: true,
        // autoplay: true,
        navigation: {
            nextEl: ".header-swiper-button-next",
            prevEl: ".header-swiper-button-prev",
        },
    });

    new Swiper(".dvutail-product-brand__swiper", {
        slidesPerView: "auto",
        spaceBetween: 8,
        freeMode: true,
        // autoplay: true,
    });
    new Swiper(".dvutail-product-category__swiper", {
        slidesPerView: "auto",
        spaceBetween: 8,
        freeMode: true,
        grid: {
            rows: 2,
        },
        // autoplay: true,
    });

    var singleProductGalleryThumbnail = new Swiper(
        ".single-product-gallery-thumbs",
        {
            loop: true,
            spaceBetween: 10,
            slidesPerView: "auto",
            freeMode: true,
            watchSlidesProgress: true,
            direction: "vertical",
        }
    );
    new Swiper(".single-product-gallery__desktop", {
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: singleProductGalleryThumbnail,
        },
    });

    new Swiper(".single-product-gallery__mobile", {
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            dynamicBullets: true,
        },
    });

    /**
     * Handle vertical menu Desktop and mobile
     */

    $(".header__bottom-menu-cat").on(
        "click",
        ".js__menu-vertical-button",
        function () {
            const menuVerticalContainer = $(this).parents(
                ".header__bottom-menu-cat"
            );
            if (menuVerticalContainer.hasClass("show")) {
                $("body").removeAttr("style");
                menuVerticalContainer.removeClass("show");
            } else {
                $("body").css({
                    overflowY: "hidden",
                    "touch-action": "none",
                    paddingRight: "15px",
                });
                menuVerticalContainer.addClass("show");
            }
        }
    );
    $(".vertical__menulist-tabs").on("click", ".menu__tab-item", function () {
        const tabId = $(this).data("tab-id");

        const panelsWraper = $(this)
            .parents(".vertical__menulist-items")
            .find(".vertical__menulist-panels");
        const tabsWraper = $(this)
            .parents(".vertical__menulist-items")
            .find(".vertical__menulist-tabs");

        const panelItems = panelsWraper.find(".vertical__panel-item");
        const tabItems = tabsWraper.find(".menu__tab-item");

        Object.keys(panelItems).forEach((index) => {
            $(panelItems[index]).removeClass("active");
        });

        Object.keys(tabItems).forEach((index) => {
            $(tabItems[index]).removeClass("active");
            $(tabItems[index]).removeClass("bg-slate-100");
        });

        tabsWraper
            .find("[data-tab-id=" + tabId + "]")
            .addClass("bg-slate-100 active");

        panelsWraper
            .find("[data-panel-id=" + tabId + "]")
            .removeClass("hidden")
            .addClass("active");
    });

    /**
     * hanlde Hamburger mobile menu
     */
    const hambugerMenuButton = $(".js__btn-primary-menu-mobile");
    const closeMobileMenuButton = $(".js__close-menu-mobile");
    const primaryMobileMenu = $(".menu-primary-mobile");

    primaryMobileMenu.on("click", ".overlay", function () {
        $("body").removeAttr("style");
        primaryMobileMenu.removeClass("show");
    });
    hambugerMenuButton.on("click", function () {
        $("body").css({
            overflowY: "hidden",
            "touch-action": "none",
        });
        primaryMobileMenu.addClass("show");
    });
    closeMobileMenuButton.on("click", function () {
        $("body").removeAttr("style");
        primaryMobileMenu.removeClass("show");
    });

    /**
     * Collapse content single product
     */

    $(".btn-shorted").on("click", function () {
        $(this)
            .parents(".dvu__single-product-description")
            .toggleClass("h-[220px] overflow-hidden");
        $(this).parents(".dvu__single-product-expand").hide();
    });

    $(".quantity").each(function () {
        var spinner = $(this),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find(".quantity-up"),
            btnDown = spinner.find(".quantity-down"),
            min = input.attr("min"),
            max = input.attr("max");

        btnUp.click(function () {
            var oldValue = parseFloat(input.val());
            if (max && oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

        btnDown.click(function () {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });
    });

    /**
     * Handle sticky header
     */
    const headerMain = document.getElementById("main-header");
    const headerHeight = headerMain.offsetHeight;
    const DIRECTION_TYPE = {
        UP: "up",
        DOWN: "down",
    };
    let scrollYPosition = 0;
    let scrollHeightStart = 0;
    let startOfPosition = 0;
    let direction = "up";

    window.addEventListener("scroll", function (ev) {
        if (!headerHeight) return;
        if (this.innerWidth > 760) return;

        const pageScrollY = this.scrollY;

        if (pageScrollY > scrollYPosition) {
            if (direction !== DIRECTION_TYPE.DOWN) {
                scrollHeightStart = 0;
                startOfPosition = pageScrollY;
            }
            if (pageScrollY - startOfPosition > headerHeight) {
                headerMain.classList.add("sticky");
                headerMain.classList.add("top-0");
            }
            scrollHeightStart = pageScrollY;
            direction = DIRECTION_TYPE.DOWN;
        }

        if (pageScrollY < scrollYPosition) {
            if (direction !== DIRECTION_TYPE.UP) {
                scrollHeightStart = 0;
                startOfPosition = pageScrollY;
            }
            if (startOfPosition - pageScrollY > headerHeight) {
                headerMain.classList.remove("sticky");
                headerMain.classList.remove("top-0");
            }

            scrollHeightStart = pageScrollY;
            direction = DIRECTION_TYPE.UP;
        }

        scrollYPosition = pageScrollY;
    });
})(jQuery);

(async function () {
    /**
     *
     * pwa
     */
    const standalone = window.matchMedia("(display-mode: standalone)").matches;

    window.addEventListener("DOMContentLoaded", () => {
        window
            .matchMedia("(display-mode: standalone)")
            .addEventListener("change", (evt) => {
                let displayMode = "browser";
                if (evt.matches) {
                    displayMode = "standalone";
                }
                // Log display mode change to analytics
                console.log("DISPLAY_MODE_CHANGED", displayMode);
            });
    });

    const UA = navigator.userAgent;
    const IOS = UA.match(/iPhone|iPad|iPod/);
    const ANDROID = UA.match(/Android/);

    const PLATFORM = IOS ? "ios" : ANDROID ? "android" : "unknown";

    const INSTALLED = !!(standalone || (IOS && !UA.match(/Safari/)));

    const isMobile = IOS || ANDROID;

    if (isMobile) {
        const installed = await getInstalledRelatedApp();
        console.log(installed);
        console.log(PLATFORM, INSTALLED);
    }
})(jQuery);

async function getInstalledRelatedApp() {
    return await window.navigator.getInstalledRelatedApps();
}
