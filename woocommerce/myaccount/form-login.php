<?php

/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

do_action('woocommerce_before_customer_login_form'); ?>
<div class="dvu-auth max-w-[550px] mx-auto">
	<div class="dvu-auth__image mx-auto mb-6">
		<span class="w-24 h-24 bg-gradient-to-tr from-amber-500  to-yellow-400 rounded-full border-2 border-white shadow-sm flex items-center justify-center mx-auto">
			<svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 stroke-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
				<path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
				<circle cx="12" cy="7" r="4" />
			</svg>
		</span>
	</div>
	<div class="dvu-auth__form-wraper bg-white shadow-sm rounded-md lg:p-6 p-4">
		<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>
			<div class="dvu__auth-nav-tabs mb-6" id="customer_login">
				<div class="dvu__auth-nav-items flex">
					<div class="nav-item px-4 py-2 w-fit border-b-2 text-lg border-b-rose-500 cursor-pointer" data-tab="login" data-role="tab">Đăng nhập</div>
					<div class="nav-item px-4 py-2 w-fit border-b-2 text-lg cursor-pointer" data-tab="register" data-role="tab">Đăng ký</div>
				</div>
			</div>
		<?php endif; ?>

		<div class="dvu-auth__panels">
			<div class="dvu-auth__login-form" data-panel="login" data-role="panel">
				<div class="dvu-auth__form-title mb-3 lg:mb-6">
					<h3 class="text-2xl"><?php esc_html_e('Login', 'woocommerce'); ?></h3>
				</div>
				<form class="woocommerce-form woocommerce-form-login login" method="post">

					<?php do_action('woocommerce_login_form_start'); ?>

					<div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mb-3">
						<label for="username" class="form-label"><?php esc_html_e('Username or email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
						<input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" placeholder="<?php esc_html_e('Username or email address', 'woocommerce'); ?>" name="username" id="username" autocomplete="username" value="<?php echo (! empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																																																																																																																																											?>
					</div>
					<div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide  mb-3">
						<label for="password" class="form-label"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
						<input class="woocommerce-Input woocommerce-Input--text input-text form-control" placeholder="<?php esc_html_e('Password', 'woocommerce'); ?>" type="password" name="password" id="password" autocomplete="current-password" />
					</div>

					<?php do_action('woocommerce_login_form'); ?>

					<div class="form-row flex items-center mb-3">
						<input class="woocommerce-form__input woocommerce-form__input-checkbox border rounded-sm mr-2" name="rememberme" type="checkbox" id="rememberme" value="forever" />
						<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme form-check-label cursor-pointer" for="rememberme" style="margin-bottom: 0;">
							<span><?php esc_html_e('Remember me', 'woocommerce'); ?></span>
						</label>
						<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
					</div>

					<div class="button mb-3">
						<button type="submit" class="px-3 py-2 rounded-md bg-rose-500 text-white woocommerce-button button woocommerce-form-login__submit<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" name="login" value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Log in', 'woocommerce'); ?></button>
					</div>
					<div class="mb-6">
						<p class="woocommerce-LostPassword lost_password">
							<a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>
						</p>
					</div>
					<?php do_action('woocommerce_login_form_end'); ?>
				</form>
			</div>
			<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>
				<div class="dvu-auth__register-form hidden" data-panel="register" data-role="panel">
					<div class="dvu__register-form-title  mb-3 lg:mb-6">
						<h3 class="text-2xl"><?php esc_html_e('Register', 'woocommerce'); ?></h3>
					</div>
					<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?>>

						<?php do_action('woocommerce_register_form_start'); ?>

						<?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

							<div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
								<label for="reg_username" class="form-label"><?php esc_html_e('Username', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
								<input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" id="reg_username" placeholder="<?php esc_html_e('Username', 'woocommerce'); ?>" autocomplete="username" value="<?php echo (! empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																																																																																																																																						?>
							</div>

						<?php endif; ?>

						<div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
							<label for="reg_email" class="form-label"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
							<input type="email" class="form-control woocommerce-Input woocommerce-Input--text input-text" placeholder="<?php esc_html_e('Email address', 'woocommerce'); ?>" name="email" id="reg_email" autocomplete="email" value="<?php echo (! empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																																																																																																																																	?>
						</div>

						<?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>

							<div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
								<label for="reg_password" class="form-label"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
								<input type="password" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="password" id="reg_password" autocomplete="new-password" placeholder="<?php esc_html_e('Password', 'woocommerce'); ?>" />
							</div>

						<?php else : ?>

							<p><?php esc_html_e('A link to set a new password will be sent to your email address.', 'woocommerce'); ?></p>

						<?php endif; ?>

						<?php do_action('woocommerce_register_form'); ?>

						<div class="woocommerce-form-row form-row">
							<?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
							<button type="submit" class="px-3 py-2 rounded-md bg-rose-500 text-white woocommerce-Button woocommerce-button button<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?> woocommerce-form-register__submit" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>
						</div>

						<?php do_action('woocommerce_register_form_end'); ?>

					</form>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php do_action('woocommerce_after_customer_login_form'); ?>
<script>
	(function($) {

		const authTabs = $('.dvu__auth-nav-items');
		const tabItems = authTabs.find('div[data-role="tab"]')

		const authPanelWraper = $('.dvu-auth__panels');

		authTabs.on('click', '.nav-item', function() {
			const tabName = $(this).data('tab');
			const panelItem = authPanelWraper.find(`div[data-panel="${tabName}"]`);
			const panelItems = authPanelWraper.find('div[data-role="panel"');

			for (let i = 0; i < panelItems.length; i++) {
				$(panelItems[i]).addClass('hidden')
			}
			for (let i = 0; i < tabItems.length; i++) {
				$(tabItems[i]).removeClass('border-b-rose-500')
			}

			panelItem.removeClass('hidden')
			$(this).addClass('border-b-rose-500')
			console.log(panelItem)

		})
	})(jQuery)
</script>