(function ($) {
    // Uploading files
    var file_frame;

    jQuery(document).on("click", ".upload_banner_button", function (event) {
        event.preventDefault();

        // If the media frame already exists, reopen it.
        if (file_frame) {
            file_frame.open();
            return;
        }

        // Create the media frame.
        file_frame = wp.media.frames.downloadable_file = wp.media({
            title: "Choose an image",
            button: {
                text: "Use image",
            },
            multiple: false,
        });

        // When an image is selected, run a callback.
        file_frame.on("select", function () {
            var attachment = file_frame
                .state()
                .get("selection")
                .first()
                .toJSON();
            var attachment_thumbnail =
                attachment.sizes.thumbnail || attachment.sizes.full;

            jQuery("#wc_term_banner").val(attachment.id);
            jQuery("#activity_host_banner")
                .find("img")
                .attr("src", attachment_thumbnail.url);
            jQuery(".remove_banner_button").show();
        });

        // Finally, open the modal.
        file_frame.open();
    });

    jQuery(document).on("click", ".add_more", function (e) {
        e.preventDefault();
        var html = "";
        var items = jQuery(".pyre-group-items").find(".pyre-group-item");
        html += "<div class='pyre-group-item'>";
        html +=
            "<div class='image'><img src='http://localhost/glamgals/wp-content/themes/glamgals/assets/images/no-image.png' width='60' height='60' class='thumbnail'/><a class='btn_add'>Add icon</a><a class='btn_remove hidden'>Remove icon</a></div>";
        html +=
            "<input type='hidden' class='pyre_control' name='_material_care[note][" +
            items.length +
            "][image_id]'>";
        html +=
            "<textarea class='pyre_control' rows='3' name='_material_care[note][" +
            items.length +
            "][content]'></textarea>";
        html += "<a class='btn_delete_row'>Delete</a>";
        html += "</div>";
        jQuery(this).prev().append(html);
    });

    jQuery(document).on("click", ".btn_add", function (e) {
        e.preventDefault();
        var inputhd = $(this)
            .parent(".image")
            .parent(".pyre-group-item")
            .find("input:hidden");
        var thumbnail = $(this)
            .parent(".image")
            .parent(".pyre-group-item")
            .find(".thumbnail");
        var addBtn = $(this);
        media_uploader = wp.media({
            title: "Choose Icon",
            multiple: false,
            // library : {
            // 	// uploadedTo : wp.media.view.settings.post.id, // attach to the current post?
            // 	type : 'image, vector, svg'
            // },
        });

        media_uploader.on("select", function () {
            var image = media_uploader
                .state()
                .get("selection")
                .first()
                .toJSON();
            console.log(image);
            inputhd.val(image.id);
            thumbnail.attr("src", image.url);
            addBtn.addClass("hidden");
            addBtn.next().removeClass("hidden");
        });

        media_uploader.open();
    });
    jQuery(document).on("click", ".btn_remove", function (e) {
        var inputhd = $(this)
            .parent(".image")
            .parent(".pyre-group-item")
            .find("input:hidden");
        var thumbnail = $(this)
            .parent(".image")
            .parent(".pyre-group-item")
            .find(".thumbnail");
        inputhd.val("");
        thumbnail.attr(
            "src",
            "http://localhost/glamgals/wp-content/themes/glamgals/assets/images/no-image.png"
        );
        $(this).addClass("hidden");
        $(this).prev().removeClass("hidden");
    });
    jQuery(document).on("click", ".btn_delete_row", function (e) {
        e.preventDefault();
        $(this).parent(".pyre-group-item").remove();
        var items = document.querySelectorAll(".pyre-group-item");
        for (var i = 0; i < items.length; i++) {
            jQuery(items[i])
                .find("input:hidden")
                .attr("name", "_material_care[note][" + i + "][image_id]");
            jQuery(items[i])
                .find("textarea")
                .attr("name", "_material_care[note][" + i + "][content]");
        }
    });

    jQuery(".btn-upload-banner").each(function () {
        console.log(1);
        $(this).on("click", function (e) {
            e.preventDefault();

            var inputhd = $(this).parent(".pyre_field").find("input:hidden");
            // var inputSrc = $(this)
            //     .parent(".pyre_field")
            //     .find("input[type=hidden]");

            var thumbnail = $(this)
                .parent(".pyre_field")
                .find(".pyre_thumbnail");
            var image = $("<img>");
            media_uploader = wp.media({
                title: "Choose file",
                library: {
                    order: "DESC",

                    // [ 'name', 'author', 'date', 'title', 'modified', 'uploadedTo', 'id', 'post__in', 'menuOrder' ]
                    orderby: "date",

                    // mime type. e.g. 'image', 'image/jpeg'
                    type: "image",

                    // Searches the attachment title.
                    search: null,

                    // Includes media only uploaded to the specified post (ID)
                    uploadedTo: null, // wp.media.view.settings.post.id (for current post ID)
                },
                multiple: false,
            });

            media_uploader.on("select", function () {
                var file = media_uploader.state().get("selection").models;

                var fileId = file[0].attributes.id;
                var fileName = file[0].attributes.filename;
                var fileUrl = file[0].attributes.url;

                image.attr("src", fileUrl);
                thumbnail.html("");
                thumbnail.html(image);
                inputhd.val(fileId);
                // inputSrc.val(fileId);
            });

            media_uploader.open();
        });
    });

    $(".btn-remove-banner").on("click", function (e) {
        e.preventDefault();

        var inputHd = $(this).parent(".pyre_field").find("input:hidden");

        inputHd.val("");

        $(this)
            .parent(".pyre_field")
            .find(".pyre_thumbnail")
            .children("img")
            .remove();
        $(this)
            .parent(".pyre_field")
            .find(".pyre_thumbnail")
            .html("<span>No image</span>");
    });

    /** activity metabox fields */
    $(".dvu_date-picker").datetimepicker({
        value: "",
        timepicker: false,
        minDate: new Date(),
        format: "Y-m-d",
    });
    $(".dvu_time-picker.activity-start").datetimepicker({
        datepicker: false,
        format: "H:i",
        step: 5,
    });
    $(".dvu_time-picker.activity-end").datetimepicker({
        datepicker: false,
        format: "H:i",
        step: 5,
    });

    $(document).ready(function () {
        $(".dvu__activity-speaker").select2({
            width: "100%",
        });
    });

    // render template
    const agendarContainer = $(".activity__agenda-container");

    const agendaItemTemplate = function (index, data) {
        const title = (data && data["title"]) || "";
        const timeStart = (data && data["time_start"]) || "";
        const timeEnd = (data && data["time_end"]) || "";
        const speaker = (data && data["speaker"]) || "";

        return `<div class="activity__agenda-item" data-index="${index}">
                <div class="dvu-flex mb-3">
                    <div class="w-2-12">
                        <label for="activity_agenda-title-${index}" class="dvu-block mb-2">Agenda title</label>
                    </div>
                    <div class="flex-1">
                        <input type="text" id="activity_agenda-title-${index}" data-index="${index}" name="dvu_activity[activity_agenda][${index}][title]" 
                        placeholder="Agenda title" class="w-full input-title" value="${title}" />
                    </div>
                </div>
                <div class="dvu-flex mb-3">
                    <div class="w-2-12">
                        <label for="activity_agenda-time-start-${index}" class="dvu-block mb-2">Start time</label>
                    </div>
                    <div class="flex-1">
                        <input type="text" id="activity_agenda-time-start-${index}" data-index="${index}" name="dvu_activity[activity_agenda][${index}][time_start]" placeholder="Start time" class="w-full dvu_time-picker activity-start" value="${timeStart}" />
                    </div>
                </div>
                <div class="dvu-flex mb-3">
                    <div class="w-2-12">
                        <label for="activity_agenda-time-end-${index}" class="dvu-block mb-2">End time</label>
                    </div>
                    <div class="flex-1">
                        <input type="text" id="activity_agenda-time-end-${index}" data-index="${index}" name="dvu_activity[activity_agenda][${index}][time_end]" placeholder="End time" class="w-full dvu_time-picker activity-end" value="${timeEnd}" />
                    </div>
                </div>
                <div class="dvu-flex mb-3">
                    <div class="w-2-12">
                        <label for="activity_agenda-speaker-${index}" class="dvu-block mb-2">Speaker</label>
                    </div>
                    <div class="flex-1">
                        <input type="text" id="activity_agenda-speaker-${index}" data-index="${index}" name="dvu_activity[activity_agenda][${index}][speaker]" placeholder="Speaker" class="w-full dvu__agenda-speaker" value="${speaker}" />
                    </div>
                </div>
                <div class="activity__agenda-item-actions"><span class="activity__agenda-item-remove" style="color: #b32d2e">Remove</span></div>
            </div>`;
    };

    if (agendarContainer) {
        const data = agendarContainer.attr("data-activity");
        let activityList = JSON.parse(data);

        agendarContainer.on("change", ".input-title", function (ev) {
            const newValue = ev.target.value;
            const index = $(this).attr("data-index");
            activityList.splice(index, 1, {
                ...activityList[index],
                title: newValue,
            });
        });
        agendarContainer.on("change", ".dvu__agenda-speaker", function (ev) {
            const newValue = ev.target.value;
            const index = $(this).attr("data-index");
            activityList.splice(index, 1, {
                ...activityList[index],
                speaker: newValue,
            });
        });
        const renderActivitylist = (data) => {
            data.forEach((element, _index) => {
                const template = agendaItemTemplate(_index, element);
                agendarContainer.append(template);
                $(".dvu_time-picker.activity-start").datetimepicker({
                    datepicker: false,
                    format: "H:i",
                    step: 5,
                    onChangeDateTime: function (dp, $input) {
                        activityList.splice(_index, 1, {
                            ...activityList[_index],
                            time_start: $input.val(),
                        });
                    },
                });
                $(".dvu_time-picker.activity-end").datetimepicker({
                    datepicker: false,
                    format: "H:i",
                    step: 5,
                    onChangeDateTime: function (dp, $input) {
                        activityList.splice(_index, 1, {
                            ...activityList[_index],
                            time_end: $input.val(),
                        });
                    },
                });
            });
        };
        renderActivitylist(activityList);

        $(document).on("click", ".activity__agenda-item-remove", function () {
            const agendaItem = $(this).parents(".activity__agenda-item");
            const indexItem = agendaItem.attr("data-index");
            activityList.splice(indexItem, 1);
            $(".activity__agenda-container").empty();
            renderActivitylist(activityList);
        });

        $(".js__btn-add-agenda").on("click", function () {
            let index = 0;
            index = activityList.length;
            activityList = [
                ...activityList,
                {
                    speaker: "",
                    time_end: "",
                    time_start: "",
                    title: "",
                },
            ];

            $(".activity__agenda-container").empty();
            renderActivitylist(activityList);
        });
    }
})(jQuery);
