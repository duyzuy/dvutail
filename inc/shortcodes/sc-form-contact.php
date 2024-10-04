<?php
function create_shortcode_contact_form($atts, $content = null)
{

    $attr = shortcode_atts(array(
        'class' => '',
        'title' =>  'Thông tin liên hệ',
    ), $atts);

    ob_start();
?>
    <div class="dutail-contact-form">
        <?php if ($attr['title']): ?>
            <div class="dutail-contact-form__head mb-6">
                <h4 class="text-xl lg:text-2xl text-center"><?php echo $attr['title']; ?></h4>
            </div>
        <?php endif; ?>
        <div class="dutail-contact-form__body">
            <p class="dutail-contact-form__notice"></p>
            <form id="dvutail-form-contact" class="form-contact">
                <div class="form-group mb-3">
                    <label for="contact_name" class="sr-only"><?php esc_html_e('Họ và tên', 'dvutail') ?></label>
                    <input id="contact_name" name="contact_name" type="text" class="border border-gray-200 rounded-md bg-white w-full px-4 py-2" placeholder="<?php esc_html_e('Họ và tên', 'dvutail') ?>">
                    <div class="h-6 flex items-center"></div>
                </div>
                <div class="form-group mb-3">
                    <label for="contact_phone" class="sr-only"><?php esc_html_e('Điện thoại', 'dvutail') ?></label>
                    <input id="contact_phone" name="contact_phone" type="text" class="border border-gray-200 rounded-md bg-white w-full px-4 py-2" placeholder="<?php esc_html_e('Số điện thoại', 'dvutail') ?>">
                    <div class="h-6 flex items-center"></div>
                </div>
                <div class="form-group mb-3">
                    <label for="contact_email" class="sr-only"><?php esc_html_e('Email', 'dvutail') ?></label>
                    <input id="contact_email" name="contact_email" type="email" class="border border-gray-200 rounded-md bg-white w-full px-4 py-2" placeholder="<?php esc_html_e('Email', 'dvutail') ?>">
                    <div class="h-6 flex items-center"></div>
                </div>
                <div class="form-group mb-3">
                    <label for="messange" class="sr-only"><?php esc_html_e('Lời nhắn', 'dvutail') ?></label>
                    <textarea id="messange" rows="6" class="border border-gray-200 rounded-md bg-white w-full" placeholder="<?php esc_html_e('Lời nhắn', 'dvutail') ?>"></textarea>
                </div>
                <div class="form-group">
                    <Button class="px-4 py-2 bg-rose-500 hover:bg-red-600 rounded-md inline-flex items-center text-white" type="submit">
                        <span class="mr-2 fill-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m22 2-7 20-4-9-9-4Z" />
                                <path d="M22 2 11 13" />
                            </svg>
                        </span>
                        <?php esc_html_e('Gửi liên hệ', 'dvutail') ?>
                    </Button>
                </div>
            </form>
        </div>
    </div>
<?php
    $output = ob_get_clean();
    return $output;
}
add_shortcode('dvutail_form_contact', 'create_shortcode_contact_form');
