<?php
/**
 * Template for displaying search forms in saigonhome
 *
 * @package WordPress
 * @subpackage saigonhome
 * @since 1.0
 * @version 1.0
 */

?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="hidden" value="post" name="post_type" id="post_type" />
	<div class="form-row" style="align-items: flex-end">
	<div class="col col-md-8 mb-3">
		<label for="<?php echo $unique_id; ?>"><span class="screen-reader-text"><?php echo _x( 'Tìm kiếm:', 'label', 'saigonhome' ); ?></span></label>
		<input type="search" id="<?php echo $unique_id; ?>" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Nhập từ khóa &hellip;', 'placeholder', 'saigonhome' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</div>
	<div class="col col-md-4 mb-3">
	<button type="submit" class="search-submit btn btn-warning"><i class="sghome-icon sghome-magnifier"></i><span class="screen-reader-text"><?php echo _x( 'Tìm kiếm', 'submit button', 'saigonhome' ); ?></span></button>
</div>
</div>
</form>
