<?php
function dvu_register_form_shortcode($atts, $content = null)
{

    ob_start();






    $fields_interesting = array(
        [
            "label" => "Interior design",
            "value" =>  "information_technology",
            "id"    =>  "information_technology",
            "placeholder"   =>  "Interior design",
            "type"  =>  'checkbox'
        ]
    )

?>
    <form id="registration_form" method="POST">
        <div class="box shadow-lg px-6 lg:px-12 py-6 mb-6">
            <div class="sm:col-span-3">
                <label for="fullname" class="block text-sm font-medium leading-6 text-gray-900"><?php esc_html_e("Full name", "dvutheme") ?><sup class="text-red-600">*</sup></label>
                <div class="mt-2">
                    <input type="text" name="fullname" id="fullname" autocomplete="fullname" placeholder="<?php esc_html_e("Fill full name", "dvutheme") ?>" class="block w-full px-4 py-2 h-12 rounded-sm border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
        </div>
        <div class="box shadow-lg px-6 lg:px-12 py-6 mb-6">
            <div class="sm:col-span-3">
                <label for="fullname" class="block text-sm font-medium leading-6 text-gray-900"><?php esc_html_e("Phone number", "dvutheme") ?><sup class="text-red-600">*</sup></label>
                <div class="mt-2">
                    <input type="text" name="phone-number" id="phone-number" autocomplete="phone-number" placeholder="<?php esc_html_e("Phone number", "dvutheme") ?>" class="block w-full px-4 py-2 h-12 rounded-sm border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
        </div>
        <div class="box shadow-lg px-6 lg:px-12 py-6 mb-6">
            <div class="sm:col-span-3">
                <label for="fullname" class="block text-sm font-medium leading-6 text-gray-900"><?php esc_html_e("Email", "dvutheme") ?><sup class="text-red-600">*</sup></label>
                <div class="mt-2">
                    <input type="email" name="email" id="email" autocomplete="email" placeholder="<?php esc_html_e("Enter your email", "dvutheme") ?>" class="block w-full px-4 py-2 h-12 rounded-sm border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
        </div>
        <div class="box shadow-lg px-6 lg:px-12 py-6 mb-6">
            <div class="sm:col-span-3">
                <label for="fullname" class="block text-sm font-medium leading-6 text-gray-900"><?php esc_html_e("Position", "dvutheme") ?><sup class="text-red-600">*</sup></label>
                <div class="mt-2">
                    <input type="text" name="position" id="position" autocomplete="position" placeholder="<?php esc_html_e("Position", "dvutheme") ?>" class="block w-full px-4 py-2 h-12 rounded-sm border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
        </div>
        <div class="box shadow-lg px-6 lg:px-12 py-6 mb-6">
            <div class="sm:col-span-3">
                <label for="fullname" class="block text-sm font-medium leading-6 text-gray-900"><?php esc_html_e("Company", "dvutheme") ?><sup class="text-red-600">*</sup></label>
                <div class="mt-2">
                    <input type="text" name="company" id="company" autocomplete="company" placeholder="<?php esc_html_e("Company", "dvutheme") ?>" class="block w-full px-4 py-2 h-12 rounded-sm border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
        </div>
        <div class="box shadow-lg px-6 lg:px-12 py-6 mb-6">
            <div class="sm:col-span-3">
                <div class="label">
                    <label for="fullname" class="block text-sm font-medium leading-6 text-gray-900"><?php esc_html_e("The field you are operating in", "dvutheme") ?><sup class="text-red-600">*</sup></label>
                    <p class="text-gray-600 text-sm"><?php esc_html_e("You can only choose one option", 'dvutheme') ?></p>
                </div>
                <div class="mt-6">
                    <div class="custom-radio flex items-center mb-3">
                        <span class="input-radio mr-2"><input type="radio" name="operating" id="interior_design" value="interior_design" autocomplete="interior_design" class="hidden"></span>
                        <label for="interior_design"><?php esc_html_e("Interior design", 'dvutheme') ?></label>
                    </div>
                    <div class="custom-radio flex items-center mb-3">
                        <span class="input-radio mr-2"><input type="radio" name="operating" id="information_technology" value="information_technology" autocomplete="interior_design" class="hidden"></span>
                        <label for="information_technology"><?php esc_html_e("Information technology", 'dvutheme') ?></label>
                    </div>
                    <div class="custom-radio flex items-center mb-3">
                        <span class="input-radio mr-2"><input type="radio" name="operating" id="travel" value="travel" autocomplete="travel" class="hidden"></span>
                        <label for="travel"><?php esc_html_e("Travel", 'dvutheme') ?></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="box shadow-lg px-6 lg:px-12 py-6 mb-6">
            <div class="sm:col-span-3">
                <div class="label">
                    <label for="fullname" class="block text-sm font-medium leading-6 text-gray-900"><?php esc_html_e("Field you are interested in", "dvutheme") ?><sup class="text-red-600">*</sup></label>
                    <p class="text-gray-600 text-sm"><?php esc_html_e("You can choose multiple options", 'dvutheme') ?></p>
                </div>
                <div class="mt-6">
                    <div class="custom-checkbox flex items-center mb-3">
                        <span class="input-checkbox mr-2"><input type="checkbox" name="interesting" id="interesting_interior_design" value="interior_design" autocomplete="interior_design" class="hidden"></span>
                        <label for="interesting_interior_design"><?php esc_html_e("Interior design", 'dvutheme') ?></label>
                    </div>
                    <div class="custom-checkbox flex items-center mb-3">
                        <span class="input-checkbox mr-2"><input type="checkbox" name="interesting" id="interesting_information_technology" value="information_technology" autocomplete="interior_design" class="hidden"></span>
                        <label for="interesting_information_technology"><?php esc_html_e("Information technology", 'dvutheme') ?></label>
                    </div>
                    <div class="custom-checkbox flex items-center mb-3">
                        <span class="input-checkbox mr-2"><input type="checkbox" name="interesting" id="interesting_travel" value="travel" autocomplete="travel" class="hidden"></span>
                        <label for="interesting_travel"><?php esc_html_e("Travel", 'dvutheme') ?></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center py-12">
            <button class="text-center text-white bg-gradient-to-r from-[#E15723] via-[#EB7121] to-[#F48820] px-8 py-3 lg:px-12 rounded-full font-[500] inline-block text-lg lg:text-xl uppercase"><?php esc_html_e("Register", 'dvutheme') ?></button>
        </div>

    </form>
<?php
    $output = ob_get_clean();
    return $output;
}
add_shortcode('dvu_register_form', 'dvu_register_form_shortcode');
