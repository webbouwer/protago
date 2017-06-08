<?php // Index (default) layout
echo '<!DOCTYPE HTML>';
echo '<html ';
language_attributes();
echo '><head>';

// keeping old html tags instead of html5 for mre backwards compat
echo '<meta http-equiv="Content-Type" content="text/html; charset='.get_bloginfo( 'charset' ).'" />';

// todo: get substract from maincontent text (as google does) / page/post/category specific meta descriptions
$site_description = get_bloginfo( 'description' );
if( get_theme_mod( 'protago_identity_featured_text', '' ) != '' ) {
$site_description = get_theme_mod( 'protago_identity_featured_text' );
}
// todo: get current page tags/keywords if available
$site_keywords = get_bloginfo( 'description' );
if( get_theme_mod( 'protago_identity_featured_keywords', '' ) != '' ) {
$site_keywords = get_theme_mod( 'protago_identity_featured_keywords' );
}

echo '<meta name="description" content="'.$site_description.'">'
	.'<meta name="keywords" content="'.$site_keywords.'">'
	.'<link rel="canonical" href="'.home_url(add_query_arg(array(),$wp->request)).'">'
	.'<link rel="pingback" href="'.get_bloginfo( 'pingback_url' ).'" />'
	.'<link rel="shortcut icon" href="images/favicon.ico" />'
	.'<link rel="stylesheet" type="text/css" href="'.get_bloginfo('stylesheet_url').'" />'
/**
 * share meta info
 * todo:  should get content featured image (header)
 * linkedin - https://www.linkedin.com/help/linkedin/answer/46687
 */
	.'<meta property="og:title" content="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'"/>'
	.'<meta property="og:image" content="'.get_theme_mod( 'onepiece_identity_featured_image' ).'"/>'
	.'<meta property="og:description" content="'.$site_description.'"/>'
	.'<meta property="og:url" content="'.esc_url( home_url( '/' ) ).'" />'
// tell devices wich screen size to use by default
	.'<meta name="viewport" content="initial-scale=1.0, width=device-width" />'
	.'<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">'
	.'<!--[if lt IE 9]><script src="'.esc_url( get_template_directory_uri() ).'/assets/html5.js"></script>'
	.'<script src="'.esc_url( get_template_directory_uri() ).'/assets/cssmediaqueries.js"></script>'
	.'<![endif]-->';

wp_head(); // http://codex.wordpress.org/Function_Reference/wp_head

if ( ! isset( $content_width ) ) $content_width = 900;

/* Global css & javascript ( to be replace with theme custom files ) */
?>
<!-- custom header elements -->
<link href="https://fonts.googleapis.com/css?family=Lato|Martel" rel="stylesheet">
<script language="javascript" type="text/javascript">
jQuery(function ($) {
	$(document).ready(function() {

		var rtime;
		var timeout = false;
		var delta = 200;
		$(window).resize(function() {
			rtime = new Date();
			if (timeout === false) {
				timeout = true;
				setTimeout(resizeend, delta);
			}
		});

		function resizeend() {
			if (new Date() - rtime < delta) {
				setTimeout(resizeend, delta);
			} else {
				timeout = false;
				protago_js_on_resize(); //alert('Done resizing');
			}
		}


		// add page bottom margin for full content view if absolute or fixed positioned footer
		function addPageBottomPadding(){
			if ( $('#footercontainer').css("position") === "absolute" || $('#footercontainer').css("position") === "fixed") {
			var footerheight = $('#footercontainer').outerHeight(true); // height including padding etc.

			var endcontentelement = '#maincontentcontainer';
			if( $('#subcontentcontainer').length > 0 ){
				endcontentelement = '#subcontentcontainer';
			}

			$(endcontentelement).css("padding-bottom", footerheight); // add bottom padding
			}else{
			$(endcontentelement).css("padding-bottom", 0);
			}
		}

		function protago_js_on_resize(){
			addPageBottomPadding();
		}

		protago_js_on_resize();

 	});
});
</script>
<?php

echo '</head><body ';
body_class();
echo '>';

echo '<div id="pagecontainer">';


echo '<div id="topcontainer">';

get_template_part('top');

echo '<div class="clr"></div></div>';



echo '<div id="headercontainer" class="site-header" role="head"><header >';

get_template_part('header');

echo '<div class="clr"></div></header></div>'; // end header








echo '<div id="maincontentcontainer"><section>';

// contentbox1
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-contentbox1')){
echo '<div class="outermargin">';
dynamic_sidebar('widgets-contentbox1');
echo '<div class="clr"></div></div>';
}


echo '<div class="outermargin">';

// sidebar1
$sidebar1class = '';
$sidebar2class = '';
$sidebar1width = 0;
$sidebar2width = 0;
$maincontentpos = 'none';
$maincontentwidth = 100;

if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && get_theme_mod('protago_settings_sidebar1_display','right') != 'none' &&
	( is_sidebar_active('sidebar') || has_nav_menu( 'sidemenu' ) || is_sidebar_active('widgets-contentbox2') || is_sidebar_active('widgets-contentbox3')) ){

echo '<div id="sidebar1"><aside>';

// default sidebar
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('sidebar') ){
echo '<div id="sidebar1top">';
dynamic_sidebar('sidebar');
echo '</div>';
}

// sidemenu
if ( has_nav_menu( 'sidemenu' ) ) {
echo '<div id="sidemenu"><nav><div class="innerpadding">';
wp_nav_menu( array( 'theme_location' => 'sidemenu' ) );
echo '<div class="clr"></div></div></nav></div>';
}
// contentbox2
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-contentbox2')){
echo '<div id="sidebar1middle">';
dynamic_sidebar('widgets-contentbox2');
echo '</div>';
}
// contentbox3
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-contentbox3')){
echo '<div id="sidebar1box3">';
dynamic_sidebar('widgets-contentbox3');
echo '</div>';
}

echo '<div class="clr"></div></aside></div>';

} // sidebar1 end


// contentbox4 (top content)
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-contentbox4')){
echo '<div id="topcontentwidget">';
dynamic_sidebar('widgets-contentbox4');
echo '</div>';
}


// sidebar2
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && get_theme_mod('protago_settings_sidebar2_display','none') != 'none' &&
	(is_sidebar_active('widgets-contentbox4') || is_sidebar_active('widgets-contentbox5') || is_sidebar_active('widgets-contentbox6') )){

echo '<div id="sidebar2"><aside>';

// contentbox5 (side)
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-contentbox5')){
echo '<div id="sidebar2top">';
dynamic_sidebar('widgets-contentbox5');
echo '</div>';
}
// contentbox6 (side)
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-contentbox6')){
echo '<div id="sidebar2middle">';
dynamic_sidebar('widgets-contentbox6');
echo '</div>';
}
// contentbox7 (side)
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-contentbox7')){
echo '<div id="sidebar2bottom">';
dynamic_sidebar('widgets-contentbox7');
echo '</div>';
}

echo '<div class="clr"></div></aside></div>';
}




// maincontent
echo '<div id="maincontent"><section>';



if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') &&
	(is_sidebar_active('widgets-contentbox7') || is_sidebar_active('widgets-contentbox8') || is_sidebar_active('widgets-contentbox9') )){

echo '<div id="beforepagecontent"><section>';

if ( has_nav_menu( 'mainmenu' ) ) {
echo '<div id="mainmenu"><nav><div class="innerpadding">';
wp_nav_menu( array( 'theme_location' => 'mainmenu' ) );
echo '<div class="clr"></div></div></nav></div>';
}


// contentbox8 (before)
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-contentbox8')){
echo '<div id="beforecontent1">';
dynamic_sidebar('widgets-contentbox8');
echo '<div class="clr"></div></div>';
}
// contentbox9 (before)
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-contentbox9')){
echo '<div id="beforecontent2">';
dynamic_sidebar('widgets-contentbox9');
echo '<div class="clr"></div></div>';
}


echo '<div class="clr"></div></section></div>';

} // end before content




echo '<div id="pagecontentbox"><section>';

get_template_part('loop');

echo '</section></div>';




if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') &&
	(is_sidebar_active('widgets-contentbox10') || is_sidebar_active('widgets-contentbox11') )){

echo '<div id="afterpagecontent"><section>';

// contentbox10 (after)
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-contentbox10')){
echo '<div id="aftercontent1">';
dynamic_sidebar('widgets-contentbox10');
echo '</div>';
}
// contentbox11 (after)
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-contentbox11')){
echo '<div id="aftercontent2">';
dynamic_sidebar('widgets-contentbox11');
echo '</div>';
}

echo '<div class="clr"></div></section></div>';

} // end after content

// contentbox12 (below)
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-contentbox12')){
echo '<div id="belowcontent">';
dynamic_sidebar('widgets-contentbox12');
echo '</div>';
}

echo '<div class="clr"></div></section></div>'; // maincontent end

echo '<div class="clr"></div></div>'; // outermargin maincontent including sidebar 1 & 2

// contentbox13 (end)
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-contentbox13')){
echo '<div class="outermargin">';
echo '<div id="endcontent">';
dynamic_sidebar('widgets-contentbox13');
echo '</div>';
echo '<div class="clr"></div></div>';
}

echo '<div class="clr"></div></section></div>'; // end maincontent area






// subcontentcontainer
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') &&
	( is_sidebar_active('widgets-subcontentbox1') || is_sidebar_active('widgets-subcontentbox2') || is_sidebar_active('widgets-subcontentbox3') ||
	is_sidebar_active('widgets-subcontentbox4') || is_sidebar_active('widgets-subcontentbox5') || is_sidebar_active('widgets-subcontentbox6') ||
	is_sidebar_active('widgets-subcontentbox7') )){

echo '<div id="subcontentcontainer"><section>';

get_template_part('subcontent');

echo '<div class="clr"></div></section></div>';
} // subcontentcontainer end





// footercontainer
echo '<div id="footercontainer"><footer>';

get_template_part('footer');

echo '<div class="clr"></div></footer></div>'; // footercontainer




echo '<div class="clr"></div></div>'; // end pagecontainer

wp_footer();

echo '</body></html>';
