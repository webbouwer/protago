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

  // Bottom widgets bar style
  $wp_customize->add_setting( 'protago_footer_widgetbar_display' , array(
    'default' => 'hide',
    'priority' => 20,
    'sanitize_callback' => 'protago_sanitize_default',
  ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_footer_widgetbar_display', array(
        'label'       => __( 'Widgetbar display', 'protago' ),
        'section'     => 'protago_widgetbar_display',
        'settings'    => 'protago_footer_widgetbar_display',
        'description' => __( 'Select widgetbar display. Depending on active widgets keep equal sized columns or choose 1 large widget column (size 2/5,2/4,2/3)', 'protago' ),
        'type'    		=> 'select',
        'choices' 		=> array(
                  'equal'    => __( 'Display all columns in equal size', 'protago' ),
                  'wid1'  => __( 'Column widget 1 large (left)', 'protago' ),
                  'wid2'  => __( 'Column widget 2 large', 'protago' ),
                  'wid3'  => __( 'Column widget 3 large', 'protago' ),
                  'wid4'  => __( 'Column widget 4 large', 'protago' ),
                  'wid5'  => __( 'Column widget 5 large (right)', 'protago' ),
                  'hide'   => __( 'Do not display widget bar', 'protago' ),
        )
  )));

  $wp_customize->add_setting( 'protago_footer_widgetbar_width' , array(
    'default' => 'content',
    'priority' => 30,
    'sanitize_callback' => 'protago_sanitize_default',
  ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_footer_widgetbar_width', array(
        'label'       => __( 'Widgetbar width', 'protago' ),
        'section'     => 'protago_widgetbar_display',
        'settings'    => 'protago_footer_widgetbar_width',
        'description' => __( 'Select bottombar width', 'protago' ),
        'type'    		=> 'select',
        'choices' 		=> array(
                  'content'  => __( 'Content -  max. content width', 'protago' ),
                  'center'    => __( 'Centered - min. size centered', 'protago' ),
                  'full'   => __( 'Full - fullscreen width', 'protago' ),
        )
  )));

 	// footer bottom menu bar style
 	$wp_customize->add_setting( 'protago_footer_bottombar_display' , array(
 		'default' => 'hide',
 		'priority' => 40,
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
 									'center'  => __( 'center  -  menu centered between widgets inline center', 'protago' ),
 									'right'    => __( 'right - menu right, widgets left', 'protago' ),
 									'hide'   => __( 'Do not display bottommenu bar', 'protago' ),
 				)
 	)));

 	$wp_customize->add_setting( 'protago_footer_bottombar_width' , array(
 		'default' => 'content',
 		'priority' => 50,
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
 		'priority' => 60,
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
 									'center'  => __( 'center  -  copyright centered between widgets inline center', 'protago' ),
 									'right'    => __( 'right - copyright text right, widget left', 'protago' ),
 									'hide'   => __( 'Do not display footnote bar', 'protago' ),
 				)
 	)));
 	$wp_customize->add_setting( 'protago_footer_footnote_width' , array(
 		'default' => 'content',
 		'priority' => 70,
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
