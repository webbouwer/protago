<?php
/* protago
 * mainmenu.php
 */


$mainbar_display = get_theme_mod('protago_header_mainbar_display', 'right');

echo '<div id="mainbar" class="display-'.$mainbar_display.'"><div class="innerbar">';
// mainbar logo or title
if ( get_theme_mod( 'protago_logo_image' ) ){
  echo '<div id="site-logobox"><div class="innerpadding">';
  echo '<a href="'.esc_url( home_url( '/' ) ).'" class="site-logo" ';
  echo 'title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" ';
  echo 'rel="home"><img src="'.get_theme_mod( 'protago_logo_image' ).'" ';
  echo 'alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ).' - '.get_bloginfo( 'description' ).'"></a>';
  echo '</div></div>';
}else{
  echo '<div id="site-titlebox"><div class="innerpadding"><hgroup><h1 class="site-title">';
  echo '<a href="'.esc_url( home_url( '/' ) ).'" id="site-logo" ';
  echo 'title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" ';
  echo 'rel="home">'.esc_attr( get_bloginfo( 'name', 'display' ) ).'</a>';
  echo '</h1>';
  echo '<h2 class="site-description">'.get_bloginfo( 'description' ).'</h2>';
  echo '</hgroup></div></div>';
}

// mainbar menu
echo '<div id="mainmenubox"><div id="mainmenu" class="pos-default"><nav><div class="innerpadding">';
  wp_nav_menu( array( 'theme_location' => 'mainmenu' ) );
echo '<div class="clr"></div></div></nav></div></div>';

// mainbar widgets
if( function_exists('is_sidebar_active') && is_sidebar_active('mainbar-widgets') ){
  echo '<div id="mainbar_widgets">';
    dynamic_sidebar('mainbar-widgets');
  echo '</div>';
}
echo '</div></div>';

?>
