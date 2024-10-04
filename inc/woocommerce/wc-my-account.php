<?php

function dvu_get_custom_address_info($name)
{

    $current_user = wp_get_current_user();

    if (!$current_user) {
        exit;
    }

    if ($name === 'billing') {
        $billing_fname = get_user_meta($current_user->ID, 'billing_first_name', true);
        $billing_lname = get_user_meta($current_user->ID, 'billing_last_name', true);
        $billing_company = get_user_meta($current_user->ID, 'billing_company', true);
        $billing_address_1 = get_user_meta($current_user->ID, 'billing_address_1', true);
        $billing_address_2 = get_user_meta($current_user->ID, 'billing_address_2', true);
        $billing_city = get_user_meta($current_user->ID, 'billing_city', true);
        $billing_postcode = get_user_meta($current_user->ID, 'billing_postcode', true);
        $billing_country = get_user_meta($current_user->ID, 'billing_country', true);
        $billing_state = get_user_meta($current_user->ID, 'billing_state', true);
        $billing_phone = get_user_meta($current_user->ID, 'billing_phone', true);
        $billing_email = get_user_meta($current_user->ID, 'billing_email', true);


?>
        <div class="dvu__customer-billing-address">
            <ul>
                <li class="d-flex flex-wrap mb-2">
                    <span class="label"><?php _e("Họ", 'dvutheme') ?></span>
                    <span class="value"><?php echo $billing_fname ?></span>
                </li>
                <li class="d-flex flex-wrap mb-2">
                    <span class="label"><?php _e("Tên đệm và tên", 'dvutheme') ?></span>
                    <span class="value"><?php echo $billing_lname ?></span>
                </li>
                <li class="d-flex flex-wrap mb-2">
                    <span class="label"><?php _e("Email", 'dvutheme') ?></span>
                    <span class="value"><?php echo $billing_email ?></span>
                </li>
                <li class="d-flex flex-wrap mb-2">
                    <span class="label"><?php _e("Số điện thoại", 'dvutheme') ?></span>
                    <span class="value"><?php echo $billing_phone ?></span>
                </li>
                <li class="d-flex flex-wrap mb-2">
                    <span class="label"><?php _e("Địa chỉ công ty", 'dvutheme') ?></span>
                    <span class="value"><?php echo $billing_company ?></span>
                </li>
                <li class="d-flex flex-wrap mb-2">
                    <span class="label"><?php _e("Quốc gia", 'dvutheme') ?></span>
                    <span class="value"><?php echo $billing_country ?></span>
                </li>
                <li class="d-flex flex-wrap mb-2">
                    <span class="label"><?php _e("Khu vực", 'dvutheme') ?></span>
                    <span class="value"><?php echo $billing_state ?></span>
                </li>
                <li class="d-flex flex-wrap mb-2">
                    <span class="label"><?php _e("Thành phố", 'dvutheme') ?></span>
                    <span class="value"><?php echo $billing_city ?></span>
                </li>
                <li class="d-flex flex-wrap mb-2">
                    <span class="label"><?php _e("Mã bưu điện", 'dvutheme') ?></span>
                    <span class="value"><?php echo $billing_postcode ?></span>
                </li>
                <li class="d-flex flex-wrap mb-2">
                    <span class="label"><?php _e("Tên đường", 'dvutheme') ?></span>
                    <span class="value"><?php echo $billing_address_1 ?></span>
                </li>
                <li class="d-flex flex-wrap mb-2">
                    <span class="label"><?php _e("Số nhà", 'dvutheme') ?></span>
                    <span class="value"><?php echo $billing_address_2 ?></span>
                </li>
            </ul>
        </div>

    <?php

    }

    if ($name === 'shipping') {
        $shipping_first_name = get_user_meta($current_user->ID, 'shipping_first_name', true);
        $shipping_last_name = get_user_meta($current_user->ID, 'shipping_last_name', true);
        $shipping_company = get_user_meta($current_user->ID, 'shipping_company', true);
        $shipping_address_1 = get_user_meta($current_user->ID, 'shipping_address_1', true);
        $shipping_address_2 = get_user_meta($current_user->ID, 'shipping_address_2', true);
        $shipping_city = get_user_meta($current_user->ID, 'shipping_city', true);
        $shipping_postcode = get_user_meta($current_user->ID, 'shipping_postcode', true);
        $shipping_country = get_user_meta($current_user->ID, 'shipping_country', true);
        $shipping_state = get_user_meta($current_user->ID, 'shipping_state', true);
        $shipping_phone = get_user_meta($current_user->ID, 'shipping_phone', true);


    ?>
        <div class="dvu__customer-shipping-address">
            <ul>
                <li class="d-flex flex-wrap mb-2">
                    <span class="label"><?php _e("Họ", 'dvutheme') ?></span>
                    <span class="value"><?php echo !empty($shipping_first_name) ? $shipping_first_name : '--'; ?></span>
                </li>
                <li class="d-flex flex-wrap mb-2">
                    <span class="label"><?php _e("Tên đệm và tên", 'dvutheme') ?></span>
                    <span class="value"><?php echo !empty($shipping_last_name) ? $shipping_last_name : '--'; ?></span>
                </li>
                <li class="d-flex flex-wrap mb-2">
                    <span class="label"><?php _e("Số điện thoại", 'dvutheme') ?></span>
                    <span class="value"><?php echo !empty($shipping_phone) ? $shipping_phone : '--'; ?></span>
                </li>
                <li class="d-flex flex-wrap mb-2">
                    <span class="label"><?php _e("Địa chỉ công ty", 'dvutheme') ?></span>
                    <span class="value"><?php echo !empty($shipping_company) ? $shipping_company : '--'; ?></span>
                </li>
                <li class="d-flex flex-wrap mb-2">
                    <span class="label"><?php _e("Quốc gia", 'dvutheme') ?></span>
                    <span class="value"><?php echo  !empty($shipping_country) ? $shipping_country : '--'; ?></span>
                </li>
                <li class="d-flex flex-wrap mb-2">
                    <span class="label"><?php _e("Khu vực", 'dvutheme') ?></span>
                    <span class="value"><?php echo !empty($shipping_state) ? $shipping_state : '--'; ?></span>
                </li>
                <li class="d-flex flex-wrap mb-2">
                    <span class="label"><?php _e("Thành phố", 'dvutheme') ?></span>
                    <span class="value"><?php echo !empty($shipping_city) ? $shipping_city : '--'; ?></span>
                </li>
                <li class="d-flex flex-wrap mb-2">
                    <span class="label"><?php _e("Mã bưu điện", 'dvutheme') ?></span>
                    <span class="value"><?php echo !empty($shipping_postcode) ? $shipping_postcode : '--'; ?></span>
                </li>
                <li class="d-flex flex-wrap mb-2">
                    <span class="label"><?php _e("Tên đường", 'dvutheme') ?></span>
                    <span class="value"><?php echo !empty($shipping_address_1) ? $shipping_address_1 : '--'; ?></span>
                </li>
                <li class="d-flex flex-wrap mb-2">
                    <span class="label"><?php _e("Số nhà", 'dvutheme') ?></span>
                    <span class="value"><?php echo !empty($shipping_address_2) ? $shipping_address_2 : '--' ?></span>
                </li>
            </ul>
        </div>

<?php
    }
}
