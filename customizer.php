<?php
/* protago
 * customizer.php
 */

// customizer default sanitize function
function protago_sanitize_default($obj){
    return $obj;     // todo .. empty sanitizer
}

// customizer
function protago_customizer_init( $wp_customize ){

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

  // global panel
	$wp_customize->add_section('static_front_page', array(
		'title'    => __('Frontpage Type', 'protago'),
		'panel'  => 'protago_global',
		'priority' => 30,
	));

  // identity panel
  $wp_customize->add_section('title_tagline', array(
    'title'    => __('Identity', 'protago'),
    'panel'  => 'protago_global',
    'priority' => 10,
  ));


  // identity options

 	// logo image
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
add_action( 'customize_register', 'protago_customizer_init' );
