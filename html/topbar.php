<?php
/* protago
 * topbar.php
 */

// https://developer.wordpress.org/reference/functions/wp_nav_menu/


$topbar_display = get_theme_mod( 'protago_header_topbar_display', 'hide');

if( $topbar_display != 'hide'){
  echo '<div id="topbar" class="display-'.$topbar_display.'"><div class="innerbar">';
  // topbar menu
  if ( has_nav_menu( 'topmenu' ) ){
     echo '<div id="topmenubox"><div id="topmenu" class="pos-default"><nav><div class="innerpadding">';
       wp_nav_menu( array( 'theme_location' => 'topmenu' ) );
     echo '<div class="clr"></div></div></nav></div></div>';
  }

  // topbar widgets
  if( function_exists('is_sidebar_active') && is_sidebar_active('topbar-widgets') ){
     echo '<div class="outermargin"><div id="topbar_widgets">';
       dynamic_sidebar('topbar-widgets');
     echo '<div class="clr"></div></div>';
  }
  echo '<div class="clr"></div></div></div>';
}

?>
