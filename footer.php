<?php


// Footerbox1
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-footerbox1')){
echo '<div class="outermargin">';
echo '<div id="footertop">';
dynamic_sidebar('widgets-footerbox1');
echo '<div class="clr"></div></div>';
echo '</div>';
}

echo '<div class="outermargin">';
// Footerbox2 (side)
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-footerbox2')){
echo '<div id="footerside1">';
dynamic_sidebar('widgets-footerbox2');
echo '<div class="clr"></div></div>';
}

// Footerbox3 (side)
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-footerbox3')){
echo '<div id="footerside2">';
dynamic_sidebar('widgets-footerbox3');
echo '<div class="clr"></div></div>';
}


// bottommenu
if ( has_nav_menu( 'bottommenu' ) ) {
echo '<div id="bottommenu"><nav><div class="innerpadding">';
wp_nav_menu( array( 'theme_location' => 'bottommenu' ) );
echo '<div class="clr"></div></div></nav></div>';
}

// logo bottom
echo '<div id="bottomlogobox" class="logobox">';
if ( get_theme_mod( 'protago_identity_logo_bottom' ) ){
echo '<a href="'.esc_url( home_url( '/' ) ).'" id="site-logo" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home"><img src="'.get_theme_mod( 'protago_identity_logo_bottom' ).'" alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'"></a>';
}else{
echo '<hgroup><h4 class="site-title"><a href="'.esc_url( home_url( '/' ) ).'" id="site-logo" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.esc_attr( get_bloginfo( 'name', 'display' ) ).'</a></h4>';
echo '<h5 class="site-description">'.get_bloginfo( 'description' ).'</h5></hgroup>';
}
echo '</div>';
// Footerbox4
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-footerbox4')){
echo '<div id="footermain">';
dynamic_sidebar('widgets-footerbox4');
echo '<div class="clr"></div></div>';
}

// Footerbox5 (below)
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-footerbox5')){
echo '<div id="footerbelow">';
dynamic_sidebar('widgets-footerbox5');
echo '<div class="clr"></div></div>';
}
echo '<div class="clr"></div></div>';

if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') &&
	( is_sidebar_active('widgets-footerbox6') || is_sidebar_active('widgets-footerbox7') ) ){
echo '<div class="outermargin">';
// Footerbox6 (end)
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-footerbox6')){
echo '<div id="footerend">';
dynamic_sidebar('widgets-footerbox6');
echo '<div class="clr"></div></div>';
}
// Footerbox7 (page end)
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-footerbox7')){
echo '<div id="page-end">';
dynamic_sidebar('widgets-footerbox7');
echo '<div class="clr"></div></div>';
}
echo '<div class="clr"></div></div>';
}

?>
