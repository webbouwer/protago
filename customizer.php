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

  // footer panel
  $wp_customize->add_panel('protago_footer', array(
    'title'    => __('Footer', 'protago'),
    'priority' => 20,
  ));



  $wp_customize->add_section('protago_widgetbar_display', array(
  	'title'    => __('Widgetsbar', 'protago'),
  	'panel'  => 'protago_footer',
  	'priority' => 30,
  ));

  $wp_customize->add_section('protago_bottombar_display', array(
  	'title'    => __('Bottombar', 'protago'),
  	'panel'  => 'protago_footer',
  	'priority' => 40,
  ));

  $wp_customize->add_section('protago_footnotes_display', array(
  	 'title'    => __('Footnotes', 'protago'),
  	 'panel'  => 'protago_footer',
  	'priority' => 50,
  ));


   	$wp_customize->add_setting( 'protago_footer_footnote_copyrighttext' , array(
   		'default' => 'Copyright 2021',
   		'sanitize_callback' => 'onepiece_sanitize_default',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_footer_footnote_copyrighttext', array(
               	'label'          => __( 'Copyright text', 'onepiece' ),
               	'section'        => 'protago_footnotes_display',
               	'settings'       => 'protago_footer_footnote_copyrighttext',
               	'type'           => 'textarea',
    	    	'description'    => __( 'Copyright information text.', 'protago' ),
    )));




}
add_action( 'customize_register', 'protago_customizer_global' );
