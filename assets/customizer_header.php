<?php

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
$wp_customize->add_section('header_image', array(
  'title'    => __('Header Image', 'protago'),
  'panel'  => 'protago_header',
  'priority' => 50,
));

// mainbar display
// left | inline left | center | inline center | inline right | right
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
          'center'  => __( 'center - logo top center, menu and widgets inline center below', 'protago' ),
          'incenter'  => __( 'inline center - logo, menu and widgets inline center, logo centered', 'protago' ),
          'inright'    => __( 'inline right - logo and menu (rtl) right inline, widgets left', 'protago' ),
          'right'   => __( 'right - logo right, menu (rtl) and widgets inline left', 'protago' ),
          'hide'   => __( 'hide - no display', 'protago' ),
      )
  )));

    // mainbar width
    // full | content | center
    $wp_customize->add_setting( 'protago_header_mainbar_width' , array(
             'default' => 'content',
             'priority' => 40,
             'sanitize_callback' => 'protago_sanitize_default',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_header_mainbar_width', array(
            'label'       => __( 'Mainbar display', 'protago' ),
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

  // mainbar spaced
  // spaced | collapsed
	$wp_customize->add_setting( 'protago_header_mainbar_spaced' , array(
     'default' => 'fit',
     'priority' => 40,
     'sanitize_callback' => 'protago_sanitize_default',
  ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_header_mainbar_spaced', array(
    'label'       => __( 'Mainbar spaced', 'protago' ),
    'section'     => 'protago_mainbar_display',
    'settings'    => 'protago_header_mainbar_spaced',
    'description' => __( 'Select mainbar width', 'protago' ),
    'type'    		=> 'radio',
    'choices' 		=> array(
               'spaced'  => __( 'Spaced content -  horizontal strech elements max. content (full) width', 'protago' ),
               'fit'    => __( 'Fit content - horizontal compact elments min. content sizes', 'protago' )
    )
  )));

}
add_action( 'customize_register', 'protago_customizer_header' );
