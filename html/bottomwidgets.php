<?php
/* protago
 * bottom.php
 */

$widgetbar_display = get_theme_mod( 'protago_footer_widgetbar_display', 'hide');
$widgetbar_width = get_theme_mod( 'protago_footer_widgetbar_width', 'content');

if($widgetbar_display != 'hide'){
  
$footercolumncount = 0;
if( function_exists('is_sidebar_active') ){
  if( is_sidebar_active('widgets-footer-1') ){
    $footercolumncount++;
  }
  if( is_sidebar_active('widgets-footer-2') ){
    $footercolumncount++;
  }
  if( is_sidebar_active('widgets-footer-3') ){
    $footercolumncount++;
  }
  if( is_sidebar_active('widgets-footer-4') ){
    $footercolumncount++;
  }
  if( is_sidebar_active('widgets-footer-5') ){
    $footercolumncount++;
  }
}

if( $footercolumncount > 0 ){

  echo '<div id="footer_widgets" class="columnset_'.$footercolumncount.' display-'.$widgetbar_display.'"><div class="outermargin '.$widgetbar_width.'">';

  if( function_exists('is_sidebar_active') && is_sidebar_active('widgets-footer-1') ){
    echo '<div class="widgetcolumn"><div id="widgets-footer-1">';
    dynamic_sidebar('widgets-footer-1');
    echo '</div></div>';
  }
  if( function_exists('is_sidebar_active') && is_sidebar_active('widgets-footer-2') ){
    echo '<div class="widgetcolumn"><div id="widgets-footer-2">';
    dynamic_sidebar('widgets-footer-2');
    echo '</div></div>';
  }
  if( function_exists('is_sidebar_active') && is_sidebar_active('widgets-footer-3') ){
    echo '<div class="widgetcolumn"><div id="widgets-footer-3">';
    dynamic_sidebar('widgets-footer-3');
    echo '</div></div>';
  }
  if( function_exists('is_sidebar_active') && is_sidebar_active('widgets-footer-4') ){
    echo '<div class="widgetcolumn"><div id="widgets-footer-4">';
    dynamic_sidebar('widgets-footer-4');
    echo '</div></div>';
  }
  if( function_exists('is_sidebar_active') && is_sidebar_active('widgets-footer-5') ){
    echo '<div class="widgetcolumn"><div id="widgets-footer-5">';
    dynamic_sidebar('widgets-footer-5');
    echo '</div></div>';
  }
  echo '<div class="clr"></div></div></div>';

}

}
