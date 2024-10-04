<?php

/**
 * Template for displaying search forms in dvutail
 *
 * @package WordPress
 * @subpackage dvutail
 * @since 1.0
 * @version 1.0
 */

?>

<?php $unique_id = esc_attr(uniqid('search-form-')); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
	<input type="hidden" value="post" name="post_type" id="post_type" />
	<div class="flex items-center w-full max-w-[550px] bg-white p-1 rounded-md shadow-sm">
		<div class="w-full">
			<label for="<?php echo $unique_id; ?>"><span class="screen-reader-text"><?php echo _x('Tìm kiếm:', 'label', 'dvutail'); ?></span></label>
			<input type="search" id="<?php echo $unique_id; ?>" class="search-field outline-none ring-0 h-10 border-transparent rounded-md w-full px-3 py-2" placeholder="<?php echo esc_attr_x('Nhập từ khóa &hellip;', 'placeholder', 'dvutail'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		</div>
		<button type="submit" class="rounded-md search-submit bg-yellow-400 px-3 whitespace-nowrap h-10 w-fit"><?php echo _x('Tìm kiếm', 'submit button', 'dvutail'); ?></button>
	</div>
</form>