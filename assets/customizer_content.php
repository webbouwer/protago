<?php

// customizer header
function protago_customizer_content( $wp_customize ){

  $wp_customize->add_panel('protago_content', array(
    'title'    => __('Content', 'protago'),
    'priority' => 20,
  ));
  $wp_customize->add_section('protago_content_display', array(
    'title'    => __('Content display', 'protago'),
    'panel'  => 'protago_content',
    'priority' => 30,
  ));
  // full | content | center
  $wp_customize->add_setting( 'protago_content_display_width' , array(
           'default' => 'content',
           'priority' => 40,
           'sanitize_callback' => 'protago_sanitize_default',
  ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_content_display_width', array(
          'label'       => __( 'Content width', 'protago' ),
          'section'     => 'protago_content_display',
          'settings'    => 'protago_content_display_width',
          'description' => __( 'Select content width', 'protago' ),
          'type'    		=> 'select',
          'choices' 		=> array(
                     'content'  => __( 'Content -  max. content width', 'protago' ),
                     'center'    => __( 'Centered - min. content size centered', 'protago' ),
                     'full'   => __( 'Full - fullscreen width', 'protago' ),
          )
  )));

}
add_action( 'customize_register', 'protago_customizer_content' );
