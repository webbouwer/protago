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
	$wp_customize->add_panel('protago_header', array(
	    'title'    => __('Header', 'protago'),
			'priority' => 20,
	));
	$wp_customize->add_panel('protago_footer', array(
	    'title'    => __('Footer', 'protago'),
			'priority' => 20,
	));
	/*
	$wp_customize->add_panel('protago_style', array(
    'title'    => __('Style', 'protago'),
    'priority' => 30,
  ));
	*/


  // move sections
  $wp_customize->add_section('title_tagline', array(
    'title'    => __('Identity', 'protago'),
    'panel'  => 'protago_global',
    'priority' => 10,
  ));
	$wp_customize->add_section('static_front_page', array(
		'title'    => __('Frontpage Type', 'protago'),
		'panel'  => 'protago_global',
		'priority' => 20,
	));
	$wp_customize->add_section('header_image', array(
      'title'    => __('Header Image', 'protago'),
      'panel'  => 'protago_global',
			'priority' => 50,
	));
	$wp_customize->add_section('background_image', array(
      'title'    => __('Background Image', 'protago'),
      'panel'  => 'protago_global',
			'priority' => 60,
	));

	/*
	$wp_customize->add_section('custom_css', array(
		'title'    => __('Custom CSS', 'protago'),
		'panel'  => 'protago_style',
		'priority' => 50,
	));
	*/


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


	$wp_customize->add_section('protago_bottombar_display', array(
	  'title'    => __('Bottom bar', 'protago'),
	  'panel'  => 'protago_footer',
		'priority' => 40,
	));

	$wp_customize->add_section('protago_copyright_display', array(
	  'title'    => __('Copyright', 'protago'),
	  'panel'  => 'protago_footer',
		'priority' => 40,
	));


	// add options


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

	// header top menu bar style
	$wp_customize->add_setting( 'protago_header_topbar_display' , array(
		'default' => 'hide',
	  'priority' => 40,
		'sanitize_callback' => 'protago_sanitize_default',
  ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_header_topbar_display', array(
        'label'       => __( 'Topbar', 'protago' ),
        'section'     => 'protago_topbar_display',
        'settings'    => 'protago_header_topbar_display',
 	    	'description' => __( 'Select topbar menu and widgets display', 'protago' ),
        'type'    		=> 'select',
    		'choices' 		=> array(
                	'right'   => __( 'right - widgets left, menu right', 'protago' ),
                	'left'    => __( 'left - menu left, widgets right', 'protago' ),
                	'center'  => __( 'center -  menu center, widgets center below', 'protago' ),
					        'hide'   => __( 'Do not display topbar', 'protago' ),
        )
  )));

	// header main menu bar style
	$wp_customize->add_setting( 'protago_header_mainbar_display' , array(
		'default' => 'right',
	  'priority' => 20,
		'sanitize_callback' => 'protago_sanitize_default',
  ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_header_mainbar_display', array(
        'label'       => __( 'Mainbar', 'protago' ),
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

	// header bottom menu bar style
	$wp_customize->add_setting( 'protago_footer_bottombar_display' , array(
		'default' => 'hide',
		'priority' => 40,
		'sanitize_callback' => 'protago_sanitize_default',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_footer_bottombar_display', array(
				'label'       => __( 'Bottombar', 'protago' ),
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

}
add_action( 'customize_register', 'protago_theme_customizer' );

// default sanitize function
function protago_sanitize_default($obj){
    //.. empty sanitizer
    return $obj;
}
