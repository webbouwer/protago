<?php


echo '<div class="outermargin">';
// topbox1
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-topbox1')){
echo '<div id="topwidgets">';
dynamic_sidebar('widgets-topbox1');
echo '<div class="clr"></div></div>';
}
echo '<div class="clr"></div></div>';





echo '<div class="outermargin">';
// topbox2 (side)
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-topbox2')){
echo '<div id="topsidebar">';
dynamic_sidebar('widgets-topbox2');
echo '<div class="clr"></div></div>';
}
// topbox3
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-topbox3')){
echo '<div id="topbox3">';
dynamic_sidebar('widgets-topbox3');
echo '<div class="clr"></div></div>';
}

// logo
echo '<div id="toplogobox" class="logobox">';
if ( get_theme_mod( 'protago_identity_logo_top' ) ){
echo '<a href="'.esc_url( home_url( '/' ) ).'" id="site-logo" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home"><img src="'.get_theme_mod( 'protago_identity_logo_top' ).'" alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'"></a>';
}else{
echo '<hgroup><h1 class="site-title"><a href="'.esc_url( home_url( '/' ) ).'" id="site-logo" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.esc_attr( get_bloginfo( 'name', 'display' ) ).'</a></h1>';
echo '<h2 class="site-description">'.get_bloginfo( 'description' ).'</h2></hgroup>';
}
echo '</div>';

// topbox4
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-topbox4')){
echo '<div id="topbox4">';
dynamic_sidebar('widgets-topbox4');
echo '<div class="clr"></div></div>';
}
// topmenu
echo '<div id="topmenu" class="defaultmenu"><nav>';
if ( has_nav_menu( 'topmenu' ) ) {
wp_nav_menu( array( 'theme_location' => 'topmenu' ) );
}else{
wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) );
}
echo '</nav></div>';

// topbox5
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-topbox5')){
echo '<div id="topmainbox">';
dynamic_sidebar('widgets-topbox5');
echo '<div class="clr"></div></div>';
}
echo '<div class="clr"></div></div>';



echo '<div class="outermargin">';
// topbox6
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-topbox6')){
echo '<div id="topafter">';
dynamic_sidebar('widgets-topbox6');
echo '<div class="clr"></div></div>';
}
echo '<div class="clr"></div></div>';
?>
