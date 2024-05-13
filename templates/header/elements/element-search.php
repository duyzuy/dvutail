<?php 
$isMobile = $args['is_mobile'];


?>
<div class="dvu-item-search">
	<div class="search-btn d-flex align-items-center">
		<span class="dvu-icon size-24">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
				<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
			</svg>
		</span>
		<span class="label ml-2"><?php echo esc_attr_x( 'Tìm kiếm', 'placeholder', 'dvutheme' ); ?></span>
	</div>
	<div class="form-search-wrapper">
		<form arole="search" method="get" class="search-form header-form-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<div class="input-group">
				<input type="hidden" name="post_type" value="product" />
				<input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Nhập sản phẩm muốn tìm &hellip;', 'placeholder', 'dvutheme' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
				<button class="btn btn-black" type="submit">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
						<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
					</svg>
					<span class="label"><?php echo esc_attr_x( 'Tìm kiếm', 'placeholder', 'dvutheme' ); ?></span>
				</button>
			</div> 
		</form>
	</div>
</div>
