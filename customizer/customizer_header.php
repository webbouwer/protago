<?php
/* protago
 * customizer_header.php
 */

// customizer header
function protago_customizer_header( $wp_customize ){

  // header panel
	$wp_customize->add_panel('protago_header', array(
	    'title'    => __('Header', 'protago'),
			'priority' => 20,
	));

  	$wp_customize->add_section('protago_topbar_display', array(
      'title'    => __('Top bar', 'protago'),
      'panel'  => 'protago_header',
  		'priority' => 30,
    ));

  	$wp_customize->add_section('protago_mainbar_display', array(
      'title'    => __('Main bar', 'protago'),
      'panel'  => 'protago_header',
  		'priority' => 40,
    ));


 // header top menu bar style
 $wp_customize->add_setting( 'protago_header_topbar_display' , array(
   'default' => 'hide',
   'priority' => 40,
   'sanitize_callback' => 'protago_sanitize_default',
 ));
 $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_header_topbar_display', array(
       'label'       => __( 'Topbar display', 'protago' ),
       'section'     => 'protago_topbar_display',
       'settings'    => 'protago_header_topbar_display',
       'description' => __( 'Select topbar menu and widgets display', 'protago' ),
       'type'    		=> 'select',
       'choices' 		=> array(
                 'right'   => __( 'right - menu right, widgets left', 'protago' ),
                 'center'  => __( 'center - inline centered menu between widgets', 'protago' ),
                 'left'    => __( 'left - menu left, widgets right', 'protago' ),
                 'hide'   => __( 'Do not display topbar', 'protago' ),
       )
 )));

     $wp_customize->add_setting( 'protago_header_topbar_width' , array(
       'default' => 'content',
       'priority' => 40,
       'sanitize_callback' => 'protago_sanitize_default',
     ));
     $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_header_topbar_width', array(
           'label'       => __( 'Topbar width', 'protago' ),
           'section'     => 'protago_topbar_display',
           'settings'    => 'protago_header_topbar_width',
           'description' => __( 'Select topbar width', 'protago' ),
           'type'    		=> 'select',
           'choices' 		=> array(
                     'content'  => __( 'Content -  max. content width', 'protago' ),
                     'center'    => __( 'Centered - min. content size centered', 'protago' ),
                     'full'   => __( 'Full - fullscreen width', 'protago' ),
           )
     )));

 // header main menu bar style
 $wp_customize->add_setting( 'protago_header_mainbar_display' , array(
   'default' => 'right',
   'priority' => 20,
   'sanitize_callback' => 'protago_sanitize_default',
 ));
 $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_header_mainbar_display', array(
       'label'       => __( 'Mainbar display', 'protago' ),
       'section'     => 'protago_mainbar_display',
       'settings'    => 'protago_header_mainbar_display',
       'description' => __( 'Select mainbar logo, menu and widgets display', 'protago' ),
       'type'    		=> 'select',
       'choices' 		=> array(
           'left'   => __( 'left - logo left, menu and widgets inline right', 'protago' ),
           'inleft'    => __( 'inline left - logo and menu inline left, widgets right', 'protago' ),
           'incenter'  => __( 'inline center - logo, menu and widgets inline center, logo centered', 'protago' ),
           'center'  => __( 'center - logo top center, menu and widgets inline center below', 'protago' ),
           'inright'    => __( 'inline right (rtl) - logo and menu right inline, widgets right', 'protago' ),
           'right'   => __( 'right (rtl)- logo right, menu and widgets inline left', 'protago' ),
       )
  )));

  $wp_customize->add_setting( 'protago_header_mainbar_width' , array(
     'default' => 'content',
     'priority' => 40,
     'sanitize_callback' => 'protago_sanitize_default',
  ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_header_mainbar_width', array(
    'label'       => __( 'Mainbar width', 'protago' ),
    'section'     => 'protago_mainbar_display',
    'settings'    => 'protago_header_mainbar_width',
    'description' => __( 'Select mainbar width', 'protago' ),
    'type'    		=> 'select',
    'choices' 		=> array(
               'content'  => __( 'Content -  max. content width', 'protago' ),
               'center'    => __( 'Centered - min. content size centered', 'protago' ),
               'full'   => __( 'Full - fullscreen width', 'protago' ),
    )
  )));

}
add_action( 'customize_register', 'protago_customizer_header' );
