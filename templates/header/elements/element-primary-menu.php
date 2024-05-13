<ul id="dvu__primary-menu-desktop" class="<?php echo isset($args['class']) ? $args['class'] : "" ?>">
	<?php if (has_nav_menu('primary')) {
		wp_nav_menu(array(
			'theme_location'    => 'primary',
			'container'         => '',
			'container_class'   =>  '',
			'container_id'		=>	'',
			'fallback_cb'		=>	'',
			'items_wrap'		=> '%3$s',
			'walker'            => new Dv_Nav_Walker(),
		));
	} else {
		echo '<li><a href="/wp-admin/nav-menus.php">Set primary menu</a></li>';
	} ?>
</ul>