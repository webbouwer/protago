<?php
/* Protago
 * functions.php
 */

require get_template_directory() . '/customizer/customizer.php'; // customizer global functions
require get_template_directory() . '/customizer/customizer_identity.php'; // customizer identity functions
require get_template_directory() . '/customizer/customizer_screen.php'; // customizer screen functions
require get_template_directory() . '/customizer/customizer_style.php'; // customizer style functions
require get_template_directory() . '/customizer/customizer_header.php'; // customizer header functions
require get_template_directory() . '/customizer/customizer_content.php'; // customizer content functions
require get_template_directory() . '/customizer/customizer_footer.php'; // customizer footer functions
require get_template_directory() . '/customizer/customizer_frontend_css.php'; // customizer css frontend
require get_template_directory() . '/customizer/customizer_frontend_js.php'; // customizer javascript frontend

/********* Wordpress Hooks & filters *********/

/*
 * Register Theme Support
 */
function theme_setup_globals() {
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'big-thumb', 320, 9999 );
		add_image_size( 'normal', 960, 9999 );
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-header' );
		add_theme_support( 'custom-background' );
}
add_action( 'after_setup_theme', 'theme_setup_globals' );
/*
 * Register menu's
 */
function theme_setup_register_menus() {
	register_nav_menus(
		array(
			'topmenu' => __( 'Top menu' , 'protago' ),
			'mainmenu' => __( 'Main menu' , 'protago' ),
			'sidemenu' => __( 'Side menu' , 'protago' ),
			'footermenu' => __( 'Footer menu' , 'protago' )
			)
		);
	}
	add_action( 'init', 'theme_setup_register_menus' );

/*
 * Editor style WP THEME STANDARD
 */
 // for admin editor
function theme_editor_styles() {
	add_editor_style( 'style.css' );
	//add_editor_style( get_theme_mod('onepiece_identity_stylelayout_stylesheet', 'default.css') );
}
add_action( 'admin_init', 'theme_editor_styles' );

/* Widgets */
function theme_setup_widgets_init() {
	if (function_exists('register_sidebar')) {

		// the topbar side widgets
		register_sidebar(array(
			'name' => 'Topbar widgets 1',
			'id'   => 'topbar-widgets-1',
			'description'   => 'This is the topbar widgetized area 1.',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="innerpadding">',
			'after_widget'  => '</div><div class="clr"></div></div></div>',
			'before_title'  => '<div class="widget-titlebox"><h3>',
			'after_title'   => '</h3></div><div class="widget-contentbox">'
		));
		register_sidebar(array(
			'name' => 'Topbar widgets 2',
			'id'   => 'topbar-widgets-2',
			'description'   => 'This is the topbar widgetized area 2.',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="innerpadding">',
			'after_widget'  => '</div><div class="clr"></div></div></div>',
			'before_title'  => '<div class="widget-titlebox"><h3>',
			'after_title'   => '</h3></div><div class="widget-contentbox">'
		));


		// the mainbar side widget
		register_sidebar(array(
			'name' => 'Mainbar widgets',
			'id'   => 'mainbar-widgets',
			'description'   => 'This is the mainbar widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="innerpadding">',
			'after_widget'  => '</div><div class="clr"></div></div></div>',
			'before_title'  => '<div class="widget-titlebox"><h3>',
			'after_title'   => '</h3></div><div class="widget-contentbox">'
		));

		// the content sidebar widget
		register_sidebar(array(
			'name' => 'Content sidebar (Widgets Default)',
			'id'   => 'sidebar',
			'description'   => 'This is a standard wordpress sidebar widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="innerpadding">',
			'after_widget'  => '</div><div class="clr"></div></div></div>',
			'before_title'  => '<div class="widget-titlebox"><h3>',
			'after_title'   => '</h3></div><div class="widget-contentbox">'
		));
		// footer widgets (5 autocolumns)
		register_sidebar(array(
			'name' => 'Footer widgetbox 1',
			'id'   => 'widgets-footer-1',
			'description'   => 'Footer widgets in column 1.',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="innerpadding">',
			'after_widget'  => '</div><div class="clr"></div></div></div>',
			'before_title'  => '<div class="widget-titlebox"><h3>',
			'after_title'   => '</h3></div><div class="widget-contentbox">'
		));
		register_sidebar(array(
			'name' => 'Footer widgetbox 2',
			'id'   => 'widgets-footer-2',
			'description'   => 'Footer widgets in column 2.',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="innerpadding">',
			'after_widget'  => '</div><div class="clr"></div></div></div>',
			'before_title'  => '<div class="widget-titlebox"><h3>',
			'after_title'   => '</h3></div><div class="widget-contentbox">'
		));
		register_sidebar(array(
			'name' => 'Footer widgetbox 3',
			'id'   => 'widgets-footer-3',
			'description'   => 'Footer widgets in column 3.',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="innerpadding">',
			'after_widget'  => '</div><div class="clr"></div></div></div>',
			'before_title'  => '<div class="widget-titlebox"><h3>',
			'after_title'   => '</h3></div><div class="widget-contentbox">'
		));
		register_sidebar(array(
			'name' => 'Footer widgetbox 4',
			'id'   => 'widgets-footer-4',
			'description'   => 'Footer widgets in column 4.',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="innerpadding">',
			'after_widget'  => '</div><div class="clr"></div></div></div>',
			'before_title'  => '<div class="widget-titlebox"><h3>',
			'after_title'   => '</h3></div><div class="widget-contentbox">'
		));
		register_sidebar(array(
			'name' => 'Footer widgetbox 5',
			'id'   => 'widgets-footer-5',
			'description'   => 'Footer widgets in column 5.',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="innerpadding">',
			'after_widget'  => '</div><div class="clr"></div></div></div>',
			'before_title'  => '<div class="widget-titlebox"><h3>',
			'after_title'   => '</h3></div><div class="widget-contentbox">'
		));

		// the bottombar side widget1
		register_sidebar(array(
			'name' => 'Bottombar widgets 1',
			'id'   => 'bottombar-widgets-1',
			'description'   => 'This is the bottombar widgetized area 1.',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="innerpadding">',
			'after_widget'  => '</div><div class="clr"></div></div></div>',
			'before_title'  => '<div class="widget-titlebox"><h3>',
			'after_title'   => '</h3></div><div class="widget-contentbox">'
		));
		register_sidebar(array(
			'name' => 'Bottombar widgets 2',
			'id'   => 'bottombar-widgets-2',
			'description'   => 'This is the bottombar widgetized area 2.',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="innerpadding">',
			'after_widget'  => '</div><div class="clr"></div></div></div>',
			'before_title'  => '<div class="widget-titlebox"><h3>',
			'after_title'   => '</h3></div><div class="widget-contentbox">'
		));

		// footnotes widgets
		register_sidebar(array(
			'name' => 'Footnote widgets 1',
			'id'   => 'footnote-widgets-1',
			'description'   => 'This is the footnote widgetized area 1.',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="innerpadding">',
			'after_widget'  => '</div><div class="clr"></div></div></div>',
			'before_title'  => '<div class="widget-titlebox"><h3>',
			'after_title'   => '</h3></div><div class="widget-contentbox">'
		));
		register_sidebar(array(
			'name' => 'Footnote widgets 2',
			'id'   => 'footnote-widgets-2',
			'description'   => 'This is the footnote widgetized area 2.',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="innerpadding">',
			'after_widget'  => '</div><div class="clr"></div></div></div>',
			'before_title'  => '<div class="widget-titlebox"><h3>',
			'after_title'   => '</h3></div><div class="widget-contentbox">'
		));
 
	}
}
add_action( 'widgets_init', 'theme_setup_widgets_init' );

/********* Theme Custom Functions *********/

// https://www.isitwp.com/display-theme-information-with-get_theme_data/


function customizer_info(){
	if( is_customize_preview() ){
	  echo 'Customizer panel';
	}
}
/*
 * Active widgets
 */
function is_sidebar_active( $sidebar_id ){
    $the_sidebars = wp_get_sidebars_widgets();
    if( !isset( $the_sidebars[$sidebar_id] ) )
        return false;
    else
        return count( $the_sidebars[$sidebar_id] );
}

/*
 * Time posted
 */
function time_post_public( $t , $display = 'ago') {

	if( $display == 'ago' ){
		echo wp_time_ago( $t );
		return;
	}

}

/*
 * Time ago format
 */
function wp_time_ago( $t ) {
// https://codex.wordpress.org/Function_Reference/human_time_diff
//get_the_time( 'U' )
	printf( _x( '%s '.__('geleden', 'protago' ), '%s = human-readable time difference', 'protago' ), human_time_diff( $t, current_time( 'timestamp' ) ) );
}
