<ul>
	<?php if (has_nav_menu('primary_mobile')) {
		wp_nav_menu(array(
			'theme_location'    => 'primary_mobile',
			'container'         => '',
			'container_class'   =>  '',
			'container_id'		=>	'',
			'fallback_cb'		=>	'',
			'items_wrap'		=> '%3$s',
			'walker'            => new Dvtail_Nav_Mobile_Walker(),
		));
	}
	?>
</ul>