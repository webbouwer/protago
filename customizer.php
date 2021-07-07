<?php
function protago_theme_customizer( $wp_customize ){

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

  // move sections
  $wp_customize->add_section('title_tagline', array(
    'title'    => __('Identity', 'protago'),
    'panel'  => 'protago_global',
    'priority' => 20,
  ));
	$wp_customize->add_section('static_front_page', array(
		'title'    => __('Frontpage Type', 'protago'),
		'panel'  => 'protago_global',
		'priority' => 30,
	));
	$wp_customize->add_section('header_image', array(
      'title'    => __('Header Image', 'protago'),
      'panel'  => 'protago_global',
			'priority' => 20,
	));
	$wp_customize->add_section('background_image', array(
      'title'    => __('Background Image', 'protago'),
      'panel'  => 'protago_global',
			'priority' => 20,
	));

	// add sections
	$wp_customize->add_setting( 'protago_logo_image', array(
		'sanitize_callback' => 'protago_sanitize_default',
	  'priority' => 30,
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'imagazine_topbar_logo_image', array(
		'label'    => __( 'Logo image', 'protago' ),
		'section'  => 'title_tagline',
		'settings' => 'protago_logo_image',
		'description' => __( 'Upload or select a logo image', 'protago' ),
	) ) );

}
add_action( 'customize_register', 'protago_theme_customizer' );

// default sanitize function
function protago_sanitize_default($obj){
    //.. empty sanitizer
    return $obj;
}
