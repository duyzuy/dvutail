<?php

/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 *
 * @var bool   $readonly If the input should be set to readonly mode.
 * @var string $type     The input type attribute.
 */

defined('ABSPATH') || exit;

/* translators: %s: Quantity. */
$label = !empty($args['product_name']) ? sprintf(esc_html__('%s quantity', 'woocommerce'), wp_strip_all_tags($args['product_name'])) : esc_html__('Quantity', 'woocommerce');

?>
<div class="quantity flex items-center">
	<?php
	/**
	 * Hook to output something before the quantity input field.
	 *
	 * @since 7.2.0
	 */
	do_action('woocommerce_before_quantity_input_field');
	?>
	<!-- <label class="screen-reader-text" for="<?php echo esc_attr($input_id); ?>"><?php echo esc_attr($label); ?></label> -->
	<label class="label quantity__label inline-block whitespace-nowrap mr-3" for="<?php echo esc_attr($input_id); ?>">Số lượng</label>
	<div class="quantity__control input-group flex items-center bg-slate-100 rounded-md w-fit">
		<div class="quantity-button quantity-down w-9 h-9 flex items-center justify-center cursor-pointer hover:bg-slate-200 rounded-md">
			<span class="dvu-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
					<path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8" />
				</svg>
			</span>
		</div>
		<input
			type="<?php echo esc_attr($type); ?>"
			<?php echo $readonly ? 'readonly="readonly"' : ''; ?>
			id="<?php echo esc_attr($input_id); ?>"
			class="flex-1 text-center border-none bg-transparent ring-0 ring-transparent outline-offset-0 shadow-none ring-offset-0 outline-none w-full <?php echo esc_attr(join(' ', (array) $classes)); ?>"
			name="<?php echo esc_attr($input_name); ?>"
			value="<?php echo esc_attr($input_value); ?>" aria-label="<?php esc_attr_e('Product quantity', 'woocommerce'); ?>"
			size="4" min="<?php echo esc_attr($min_value); ?>" max="<?php echo esc_attr(0 < $max_value ? $max_value : ''); ?>"
			<?php if (!$readonly) : ?>
			step="<?php echo esc_attr($step); ?>" placeholder="<?php echo esc_attr($placeholder); ?>"
			inputmode="<?php echo esc_attr($inputmode); ?>"
			autocomplete="<?php echo esc_attr(isset($autocomplete) ? $autocomplete : 'on'); ?>"
			<?php endif; ?> />
		<div class="quantity-button quantity-up w-9 h-9 flex items-center justify-center cursor-pointer  hover:bg-slate-200 rounded-md">
			<span class="dvu-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
					<path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
				</svg>
			</span>
		</div>
	</div>
	<?php
	/**
	 * Hook to output something after quantity input field
	 *
	 * @since 3.6.0
	 */
	do_action('woocommerce_after_quantity_input_field');
	?>
</div>
<?php
