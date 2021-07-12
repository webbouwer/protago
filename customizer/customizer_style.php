<?php
/* protago
 * customizer_style.php
 */

// customizer style
function protago_customizer_style( $wp_customize ){
 /*
 $wp_customize->add_panel('protago_style', array(
    'title'    => __('Style', 'protago'),
    'priority' => 30,
  ));
 */
}
add_action( 'customize_register', 'protago_customizer_style' );
