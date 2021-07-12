<?php
/* protago
 * customizer_footer.php
 */

// customizer footer
function protago_customizer_footer( $wp_customize ){

  // footer panel
  $wp_customize->add_panel('protago_footer', array(
    'title'    => __('Footer', 'protago'),
    'priority' => 20,
  ));

  $wp_customize->add_section('protago_bottombar_display', array(
  	'title'    => __('Bottombar', 'protago'),
  	'panel'  => 'protago_footer',
  	'priority' => 40,
  ));

  $wp_customize->add_section('protago_footnotes_display', array(
  	 'title'    => __('Footnotes', 'protago'),
  	 'panel'  => 'protago_footer',
  	'priority' => 40,
  ));

 	// footer bottom menu bar style
 	$wp_customize->add_setting( 'protago_footer_bottombar_display' , array(
 		'default' => 'hide',
 		'priority' => 30,
 		'sanitize_callback' => 'protago_sanitize_default',
 	));
 	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_footer_bottombar_display', array(
 				'label'       => __( 'Bottombar display', 'protago' ),
 				'section'     => 'protago_bottombar_display',
 				'settings'    => 'protago_footer_bottombar_display',
 				'description' => __( 'Select bottombar menu and widgets display', 'protago' ),
 				'type'    		=> 'select',
 				'choices' 		=> array(
 									'left'    => __( 'left - menu left, widgets right', 'protago' ),
 									'centerleft'  => __( 'center left -  menu center, widgets inline right', 'protago' ),
 									'centerright'  => __( 'center right -  menu center, widgets inline left', 'protago' ),
 									'right'    => __( 'right - menu right, widgets left', 'protago' ),
 									'hide'   => __( 'Do not display bottommenu bar', 'protago' ),
 				)
 	)));

 	$wp_customize->add_setting( 'protago_footer_bottombar_width' , array(
 		'default' => 'content',
 		'priority' => 40,
 		'sanitize_callback' => 'protago_sanitize_default',
 	));
 	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_footer_bottombar_width', array(
 				'label'       => __( 'Bottombar width', 'protago' ),
 				'section'     => 'protago_bottombar_display',
 				'settings'    => 'protago_footer_bottombar_width',
 				'description' => __( 'Select bottombar width', 'protago' ),
 				'type'    		=> 'select',
 				'choices' 		=> array(
 									'content'  => __( 'Content -  max. content width', 'protago' ),
 									'center'    => __( 'Centered - min. size centered', 'protago' ),
 									'full'   => __( 'Full - fullscreen width', 'protago' ),
 				)
 	)));

 	// footnotes bar style
 	$wp_customize->add_setting( 'protago_footer_footnote_display' , array(
 		'default' => 'hide',
 		'priority' => 50,
 		'sanitize_callback' => 'protago_sanitize_default',
 	));
 	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_footer_footnote_display', array(
 				'label'       => __( 'Footnotes display', 'protago' ),
 				'section'     => 'protago_footnotes_display',
 				'settings'    => 'protago_footer_footnote_display',
 				'description' => __( 'Select footnote copyright and widget display', 'protago' ),
 				'type'    		=> 'select',
 				'choices' 		=> array(
 									'left'  => __( 'left -  copyright text left, widget right', 'protago' ),
 									'center'    => __( 'center - copyright text and widget inline center', 'protago' ),
 									'right'    => __( 'right - copyright text right, widget left', 'protago' ),
 									'hide'   => __( 'Do not display footnote bar', 'protago' ),
 				)
 	)));
 	$wp_customize->add_setting( 'protago_footer_footnote_width' , array(
 		'default' => 'content',
 		'priority' => 60,
 		'sanitize_callback' => 'protago_sanitize_default',
 	));
 	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_footer_footnote_width', array(
 				'label'       => __( 'Footnotes width', 'protago' ),
 				'section'     => 'protago_footnotes_display',
 				'settings'    => 'protago_footer_footnote_width',
 				'description' => __( 'Select footnote width', 'protago' ),
 				'type'    		=> 'select',
 				'choices' 		=> array(
 									'content'  => __( 'Content -  max. content width', 'protago' ),
 									'center'    => __( 'Centered - min. size centered', 'protago' ),
 									'full'   => __( 'Full - fullscreen width', 'protago' ),
 				)
 	)));

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
add_action( 'customize_register', 'protago_customizer_footer' );
