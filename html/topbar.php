<?php
/* protago
 * topbar.php
 */

// https://developer.wordpress.org/reference/functions/wp_nav_menu/


$topbar_display = get_theme_mod( 'protago_header_topbar_display', 'hide');
$topbar_width = get_theme_mod( 'protago_header_topbar_width', 'content');

if( $topbar_display != 'hide'){
  echo '<div id="topbar" class="display-'.$topbar_display.'"><div class="outermargin '.$topbar_width.'">';

  // topbar menu
  if ( has_nav_menu( 'topmenu' ) ){
     echo '<div id="topmenubox" class="class="column""><div id="topmenu" class="pos-default"><nav><div class="innerpadding">';
       wp_nav_menu( array( 'theme_location' => 'topmenu' ) );
     echo '<div class="clr"></div></div></nav></div></div>';
  }

  // topbar widgets
  if( function_exists('is_sidebar_active') && is_sidebar_active('topbar-widgets-1') ){
     echo '<div id="topbar_widgets_1" class="column">';
       dynamic_sidebar('topbar-widgets-1');
     echo '<div class="clr"></div></div>';
  }
  if( function_exists('is_sidebar_active') && is_sidebar_active('topbar-widgets-2') ){
     echo '<div id="topbar_widgets_2" class="column">';
       dynamic_sidebar('topbar-widgets-2');
     echo '<div class="clr"></div></div>';
  }


  echo '</div></div>';
}

?>
