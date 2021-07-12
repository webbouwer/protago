<?php
/* protago
 * lastbar.php
 */


$bottombar_display = get_theme_mod( 'protago_footer_bottombar_display', 'hide');
$bottombar_width = get_theme_mod( 'protago_footer_bottombar_width', 'page');

$footnote_display = get_theme_mod( 'protago_footer_footnote_display', 'hide');
$footnote_width = get_theme_mod( 'protago_footer_footnote_width', 'page');
$footnote_copyright_text = get_theme_mod( 'protago_footer_footnote_copyrighttext', 'Copyright 2021');

if( $bottombar_display != 'hide'){
  echo '<div id="bottombar" class="display-'.$bottombar_display.'"><div class="outermargin '.$bottombar_width.'">';
  // Bottombar menu
  //if ( has_nav_menu( 'footermenu' ) ){
     echo '<div id="footermenubox" class="column"><div id="footermenu" class="pos-default"><nav><div class="innerpadding">';
       wp_nav_menu( array( 'theme_location' => 'footermenu' ) );
     echo '<div class="clr"></div></div></nav></div></div>';
  //}

  // Bottombar  widgets 1
  if( function_exists('is_sidebar_active') && is_sidebar_active('bottombar-widgets-1') ){
     echo '<div id="bottombar_widgets_1" class="column"><div class="widgetpadding">';
       dynamic_sidebar('bottombar-widgets-1');
     echo '<div class="clr"></div></div></div>';
  }

  // Bottombar  widgets 2
  if( function_exists('is_sidebar_active') && is_sidebar_active('bottombar-widgets-2') ){
     echo '<div id="bottombar_widgets_2" class="column"><div class="widgetpadding">';
       dynamic_sidebar('bottombar-widgets-2');
     echo '<div class="clr"></div></div></div>';
  }

  echo '</div></div>';
}

// footnotes
if( $footnote_display != 'hide'){

  echo '<div id="footnote" class="display-'.$footnote_display.'"><div class="outermargin '.$footnote_width.'">';

  echo '<div id="footnote_copyright" class="column"><div class="innerpadding">';
  echo $footnote_copyright_text;
  echo '<div class="clr"></div></div></div>';

  // footnote widgets
  if( function_exists('is_sidebar_active') && is_sidebar_active('footnote-widgets-1') ){
     echo '<div id="footnote_widgets_1">';
       dynamic_sidebar('footnote-widgets-1');
     echo '<div class="clr"></div></div>';
  }
  if( function_exists('is_sidebar_active') && is_sidebar_active('footnote-widgets-2') ){
     echo '<div id="footnote_widgets_2">';
       dynamic_sidebar('footnote-widgets-2');
     echo '<div class="clr"></div></div>';
  }

  echo '</div></div>';
}

?>
