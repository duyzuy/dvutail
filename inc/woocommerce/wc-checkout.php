<?php

add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');
function custom_override_checkout_fields($fields)
{

	unset($fields['billing']['billing_company']);


	$fields['billing']['billing_email']['priority'] = 30;
	$fields['billing']['billing_phone']['priority'] = 40;
	$fields['billing']['billing_country']['priority'] = 50;
	$fields['billing']['billing_city']['priority'] = 55;
	$fields['billing']['billing_address_1']['priority'] = 100;
	$fields['billing']['billing_postcode']['priority'] = 120;
	return $fields;
}

// add_filter( 'woocommerce_cart_shipping_method_full_label', 'change_cart_shipping_method_full_label', 10, 2 );
// function change_cart_shipping_method_full_label( $label, $method ) {
//     $has_cost  = 0 < $method->cost;
//     $hide_cost = ! $has_cost && in_array( $method->get_method_id(), array( 'free_shipping', 'local_pickup' ), true );

//     if ( ! $has_cost && ! $hide_cost ) {
//         $label  = $method->get_label() . ': Free';
//     }
//     return $label;
// }




/*====================Add-custom-class-to-checkout-billing-fields==========================================*/
add_filter('woocommerce_form_field_args',  'add_custom_class_to_checkout_billing_fields', 10, 3);
function add_custom_class_to_checkout_billing_fields($args, $key, $value)
{



	$args['input_class'] = array('form-control');
	$args['label_class'] = array('form-label');


	return $args;
}



function dvu_checkout_billing_fields($checkout)
{

	if (!$checkout) {
		return null;
	}

	$fields = $checkout->get_checkout_fields('billing');

	foreach ($fields as $key => $field) {

		if ($key === 'billing_first_name') {
?>


		<?php
		}
		$classes = '';
		if (count($field['class'])) {
			$classes =  implode(" ", $field['class']);
		}
		if ($field['required'] === true) {
			$classes = $classes . ' validate-required';
		}
		$value = $checkout->get_value($key)
		?>
		<div id="<?php echo $key . '_field'; ?>" class="<?php echo $classes; ?> custom-billing-form" data-priority="<?php echo $field['priority']; ?>">
			<label for="<?php echo $key; ?>" class="inline-block mb-3">
				<?php echo $field['label']; ?>
				<?php $field['required'] === true ? '<span class="required">*</span>' : '' ?>
			</label>
			<div>
				<input
					name="<?php echo $key; ?>"
					id="<?php echo $key; ?>"
					type="<?php echo $field['type']; ?>"
					autocomplete="<?php echo $field['autocomplete']; ?>"
					placeholder="<?php echo $field['placeholder']; ?>"
					class="border px-3 py-2 rounded-sm border-gray-200 h-10 <?php echo $field['input_class'];  ?>"
					value="<?php echo $value; ?>" />
			</div>
		</div>
<?php
		// woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );


	}
}
