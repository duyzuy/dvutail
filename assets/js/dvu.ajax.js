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

    matcharray = Array(
        [8, 9, 17],
        [4, 5, 9],
        [6, 2, 8],
        [3, 7, 10],
        [11, 8, 19],
        [21, 9, 30]
    );

    /*=====contact===*/
    $("form#sgh_contact").on("submit", function (e) {
        e.preventDefault();
        var self = $(this);
        var name, email, phone, mess, submitbtn, notice;
        name = self.find('input[name="yourname"]');
        email = self.find('input[name="youremail"]');
        phone = self.find('input[name="yourphone"]');
        mess = self.find("textarea");
        submitbtn = self.find('input[name="submit"]');
        notice = self.find("p.notice");

        if (name.val() == "") {
            name.addClass("is-invalid");
            name.next()
                .addClass("invalid-feedback")
                .html("Vui lòng điền họ và tên");
            return;
        }
        if (name.val().length > 30) {
            name.addClass("is-invalid");
            name.next().addClass("invalid-feedback").html("Họ tên quá dài");
            return;
        }
        if (email.val() == "") {
            email.addClass("is-invalid");
            email
                .next()
                .addClass("invalid-feedback")
                .html("Xin hãy nhập địa chỉ emaail");
            return;
        }
        if (phone.val() == "") {
            phone.addClass("is-invalid");
            phone
                .next()
                .addClass("invalid-feedback")
                .html("xin hãy nhập số điện thoại");
            return;
        }
        if (validatePhone(phone.val()) == false) {
            phone.addClass("is-invalid");
            phone
                .next()
                .addClass("invalid-feedback")
                .html("nhập lại số điện thoại");
            return;
        }
        $.ajax({
            type: "POST",
            // dataType: 'json',
            url: neo_object.ajaxurl,
            data: {
                name: name.val(),
                email: email.val(),
                phone: phone.val(),
                mess: mess.val(),
                nonce: neo_object.wpnonce,
                action: "sghsend_contact_action",
            },
            success: function (response) {
                var data = jQuery.parseJSON(response);
                notice.addClass("success");
                notice.html(
                    'Cảm ơn Anh/Chị: <span style="color: #dc3545">' +
                        data.name +
                        "</span> Đã gửi liên hệ cho chúng tôi, chúng tôi sẽ liên hệ lại với anh chị sớm nhất có thể"
                );
                name.attr("disabled", "disabled");
                email.attr("disabled", "disabled");
                phone.attr("disabled", "disabled");
                submitbtn.attr("disabled", "disabled");
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
                    url: neo_object.ajaxurl,
                    data: {
                        string: value,
                        nonce: neo_object.wpnonce,
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

    /**==============search activity=================== */

    const createArticleTemplate = function ({
        day,
        month,
        year,
        title,
        href,
        thumbnail,
        locationType,
        timming,
        excerpt,
    }) {
        return `
       <article class="w-full border-b pb-6 mb-6">
           <div class="inner flex flex-wrap lg:items-center">
               <div class="activity-date lg:w-60 w-40 lg:pr-8 pr-3">
                   <span class="inline-flex items-center bg-gradient-to-tr from-[#CC2027] via-[#EB7121] to-[#F48820] text-transparent bg-clip-text uppercase font-bold">
                       <span class="lg:text-6xl text-4xl">${day}</span>
                       <span class="ml-2 leading-none">
                           <span class="lg:text-lg text-sm block">${month}</span>
                           <span class="lg:text-3xl text-lg block">${year}</span>
                       </span>
                   </span>
               </div>
               <div class="flex flex-1 flex-wrap gap-y-6">
                   <div class="activity-thumbnail w-full lg:w-1/4 pr-8">
                       <a href="${href}" alt="${title}">
                         <img src="${thumbnail}" class="w-full" />
                       </a>
                   </div>
                   <div class="activity-content w-full lg:w-3/4">
                       <div class="header-box">
                           <h3 class="">
                               <a href="${href}" class="bg-gradient-to-tr from-[#CC2027] via-[#EB7121] to-[#F48820] text-transparent bg-clip-text uppercase font-bold text-xl lg:text-2xl mb-3" alt="<?php the_title() ?>">${title}</a>
                           </h3>
                           <div class="mb-3 line-clamp-3">${excerpt}</div>
                           <div class="flex">
                               <span class="icon mr-3 mt-[2px]">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 25" fill="none">
                                       <g clip-path="url(#clip0_1_4893)">
                                           <path d="M3.96938 13.2401C3.82899 13.0995 3.75009 12.909 3.75 12.7104V4.02069H12.4397C12.6383 4.02078 12.8288 4.09968 12.9694 4.24007L22.2806 13.5513C22.4212 13.692 22.5001 13.8826 22.5001 14.0815C22.5001 14.2803 22.4212 14.471 22.2806 14.6116L14.3438 22.5513C14.2031 22.6919 14.0124 22.7708 13.8136 22.7708C13.6148 22.7708 13.4241 22.6919 13.2834 22.5513L3.96938 13.2401Z" stroke="url(#paint0_linear_1_4893)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                           <path d="M7.875 9.27069C8.49632 9.27069 9 8.76701 9 8.14569C9 7.52437 8.49632 7.02069 7.875 7.02069C7.25368 7.02069 6.75 7.52437 6.75 8.14569C6.75 8.76701 7.25368 9.27069 7.875 9.27069Z" fill="url(#paint1_linear_1_4893)" />
                                       </g>
                                       <defs>
                                           <linearGradient id="paint0_linear_1_4893" x1="-3.39756" y1="18.8807" x2="-3.39756" y2="4.19183" gradientUnits="userSpaceOnUse">
                                               <stop stop-color="#3B5AA7" />
                                               <stop offset="0.22" stop-color="#3B65AF" />
                                               <stop offset="0.62" stop-color="#3D85C5" />
                                               <stop offset="1" stop-color="#3FA9DF" />
                                           </linearGradient>
                                           <linearGradient id="paint1_linear_1_4893" x1="5.8923" y1="8.80388" x2="5.8923" y2="7.04123" gradientUnits="userSpaceOnUse">
                                               <stop stop-color="#3B5AA7" />
                                               <stop offset="0.22" stop-color="#3B65AF" />
                                               <stop offset="0.62" stop-color="#3D85C5" />
                                               <stop offset="1" stop-color="#3FA9DF" />
                                           </linearGradient>
                                           <clipPath id="clip0_1_4893">
                                               <rect width="24" height="24" fill="white" transform="translate(0 0.270691)" />
                                           </clipPath>
                                       </defs>
                                   </svg>
                               </span>
                               <p class="pl">${locationType}, ${timming}</p>
                           </div>
                       </div>
       
                   </div>
               </div>
           </div>
       </article>`;
    };

    $("#activity_post_search_form").on("submit", function (e) {
        e.preventDefault();
        const self = $(this);

        const onsite = self.find('input[name="onsite"]');
        const offsite = self.find('input[name="offsite"]');
        const beforeEv = self.find('input[name="before_event"]');

        const inEv = self.find('input[name="in_event"]');
        const afterEv = self.find('input[name="after_event"]');
        const startDate = self.find('input[name="date_start"]');
        const endDate = self.find('input[name="date_end"]');

        const activityListContainer = $(".activity__list-container");

        const submitbtn = self.find('button[type="submit"]');
        const buttonText = submitbtn.text();
        submitbtn.text("...Loading");
        submitbtn.attr("disabled", "disabled");

        $.ajax({
            type: "POST",
            // dataType: 'json',
            url: neo_object.ajaxurl,
            data: {
                onsite: onsite.is(":checked"),
                offsite: offsite.is(":checked"),
                beforeEv: beforeEv.is(":checked"),
                inEv: inEv.is(":checked"),
                afterEv: afterEv.is(":checked"),
                startDate: startDate.val(),
                endDate: endDate.val(),
                nonce: neo_object.wpnonce,
                action: "dvu_filter_activity_post",
            },
            success: function (response) {
                const data = JSON.parse(response);

                activityListContainer.html("");

                submitbtn.text(buttonText);
                submitbtn.removeAttr("disabled");
                data.forEach((article) => {
                    template = createArticleTemplate(article);
                    activityListContainer.append(template);
                });
            },
            error: function (err) {
                console.log(err);
            },
        });
    });
})(jQuery);
