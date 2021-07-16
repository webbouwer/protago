<?php
/* protago
 * customizer.php
 */

// customizer default sanitize function
function protago_sanitize_default($obj){
    return $obj;     // todo .. empty sanitizer
}

// customizer global
function protago_customizer_global( $wp_customize ){

	// REMOVE some core theme settings first
	$wp_customize->remove_control('display_header_text');
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_control('background_color');
	$wp_customize->remove_panel('colors');

	$protago_themename = get_option( 'stylesheet' );
 	$protago_themename = preg_replace("/\W/", "_", strtolower( $protago_themename ) );

  // add panels
  $wp_customize->add_panel('protago_global', array(
    'title'    => __('Global', 'protago'),
    'priority' => 10,
  ));


	$wp_customize->add_section('static_front_page', array(
		'title'    => __('Frontpage Type', 'protago'),
		'panel'  => 'protago_global',
		'priority' => 30,
	));

	/*
	$wp_customize->add_section('custom_css', array(
		'title'    => __('Custom CSS', 'protago'),
		'panel'  => 'protago_style',
		'priority' => 50,
	));
	*/



}
add_action( 'customize_register', 'protago_customizer_global' );
