(function ($) {
    function validatePhone(txtPhone) {
        var filter =
            /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
        if (filter.test(txtPhone)) {
            return true;
        } else {
            return false;
        }
    }

    /*================================contact=======================================*/
    $("form#dvutail-form-contact").on("submit", function (e) {
        e.preventDefault();
        const _this = $(this);

        const contactName = _this.find('input[name="contact_name"]');
        const contactEmail = _this.find('input[name="contact_email"]');
        const contactPhone = _this.find('input[name="contact_phone"]');
        const contactMessage = _this.find("textarea");
        const submitButton = _this.find('button[type="submit"]');
        const notice = $(".dutail-contact-form__notice");

        console.log(notice);
        if (contactName.val() == "") {
            contactName.addClass("border-red-500");
            contactName
                .next()
                .addClass("text-red-500 text-sm")
                .html("Vui lòng điền họ và tên");
            return;
        } else if (contactName.val().length > 30) {
            contactName.addClass("border-red-500");
            contactName
                .next()
                .addClass("text-red-500 text-sm")
                .html("Họ tên quá dài");
            return;
        } else {
            contactName.removeClass("border-red-500");
            contactName.next().removeClass("text-red-500 text-sm").html("");
        }

        if (contactPhone.val() == "") {
            contactPhone.addClass("border-red-500");
            contactPhone
                .next()
                .addClass("text-red-500 text-sm")
                .html("xin hãy nhập số điện thoại");
            return;
        } else if (validatePhone(contactPhone.val()) == false) {
            contactPhone.addClass("border-red-500");
            contactPhone
                .next()
                .addClass("text-red-500 text-sm")
                .html("nhập lại số điện thoại");
            return;
        } else {
            contactPhone.removeClass("border-red-500");
            contactPhone.next().removeClass("text-red-500 text-sm").html("");
        }

        if (contactEmail.val() == "") {
            contactEmail.addClass("border-red-500");
            contactEmail
                .next()
                .addClass("text-red-500 text-sm")
                .html("Xin hãy nhập địa chỉ emaail");
            return;
        } else {
            contactEmail.removeClass("border-red-500");
            contactEmail.next().removeClass("text-red-500 text-sm").html("");
        }

        contactName.attr("disabled", "disabled");
        contactEmail.attr("disabled", "disabled");
        contactPhone.attr("disabled", "disabled");
        submitButton.attr("disabled", "disabled");
        contactMessage.attr("disabled", "disabled");

        $.ajax({
            type: "POST",
            // dataType: 'json',
            url: dvutail_ajax_object.ajaxurl,
            data: {
                name: contactName.val(),
                email: contactEmail.val(),
                phone: contactPhone.val(),
                mess: contactMessage.val(),
                nonce: dvutail_ajax_object.wpnonce,
                action: "dvutail_send_contact_action",
            },
            success: function (response) {
                const data = jQuery.parseJSON(response);
                console.log(data);
                notice.addClass("text-green-600");
                notice.html(
                    `Cảm ơn Anh/Chị: <strong>${data.name}</strong> đã gửi liên hệ, chúng tôi sẽ liên hệ lại với anh chị sớm nhất có thể.`
                );

                contactName.removeAttr("disabled");
                contactEmail.removeAttr("disabled");
                contactPhone.removeAttr("disabled");
                contactMessage.removeAttr("disabled");
                submitButton.removeAttr("disabled");

                contactName.val("");
                contactEmail.val("");
                contactPhone.val("");
                contactMessage.val("");
            },
            error: function () {
                console.log(
                    "không thể gửi mail vào lúc này, vui lòng thử lại sau"
                );
            },
        });
    });

    /*=====autocomplate===== */
    $("form.js-autocomplate-search")
        .find('input[name="live_search"]')
        .bind("input", function (e) {
            e.stopPropagation();
            var value = $(this).val();
            var result = jQuery("form.js-autocomplate-search").find(
                ".live__search-result"
            );
            var btn = jQuery("form.js-autocomplate-search").find(
                "button.btn-live-search"
            );
            if (value.length > 3) {
                btn.addClass("loading");
                btn.html('<i class="loading-icon sgh-loading"></i>');
                result.html("");
                $.ajax({
                    type: "POST",
                    // dataType: 'json',
                    url: dvutail_ajax_object.ajaxurl,
                    data: {
                        string: value,
                        nonce: dvutail_ajax_object.wpnonce,
                        action: "neo_autocomplate_action",
                    },
                    success: function (response) {
                        setTimeout(function () {
                            btn.html(
                                '<i class="sghome-icon sghome-magnifier"></i>'
                            );
                            result.html(response);
                            result.fadeIn();
                            result.stoppagi;
                        }, 2000);
                    },
                    error: function (response) {
                        console.log(response);
                    },
                });
            } else if (value.length <= 3) {
                btn.removeClass("loading");
                btn.html('<i class="sghome-icon sghome-magnifier"></i>');
                result.html("");
                result.fadeOut();
            }
        });
    $(document).click(function (event) {
        if (!$(event.target).closest(".live__search-result").length) {
            if ($(".live__search-result").is(":visible")) {
                $(".live__search-result").hide();
            }
        }
    });
})(jQuery);
