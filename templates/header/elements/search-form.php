<?php

$classes = $args['class'] ?  $args['class'] : "";

?>

<div class="search__form w-full ">
	<form role="search" method="get" class="search-form header-form-search" action="<?php echo esc_url(home_url('/')); ?>">
		<input type="hidden" name="post_type" value="product" />
		<div class="form__control flex items-center bg-white rounded-md overflow-hidden">
			<input type="text" name="s" placeholder="<?php echo esc_attr_x('Nhập sản phẩm muốn tìm&hellip;', 'placeholder', 'dvutail'); ?>" autocomplete="product-search" value="<?php echo get_search_query(); ?>" name="s" class="block w-full rounded-sm border-0 py-2 text-gray-900 ring-0 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-0 focus:ring-inset text-sm leading-6">
			<button class="btn flex items-center justify-center w-10" type="submit">
				<span class="icon mr-2">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
						<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
					</svg>
				</span>
				<span class="label sr-only"><?php echo esc_attr_x('Tìm kiếm', 'placeholder', 'dvutail'); ?></span>
			</button>
		</div>
	</form>
</div>