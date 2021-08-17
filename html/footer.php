<?php
// bottombar menu
if ( has_nav_menu( 'footermenu' ) ){
   echo '<div id="footermenubox" class="column"><div id="footermenu" class="pos-default"><nav><div class="innerpadding">';
     wp_nav_menu( array( 'theme_location' => 'footermenu' ) );
   echo '<div class="clr"></div></div></nav></div></div>';
}

// bottombar widgets
if( function_exists('is_sidebar_active') && is_sidebar_active('bottombar-widgets-1') ){
   echo '<div id="bottombar_widgets_1" class="column"><div class="widgetpadding">';
     dynamic_sidebar('bottombar-widgets-1');
   echo '<div class="clr"></div></div></div>';
}
if( function_exists('is_sidebar_active') && is_sidebar_active('bottombar-widgets-2') ){
   echo '<div id="bottombar_widgets_2" class="column"><div class="widgetpadding">';
     dynamic_sidebar('bottombar-widgets-2');
   echo '<div class="clr"></div></div></div>';
}



$footnotes_display_width = get_theme_mod( 'protago_footnotes_display_width', 'content');

if( $footnotes_display_width != 'hide' ){

echo '<div id="footnotecontent"><div class="outermargin '.$footnotes_display_width.'">';

// footnote_display
$footnote_copyright_text = get_theme_mod( 'protago_footer_footnote_copyrighttext', 'Copyright 2021');

echo '<div id="footnote_copyright" class="column"><div class="innerpadding">';
echo $footnote_copyright_text;
echo '</div></div>';

if( function_exists('is_sidebar_active') && is_sidebar_active('footnote-widgets-1') ){
  echo '<div id="footnote_widgets_1" class="column">';
    dynamic_sidebar('footnote-widgets-1');
  echo '</div>';
}
if( function_exists('is_sidebar_active') && is_sidebar_active('footnote-widgets-2') ){
  echo '<div id="footnote_widgets_2" class="column">';
    dynamic_sidebar('footnote-widgets-2');
  echo '</div>';
}

echo '</div></div>';

}
