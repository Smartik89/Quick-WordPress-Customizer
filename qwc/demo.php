<?php
add_action( 'customize_register', 'qwc_demo_fields' );
function qwc_demo_fields( $wp_customize ) {
	if( ! class_exists('Qwc_Build') ) 
		return;
	$ctz = new Qwc_Build( $wp_customize );

	$ctz->addSection( 'smk_theme_test_builtin', __('Test built-in', 'smk_theme') );

	$ctz->addField( 'color_test', 'color', array(
		'label' => __('Color test', 'smk_theme'),
	));

	$ctz->addField( 'upload_test', 'upload', array(
		'label' => __('upload test', 'smk_theme'),
	));

	$ctz->addField( 'image_test', 'image', array(
		'label' => __('image test', 'smk_theme'),
	));

	$ctz->addSection( 'smk_theme_fonts', __('Theme fonts', 'smk_theme') );

	$ctz->addField( 'demo_field', 'button', array(
		'label' => __('Body text font family button', 'smk_theme'),
		'button_id' => 'mybtnid',
		'button_value' => 'My button',
	));

	$ctz->addField( 'headings_font', 'font', array(
		'label' => __('Headings Font', 'smk_theme'),
	));

	$ctz->addField( 'demo_field_font', 'font', array(
		'label' => __('Font', 'smk_theme'),
	));

	$ctz->addField( 'demo_field_font2', 'font', array(
		'label' => __('Font', 'smk_theme'),
	));
	$ctz->addField( 'demo_field_font3', 'font', array(
		'label' => __('Font', 'smk_theme'),
	));

	$ctz->addPanel( 'mypn', 'My pn' );
	$ctz->addSection( 'mypn_section', __('My pn section', 'smk_theme') );

	$ctz->addField( 'mypn_demo_field', 'text', array(
		'label' => __('My pn field', 'smk_theme'),
	));

	$ctz->addField( 'mypn_demo_field_range', 'range', array(
		'label' => __('My pn field range', 'smk_theme'),
	));

	$ctz->closePanel();

	$ctz->addField( 'mypn_demo_field2', 'text', array(
		'label' => __('My pn field 2', 'smk_theme'),
	));

	for ($i=0; $i <= 30; $i++) { 
		$ctz->addSection( 'test_sect_'. $i, __('Test section '. $i, 'smk_theme') );

		$ctz->addField( 'test_field'. $i, 'text', array(
			'label' => __('Test field '. $i, 'smk_theme'),
		));
		$ctz->addField( 'test_field'. $i .'_1', 'text', array(
			'label' => __('Test field '. $i .'.1', 'smk_theme'),
		));
	}
}