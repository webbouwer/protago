<?php

// customizer header
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

    // full | content | center
    $wp_customize->add_setting( 'protago_footnotes_display_width' , array(
             'default' => 'content',
             'priority' => 40,
             'sanitize_callback' => 'protago_sanitize_default',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_footnotes_display_width', array(
            'label'       => __( 'Footnotes display', 'protago' ),
            'section'     => 'protago_footnotes_display',
            'settings'    => 'protago_footnotes_display_width',
            'description' => __( 'Select Footnotes display', 'protago' ),
            'type'    		=> 'select',
            'choices' 		=> array(
                       'content'  => __( 'Content -  max. content width', 'protago' ),
                       'center'    => __( 'Centered - min. content size centered', 'protago' ),
                       'full'   => __( 'Full - fullscreen width', 'protago' ),

                       'hide'   => __( 'Hide - no display', 'protago' ),
            )
    )));



    $wp_customize->add_setting( 'protago_footer_footnote_copyrighttext' , array(
      'default' => 'Copyright 2021',
      'sanitize_callback' => 'protago_sanitize_default',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_footer_footnote_copyrighttext', array(
     	'label'          => __( 'Copyright text', 'protago' ),
     	'section'        => 'protago_footnotes_display',
     	'settings'       => 'protago_footer_footnote_copyrighttext',
     	'type'           => 'textarea',
    	'description'    => __( 'Copyright information text.', 'protago' ),
    )));

}
add_action( 'customize_register', 'protago_customizer_footer' );
