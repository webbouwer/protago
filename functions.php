<?php
/* Protago
 * functions.php
 */

require get_template_directory() . '/customizer.php'; // customizer functions

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
		// the content sidebar widget
		register_sidebar(array(
			'name' => 'Content sidebar (Widgets Default)',
			'id'   => 'sidebar',
			'description'   => 'This is a standard wordpress sidebar widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<div class="widget-titlebox"><h3>',
			'after_title'   => '</h3></div><div class="widget-contentbox">'
		));
	}
}
add_action( 'widgets_init', 'minimob_setup_widgets_init' );

/********* Theme Custom Functions *********/

// https://www.isitwp.com/display-theme-information-with-get_theme_data/

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
