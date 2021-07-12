<?php
/* protago
 * customizer_identity.php
 */

// customizer identity
function protago_customizer_identity( $wp_customize ){

  // identity panel
  $wp_customize->add_section('title_tagline', array(
    'title'    => __('Identity', 'protago'),
    'panel'  => 'protago_global',
    'priority' => 10,
  ));

 	// identity options

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

}
add_action( 'customize_register', 'protago_customizer_identity' );
