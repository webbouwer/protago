<?php
/* protago
 * customizer_content.php
 */

// customizer content
function protago_customizer_content( $wp_customize ){

   // content panel
 	$wp_customize->add_panel('protago_content', array(
 	    'title'    => __('Content', 'protago'),
 			'priority' => 20,
 	));



  $wp_customize->add_section('protago_maincontent', array(
    'title'    => __('Main content', 'protago'),
    'panel'  => 'protago_content',
    'priority' => 30,
  ));

    $wp_customize->add_section('protago_subcontent', array(
      'title'    => __('Sub content', 'protago'),
      'panel'  => 'protago_content',
      'priority' => 30,
    ));


  	$wp_customize->add_section('background_image', array(
        'title'    => __('Background Image', 'protago'),
        'panel'  => 'protago_content',
  			'priority' => 60,
  	));

    $wp_customize->add_setting( 'protago_content_width' , array(
      'default' => 'content',
      'priority' => 60,
      'sanitize_callback' => 'protago_sanitize_default',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'protago_content_width', array(
          'label'       => __( 'Content width', 'protago' ),
          'section'     => 'protago_maincontent',
          'settings'    => 'protago_content_width',
          'description' => __( 'Select content width', 'protago' ),
          'type'    		=> 'select',
          'choices' 		=> array(
                    'content'  => __( 'Content -  max. content width', 'protago' ),
                    'center'    => __( 'Centered - min. size centered', 'protago' ),
                    'full'   => __( 'Full - fullscreen width', 'protago' ),
          )
    )));

}
add_action( 'customize_register', 'protago_customizer_content' );
