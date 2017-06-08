<?php
echo '<div class="outermargin">';
// headerbox1
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-headerbox1')){
echo '<div id="headertopbox">';
dynamic_sidebar('widgets-headerbox1');
echo '<div class="clr"></div></div>';
}
echo '<div class="clr"></div></div>';

echo '<div class="outermargin">';
// headerbox2 (side)
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-headerbox2')){
echo '<div id="headersidebar">';
dynamic_sidebar('widgets-headerbox2');
echo '<div class="clr"></div></div>';
}
// headerbox3
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-headerbox3')){
echo '<div id="headerbox3">';
dynamic_sidebar('widgets-headerbox3');
echo '<div class="clr"></div></div>';
}


// headermenu
if ( has_nav_menu( 'headermenu' ) ) {
echo '<div id="headermenu"><nav><div class="innerpadding">';
wp_nav_menu( array( 'theme_location' => 'headermenu' ) );
echo '<div class="clr"></div></div></nav></div>';
}
/*
todo: header screen width to switch outermargin parent
*/

// header
$header_image = get_header_image();
if( ! empty( $header_image ) ){
echo '<div id="headerimagecontainer">';
echo '<img src="'.esc_url( $header_image ).'" class="header-image" alt="'.bloginfo( 'description' ).'" />';
echo '</div>';
}
// headerbox4
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-headerbox4')){
echo '<div id="headerbox4">';
dynamic_sidebar('widgets-headerbox4');
echo '<div class="clr"></div></div>';
}
// widgets-header default
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-header')){
dynamic_sidebar('widgets-header');
}
echo '<div class="clr"></div></div>';

echo '<div class="outermargin">';
// headerbox5
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-headerbox5')){
echo '<div id="headerbox5">';
dynamic_sidebar('widgets-headerbox5');
echo '<div class="clr"></div></div>';
}
echo '<div class="clr"></div></div>';
?>
