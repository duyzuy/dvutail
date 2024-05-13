<?php global $current_user; ?>
<div class="dvu-item-account">
	<?php if ( is_user_logged_in() ) { ?>
			<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="sgh-btn-user-account" title="<?php _e('My Account','dvutheme'); ?>">
				<i class="icsgsv4 icsgsv4-ant-design_user-outlined"></i>
				<span class="label"><?php echo $current_user->display_name  ?></span>
			</a>
	<?php } else { ?>
		<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class=" link-register" title="<?php _e('Đăng ký','dvutheme'); ?>">
			<i class="icsgsv4 icsgsv4-ant-design_user-outlined"></i>
			<span class="label"><?php _e('Đăng ký','dvutheme'); ?></span>
		</a>
	<?php } ?>
</div>