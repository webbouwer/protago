<?php

if ( has_nav_menu( 'sidemenu' ) ) {
echo '<div class="sidemenubar">';
wp_nav_menu( array( 'theme_location' => 'sidemenu' ) );
echo '<div class="clr"></div></div>';
}


if( function_exists('is_sidebar_active') && is_sidebar_active('sidebar') ){
dynamic_sidebar('sidebar');
}


if( get_theme_mod( 'fndtn_identity_contact_text' ) ){
echo '<div class="contactbox">'.get_theme_mod( 'fndtn_identity_contact_text' ).'</div>';
}



?>
