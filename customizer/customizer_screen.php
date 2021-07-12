<?php
/* protago
 * customizer_screen.php
 */

// customizer screen
function protago_customizer_screen( $wp_customize ){

  // screen panel
  $wp_customize->add_section('screen_settings', array(
      'title'    => __('Screen settings', 'protago'),
      'panel'  => 'protago_global',
  		'priority' => 20,
  ));

 	// screen options
 	$wp_customize->add_setting( 'protago_screen_content_maxwidth', array(
 		'default' => 1600,
 		'sanitize_callback' => 'protago_sanitize_default',
 	  'priority' => 30,
 	));
 	$wp_customize->add_control( 'protago_screen_content_maxwidth', array(
 	  'type' => 'number',
 	  'section' => 'screen_settings',
 	  'label' => __( 'Content width', 'protago' ),
 	  'description' => __( 'Set maximum width in pixels for all content.', 'protago' ),
 	  'input_attrs' => array(
 		   'min' => 1000,
 		   'max' => 3200,
 		   'step' => 10,
 	   ),
 	));

 	$wp_customize->add_setting( 'protago_screen_tablet_maxwidth', array(
 		'default' => 1140,
 		'sanitize_callback' => 'protago_sanitize_default',
 	  'priority' => 30,
 	));
 	$wp_customize->add_control( 'protago_screen_tablet_maxwidth', array(
 	'type' => 'number',
 	'section' => 'screen_settings',
 	'label' => __( 'Tablet view size', 'protago' ),
 	'description' => __( 'Set maximum width for tablet view.', 'protago' ),
 	'input_attrs' => array(
 		'min' => 640,
 		'max' => 2400,
 		'step' => 10,
 	),
 	));

 	$wp_customize->add_setting( 'protago_screen_mobile_maxwidth', array(
 		'default' => 640,
 		'sanitize_callback' => 'protago_sanitize_default',
 		'priority' => 30,
 	));
 	$wp_customize->add_control( 'protago_screen_mobile_maxwidth', array(
 	'type' => 'number',
 	'section' => 'screen_settings',
 	'label' => __( 'Mobile view size', 'protago' ),
 	'description' => __( 'Set maximum width for mobile view.', 'protago' ),
 	'input_attrs' => array(
 		'min' => 320,
 		'max' => 1800,
 		'step' => 10,
 	),
 	));

}
add_action( 'customize_register', 'protago_customizer_screen' );
