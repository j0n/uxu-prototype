<?php


// Options Page 
//include_once( 'add-ons/acf-options-page/acf-options-page.php' );


/**
 *  Register Field Groups
 *
 *  The register_field_group function accepts 1 array which holds the relevant data to register a field group
 *  You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 */

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_products-fields',
		'title' => 'Products fields',
		'fields' => array (
			array (
				'key' => 'field_51715623a4803',
				'label' => 'Product number',
				'name' => 'product_number',
				'type' => 'text',
				'instructions' => 'Julius Product number',
				'default_value' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_5171566ecdf1c',
				'label' => 'Type',
				'name' => 'type',
				'type' => 'text',
				'instructions' => 'Type of product',
				'default_value' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_51715680cdf1d',
				'label' => 'Extends UxU',
				'name' => 'extends_uxu',
				'type' => 'text',
				'instructions' => 'Amount of seconds the product extends the UxU festival',
				'default_value' => '',
				'formatting' => 'none',
			),
			array (
				'key' => 'field_5172c3adc2d6f',
				'label' => 'Product Link',
				'name' => 'product_link',
				'type' => 'text',
				'instructions' => 'link to the product at Julius biljett service',
				'default_value' => '',
				'formatting' => 'none',
			),
		),
		'location' => array (
			'rules' => array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'products',
					'order_no' => 0,
				),
			),
			'allorany' => 'all',
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
