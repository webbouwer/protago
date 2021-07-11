<?php
/* protago
 * lastbar.php
 */


$bottombar_display = get_theme_mod( 'protago_footer_bottombar_display', 'hide');

if( $bottombar_display != 'hide'){
  echo '<div id="bottombar" class="display-'.$bottombar_display.'"><div class="outermargin">';
  // Bottombar menu
  //if ( has_nav_menu( 'footermenu' ) ){
     echo '<div id="footermenubox"><div id="footermenu" class="pos-default"><nav><div class="innerpadding">';
       wp_nav_menu( array( 'theme_location' => 'footermenu' ) );
     echo '<div class="clr"></div></div></nav></div></div>';
  //}

  // Bottombar  widgets
  if( function_exists('is_sidebar_active') && is_sidebar_active('bottombar-widgets') ){
     echo '<div id="bottombar_widgets"><div class="widgetpadding">';
       dynamic_sidebar('bottombar-widgets');
     echo '<div class="clr"></div></div></div>';
  }
  echo '<div class="clr"></div></div></div>';
}

?>
