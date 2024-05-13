<ul class="sgh-vertical-menu sgh-vertical-menu-side-home">
	<?php if(has_nav_menu('vertical')){
			wp_nav_menu( array( 
			'theme_location'    => 'vertical',
			'container'         => '',
			'container_class'   =>  '',
			'container_id'		=>	'',
			'fallback_cb'		=>	'',
			'items_wrap'		=> '%3$s',
			'walker'            => new Dv_Nav_Vertical_Walker(),
		));
	}
	?>
</ul>