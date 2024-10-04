(function ($) {
    const btnShowPopup = $(".js__popup-content");

    btnShowPopup.on("click", function () {
        const popup = $(this)
            .parents(".dvu__popup-content")
            .find(".popup__content");
        popup.toggleClass("show");
    });
    $(document).on(
        "click",
        ".popup__content-overlay, .js__close-popup",
        function () {
            const popup = $(this).parents(".popup__content");
            popup.removeClass("show");
        }
    );
})(jQuery);
