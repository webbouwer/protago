<?php
/* protago
 * index.php
 * default sidebar
 */
echo '<div id="sidebar">';

// sidemenu
if ( has_nav_menu( 'sidemenu' ) ){
  echo '<div id="sidemenubox"><div id="sidemenu" class="pos-default"><nav><div class="innerpadding">';
    wp_nav_menu( array( 'theme_location' => 'sidemenu' ) );
  echo '<div class="clr"></div></div></nav></div></div>';
}
dynamic_sidebar('sidebar');

echo '<div class="clr"></div></div>';
