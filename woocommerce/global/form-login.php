<?php

/**
 * Login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     7.0.1
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

if (is_user_logged_in()) {
	return;
}

?>
<form class="woocommerce-form woocommerce-form-login login pt-4" method="post" <?php echo ($hidden) ? 'style="display:none;"' : ''; ?>>

	<?php do_action('woocommerce_login_form_start'); ?>

	<?php echo ($message) ? wpautop(wptexturize($message)) : ''; // @codingStandardsIgnoreLine 
	?>

	<div class="grid lg:grid-cols-2 lg:gap-6 gap-3 max-w-[650px] py-4">
		<div class="form-row-first">
			<label for="username" class="form-label inline-block mb-3"><?php esc_html_e('Username or email', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
			<input type="text" class="input-text border border-gray-300 rounded-md px-3 py-2 w-full" name="username" id="username" placeholder="<?php esc_html_e('Username or email', 'woocommerce'); ?>" autocomplete="username" />
		</div>
		<div class="form-row-last">
			<label for="password" class="form-label inline-block mb-3"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
			<input class="input-text woocommerce-Input border border-gray-300 rounded-md px-3 py-2 w-full" type="password" name="password" id="password" placeholder="<?php esc_html_e('Password', 'woocommerce'); ?>" autocomplete="current-password" />
		</div>
	</div>

	<?php do_action('woocommerce_login_form'); ?>

	<div class="mb-6 flex items-center">
		<input class="woocommerce-form__input woocommerce-form__input-checkbox form-check-input mr-2" name="rememberme" type="checkbox" id="rememberme" value="forever" />
		<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme form-check-label mb-0">
			<span><?php esc_html_e('Remember me', 'woocommerce'); ?></span>
		</label>
		<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
		<input type="hidden" name="redirect" value="<?php echo esc_url($redirect); ?>" />
	</div>
	<div class="flex items-center gap-3">

		<button type="submit" class="bg-rose-600 text-white px-6 h-10 rounded-md woocommerce-button button woocommerce-form-login__submit<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" name="login" value="<?php esc_attr_e('Login', 'woocommerce'); ?>"><?php esc_html_e('Login', 'woocommerce'); ?></button>

		<p class="lost_password py-3 text-center">
			<a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><span class="text-gray-800"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></span></a>
		</p>
	</div>

	<?php do_action('woocommerce_login_form_end'); ?>

</form>