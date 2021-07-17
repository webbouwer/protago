<?php
/* protago
 * lastbar.php
 */


$bottombar_display = get_theme_mod( 'protago_footer_bottombar_display', 'hide');
$bottombar_width = get_theme_mod( 'protago_footer_bottombar_width', 'content');

$footnote_display = get_theme_mod( 'protago_footer_footnote_display', 'hide');
$footnote_width = get_theme_mod( 'protago_footer_footnote_width', 'content');
$footnote_copyright_text = get_theme_mod( 'protago_footer_footnote_copyrighttext', 'Copyright 2021');

if( $bottombar_display != 'hide'){

  echo '<div id="bottombar" class="display-'.$bottombar_display.'"><div class="outermargin '.$bottombar_width.'">';

  if( $bottombar_display == 'center' && function_exists('is_sidebar_active') && is_sidebar_active('bottombar-widgets-1') && is_sidebar_active('bottombar-widgets-2') ){

    echo '<div id="bottombar_widgets_1" class="column"><div class="widgetpadding">';
      dynamic_sidebar('bottombar-widgets-1');
    echo '<div class="clr"></div></div></div>';
    if ( has_nav_menu( 'footermenu' ) ){
      echo '<div id="footermenubox" class="column"><div id="footermenu" class="pos-default"><nav><div class="innerpadding">';
        wp_nav_menu( array( 'theme_location' => 'footermenu' ) );
       echo '<div class="clr"></div></div></nav></div></div>';
     }
  }else{
    if ( has_nav_menu( 'footermenu' ) ){
       echo '<div id="footermenubox" class="column"><div id="footermenu" class="pos-default"><nav><div class="innerpadding">';
         wp_nav_menu( array( 'theme_location' => 'footermenu' ) );
       echo '<div class="clr"></div></div></nav></div></div>';
    }
    if( function_exists('is_sidebar_active') && is_sidebar_active('bottombar-widgets-1') ){
       echo '<div id="bottombar_widgets_1" class="column"><div class="widgetpadding">';
         dynamic_sidebar('bottombar-widgets-1');
       echo '<div class="clr"></div></div></div>';
    }

  }

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

  if( $footnote_display == 'center' && function_exists('is_sidebar_active') && is_sidebar_active('footnote-widgets-1') && is_sidebar_active('footnote-widgets-2') ){

    if( function_exists('is_sidebar_active') && is_sidebar_active('footnote-widgets-1') ){
      echo '<div id="footnote_widgets_1" class="column">';
        dynamic_sidebar('footnote-widgets-1');
      echo '</div>';
    }
    if($footnote_copyright_text != ''){
      echo '<div id="footnote_copyright" class="column"><div class="innerpadding">';
      echo $footnote_copyright_text;
      echo '</div></div>';
    }

  }else{

    echo '<div id="footnote_copyright" class="column"><div class="innerpadding">';
    echo $footnote_copyright_text;
    echo '</div></div>';

    if( function_exists('is_sidebar_active') && is_sidebar_active('footnote-widgets-1') ){
       echo '<div id="footnote_widgets_1" class="column">';
         dynamic_sidebar('footnote-widgets-1');
       echo '</div>';
    }

  }

  if( function_exists('is_sidebar_active') && is_sidebar_active('footnote-widgets-2') ){
     echo '<div id="footnote_widgets_2" class="column">';
       dynamic_sidebar('footnote-widgets-2');
     echo '</div>';
  }

  echo '</div></div>';
}

?>
