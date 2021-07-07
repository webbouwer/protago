<?php
/* protago
 * top.php
 */

if ( get_theme_mod( 'protago_logo_image' ) ){
  echo '<a href="'.esc_url( home_url( '/' ) ).'" class="site-logo" ';
  echo 'title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" ';
  echo 'rel="home"><img src="'.get_theme_mod( 'protago_logo_image' ).'" ';
  echo 'alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ).' - '.get_bloginfo( 'description' ).'"></a>';
}else{
  echo '<div id="site-titlebox"><hgroup><h1 class="site-title">';
  echo '<a href="'.esc_url( home_url( '/' ) ).'" id="site-logo" ';
  echo 'title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" ';
  echo 'rel="home">'.esc_attr( get_bloginfo( 'name', 'display' ) ).'</a>';
  echo '</h1>';
  echo '<h2 class="site-description">'.get_bloginfo( 'description' ).'</h2>';
  echo '</hgroup></div>';
}
// https://developer.wordpress.org/reference/functions/wp_nav_menu/
if ( has_nav_menu( 'topmenu' ) ){
  echo '<div id="topmenubox"><div id="topmenu" class="pos-default"><nav><div class="innerpadding">';
    wp_nav_menu( array( 'theme_location' => 'topmenu' ) );
  echo '<div class="clr"></div></div></nav></div></div>';
}


echo '<div id="mainmenubox"><div id="mainmenu" class="pos-default"><nav><div class="innerpadding">';
  wp_nav_menu( array( 'theme_location' => 'mainmenu' ) );
echo '<div class="clr"></div></div></nav></div></div>';
