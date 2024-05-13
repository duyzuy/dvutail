<ul id="dvu__primary-menu-mobile" class="dvu__primary-menu-mobile">
	<?php if (has_nav_menu('primary_mobile')) {
		wp_nav_menu(array(
			'theme_location'    => 'primary_mobile',
			'container'         => '',
			'container_class'   =>  '',
			'container_id'		=>	'',
			'fallback_cb'		=>	'',
			'items_wrap'		=> '%3$s',
			'walker'            => new Dv_Nav_Vertical_Walker(),
		));
	} else {
		echo '<li><a href="/wp-admin/nav-menus.php">Set primary menu</a></li>';
	} ?>
</ul>