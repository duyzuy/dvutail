<?php

class DvuGalleryMetabox
{
    private $post_type = 'report_gallery';



    function __construct()
    {
        add_action('add_meta_boxes', array($this, 'dvu_register_report_gallery_metabox'));
        add_action('admin_footer', array($this, 'dvu_add_script_to_admin'));
        add_action('save_post', array($this, 'dvu_save_report_gallery_metabox'));
    }

    function dvu_register_report_gallery_metabox()
    {
        add_meta_box(
            'dvu_report-gallery-info',
            __('Gallery report', 'dvutheme'),
            array($this, 'dvu_callback_report_gallery_fields'),
            'report_gallery'
        );
    }

    /**
     * add fields
     */
    function dvu_callback_report_gallery_fields()
    {
        global $post;
        wp_nonce_field(basename(__FILE__), 'metabox-nonce_field-report-gallery');


        $gallery_data = get_post_meta($post->ID, '_dvu_report_gallery_data', true);

?>
        <div>
            <div class="dvu__container-galleries" data-gallery='<?php echo empty($gallery_data) ? "" : json_encode($gallery_data) ?>'></div>
            <button class="button button-primary js__btn-upload-gallery" type="button">Chọn ảnh</button>
        </div>
    <?php
    }


    /**
     * add script to footer
     */
    function dvu_add_script_to_admin()
    {
        $current_screen = get_current_screen();

        if (
            (!isset($current_screen->base) || !in_array($current_screen->base, array('post'))
                ||  $current_screen->post_type != $this->post_type)
        ) {
            return false;
        }
        wp_enqueue_media();
    ?>

        <style>
            .dvu__container-galleries {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(100px, 100px));
                gap: 15px;
                padding-top: 30px;
                padding-bottom: 30px;
            }

            .gallery-item {
                position: relative;
                border: 1px solid #f1f1f1;
                width: 100px;
                height: 100px;
                padding: 3px;
                border-radius: 3px;
            }

            .gallery-item img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .gallery-item-remove {
                position: absolute;
                color: white;
                top: 0px;
                right: 0px;
                font-size: 10px;
                width: 16px;
                height: 16px;
                border-radius: 50%;
                background-color: red;
                text-align: center;
                cursor: pointer;
            }
        </style>


        <script>
            (function($) {

                let galleryList = []

                const containerGallery = $('.dvu__container-galleries');
                const currentGellery = containerGallery.data('gallery');
                console.log(currentGellery)
                if (currentGellery !== "" && currentGellery.length) {

                    galleryList = [...galleryList, ...currentGellery]
                }

                const createItemHtml = ({
                    id,
                    name,
                    index,
                    thumbnailUrl,
                    originalUrl
                }) => {
                    return `<div class="gallery-item" data-index="${index}">
                    <img src="${thumbnailUrl}" width="80" height="80" />
                    <input type="hidden" name="dvu_report_gallery[${index}][id]" value="${id}" />
                    <input type="hidden" name="dvu_report_gallery[${index}][name]" value="${name}" />
                    <input type="hidden" name="dvu_report_gallery[${index}][thumbnailUrl]" value="${thumbnailUrl}" />
                    <input type="hidden" name="dvu_report_gallery[${index}][originalUrl]" value="${originalUrl}" />
                    <span class="gallery-item-remove">x</span>
                </div>`
                }
                containerGallery.on('click', '.gallery-item-remove', function(ev) {
                    const indexItem = $(this).parents('.gallery-item').data('index');
                    galleryList.splice(indexItem, 1)
                    renderGalleryHtml()
                })
                $(".js__btn-upload-gallery").on("click", function(e) {
                    e.preventDefault();

                    console.log(galleryList)
                    media_uploader = wp.media.frames.galleries = wp.media({
                        title: "Choose image",
                        library: {
                            order: "DESC",
                            orderby: "date",
                            type: "image/jpeg, image/png",
                            search: null,
                        },
                        multiple: true,
                    });

                    media_uploader.on('open', function() {

                        const selection = media_uploader.state().get("selection");

                        if (galleryList.length) {
                            galleryList.forEach(function({
                                id
                            }) {
                                attachment = wp.media.attachment(id);
                                attachment.fetch();
                                selection.add(attachment ? [attachment] : []);
                            });
                        }
                    });
                    // media_uploader.on("chosen", function() {
                    //     console.log("all")

                    // });
                    media_uploader.on("select", function() {
                        const images = media_uploader.state().get("selection").models;


                        images.forEach((file) => {
                            galleryList = [...galleryList, {
                                name: file.attributes.name,
                                thumbnailUrl: file.attributes.sizes.thumbnail.url,
                                originalUrl: file.attributes.sizes.full.url,
                                id: file.attributes.id
                            }]
                        })
                        renderGalleryHtml()

                    });
                    media_uploader.open();
                });


                const renderGalleryHtml = () => {
                    containerGallery.html("");
                    galleryList.forEach((item, index) => {
                        const htmlItem = createItemHtml({
                            ...item,
                            index
                        })
                        containerGallery.append(htmlItem)
                    })
                }
                renderGalleryHtml()
            })(jQuery)
        </script>
<?php
    }

    /**
     * save dataa
     */
    function dvu_save_report_gallery_metabox($post_id)
    {
        // Save logic goes here. Don't forget to include nonce checks!

        if (!isset($_POST["metabox-nonce_field-report-gallery"]) || !wp_verify_nonce($_POST["metabox-nonce_field-report-gallery"], basename(__FILE__)))
            return $post_id;

        if (!current_user_can("edit_post", $post_id))
            return $post_id;

        if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
            return $post_id;


        $data = $_POST['dvu_report_gallery'];

        update_post_meta($post_id, '_dvu_report_gallery_data', $data);
    }
}

new DvuGalleryMetabox();
