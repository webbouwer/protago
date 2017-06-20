<?php /* Main functions file */

/*
locations & positioning
*/

// Include Code Assets
require get_template_directory() . '/assets/customizer.php'; // customizer functions
require get_template_directory() . '/assets/menu.php';

/* check mobile device
require get_template_directory() . '/assets/detectmobile.php'; // foundation functions
$mobile = mobile_device_detect(true,false,true,true,true,true,true,false,false);
*/

/*
 * Register global variables (options/customizer)
 */
$wp_global_data = array();
$wp_global_data['customizer'] = json_encode(get_theme_mods());


/*
 * Return of the Links Manager'
 */
add_filter( 'pre_option_link_manager_enabled', '__return_true' );



/* Register Theme Support */
function protago_setup_theme_global() {
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'big-thumb', 320, 9999 );
	add_image_size( 'medium', 480, 9999 );
	add_image_size( 'normal', 960, 9999 );
    add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
}
add_action( 'after_setup_theme', 'protago_setup_theme_global' );


//add_filter('widget_text', 'php_text', 99);


function protago_frontend_jquery() {
	wp_enqueue_script('jquery');
}
add_action( 'init', 'protago_frontend_jquery' );


/* Editor style WP THEME STANDARD */
function protago_editor_styles() {
    add_editor_style( 'style.css' );
}
add_action( 'admin_init', 'protago_editor_styles' );

/* Register menu's */
function protago_setup_register_menus() {
	register_nav_menus(
		array(
		'topmenu' => __( 'Top menu' , 'protago' ),
		'headermenu' => __( 'Header menu' , 'protago' ),
		'sidemenu' => __( 'Side menu' , 'protago' ),
		'mainmenu' => __( 'Main menu' , 'protago' ),
		'bottommenu' => __( 'Bottom menu' , 'protago' )
		)
	);
}
add_action( 'init', 'protago_setup_register_menus' );

/* Register widgets */


function protago_setup_widgets_init() {
	if (function_exists('register_sidebar')) {


		// topboxes
		register_sidebar(array(
			'name' => 'Top Widget box 1',
			'id'   => 'widgets-topbox1',
			'description'   => 'Top widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Top Widget box 2',
			'id'   => 'widgets-topbox2',
			'description'   => 'Top widgetized (sidebox) area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Top Widget box 3',
			'id'   => 'widgets-topbox3',
			'description'   => 'Top widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Top Widget box 4',
			'id'   => 'widgets-topbox4',
			'description'   => 'Top widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Top Widget box 5',
			'id'   => 'widgets-topbox5',
			'description'   => 'Top widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Top Widget box 6',
			'id'   => 'widgets-topbox6',
			'description'   => 'Top widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		// headerboxes
		register_sidebar(array(
			'name' => 'Header Widget box 1',
			'id'   => 'widgets-headerbox1',
			'description'   => 'Header widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Header Widget box 2',
			'id'   => 'widgets-headerbox2',
			'description'   => 'Header (sidebar) widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Header Widget box 3',
			'id'   => 'widgets-headerbox3',
			'description'   => 'Header widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Header Widget box 4',
			'id'   => 'widgets-headerbox4',
			'description'   => 'Header widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		// the default wordpress widget
		register_sidebar(array(
			'name' => 'Header Widgets Default',
			'id'   => 'widgets-header',
			'description'   => 'This is a standard wordpress widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Header Widget box 5',
			'id'   => 'widgets-headerbox5',
			'description'   => 'Header widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));



		// contentboxes
		register_sidebar(array(
			'name' => 'Widget box 0 Content Full Width',
			'id'   => 'widgets-contentbox1',
			'description'   => 'Content top widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));


		// the default wordpress sidebar
		register_sidebar(array(
			'name' => 'Widget box 1 Sidebar 1',
			'id'   => 'sidebar',
			'description'   => 'This is the standard wordpress widgetized sidebar area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Widget box 2 Sidebar 1',
			'id'   => 'widgets-contentbox2',
			'description'   => 'Content (sidebar1) widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Widget box 3 Sidebar 1',
			'id'   => 'widgets-contentbox3',
			'description'   => 'Content (sidebar1) widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Widget box 4 Content Top',
			'id'   => 'widgets-contentbox4',
			'description'   => 'Content widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Widget box 5 Sidebar 2',
			'id'   => 'widgets-contentbox5',
			'description'   => 'Content (sidebar2) widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Widget box 6 Sidebar 2',
			'id'   => 'widgets-contentbox6',
			'description'   => 'Content (sidebar2) widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Widget box 7 Sidebar 2',
			'id'   => 'widgets-contentbox7',
			'description'   => 'Content (sidebar2) widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Widget box 8 Before Content',
			'id'   => 'widgets-contentbox8',
			'description'   => 'Content (before content) widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Widget box 9 Before Content',
			'id'   => 'widgets-contentbox9',
			'description'   => 'Content (before content) widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Widget box 10 After Content',
			'id'   => 'widgets-contentbox10',
			'description'   => 'Content (after content) widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));
		register_sidebar(array(
			'name' => 'Widget box 11 After Content',
			'id'   => 'widgets-contentbox11',
			'description'   => 'Content (after content) widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Widget box 12 Below Content',
			'id'   => 'widgets-contentbox12',
			'description'   => 'Content (below content) widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Widget box 13 End Content',
			'id'   => 'widgets-contentbox13',
			'description'   => 'Content (end content) widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Subcontent Widget box 1',
			'id'   => 'widgets-subcontentbox1',
			'description'   => 'Subcontent (end content) widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Subcontent Widget box 2',
			'id'   => 'widgets-subcontentbox2',
			'description'   => 'Content (sidebar) widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Subcontent Widget box 3',
			'id'   => 'widgets-subcontentbox3',
			'description'   => 'Subcontent (top mainsub) widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));
		register_sidebar(array(
			'name' => 'Subcontent Widget box 4',
			'id'   => 'widgets-subcontentbox4',
			'description'   => 'Subcontent (side mainsub) widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Subcontent Widget box 5',
			'id'   => 'widgets-subcontentbox5',
			'description'   => 'Subcontent (mainsub) widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Subcontent Widget box 6',
			'id'   => 'widgets-subcontentbox6',
			'description'   => 'Subcontent (below mainsub) widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Subcontent Widget box 7',
			'id'   => 'widgets-subcontentbox7',
			'description'   => 'Subcontent (end sub) widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		// Footer boxes
		register_sidebar(array(
			'name' => 'Footer Widget box 1',
			'id'   => 'widgets-footerbox1',
			'description'   => 'Footer widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Footer Widget box 2',
			'id'   => 'widgets-footerbox2',
			'description'   => 'Footer (sidebar) widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));


		register_sidebar(array(
			'name' => 'Footer Widget box 3',
			'id'   => 'widgets-footerbox3',
			'description'   => 'Footer widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Footer Widget box 4',
			'id'   => 'widgets-footerbox4',
			'description'   => 'Footer widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));
		register_sidebar(array(
			'name' => 'Footer Widget box 5',
			'id'   => 'widgets-footerbox5',
			'description'   => 'Footer widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Footer Widget box 6',
			'id'   => 'widgets-footerbox6',
			'description'   => 'Footer widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

		register_sidebar(array(
			'name' => 'Footer Widget box 7',
			'id'   => 'widgets-footerbox7',
			'description'   => 'Footer widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clr"></div></div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3><div class="innerpadding">'
		));

	}
}
add_action( 'widgets_init', 'protago_setup_widgets_init' );


/* Customize Adminbar */
function control_display_adminbar() {
	if (!current_user_can('administrator')){ // only for admins
		show_admin_bar(false);
	}
}
add_action( 'after_setup_theme', 'control_display_adminbar' );

/* Check active widgets */
function is_sidebar_active( $sidebar_id ){
    $the_sidebars = wp_get_sidebars_widgets();
    if( !isset( $the_sidebars[$sidebar_id] ) )
        return false;
    else
        return count( $the_sidebars[$sidebar_id] );
}


/* Customize html body tag class */
function protago_body_class( $classes ) {
	$classes[] = get_theme_mod('protago_settings_mainframe_type');
	return $classes;
}
add_filter( 'body_class', 'protago_body_class' );

function protago_wp_time_ago( $t ) {
	// https://codex.wordpress.org/Function_Reference/human_time_diff
	//get_the_time( 'U' )
	printf( _x( '%s '.__('geleden','protago'), '%s = human-readable time difference', 'onepiece' ), human_time_diff( $t, current_time( 'timestamp' ) ) );
}

/* set date display */
function protago_display_date(){

	if( get_theme_mod('protago_settings_data_dateformat', 'default') == 'default' ){
		echo '<span class="post-date date-time">'.get_the_date().'</span> ';
	}else{
		echo '<span class="post-date time-ago">';
		protago_wp_time_ago(get_the_time( 'U' ));
		echo '</span>';
	}

}
function protago_display_author(){

	echo ' <span class="post-author">'.get_the_author().'</span> ';

}


/* Check Frontpages */
/*
// frontpage check
if ( is_front_page() && is_home() ) { // Default homepage
} elseif ( is_front_page() ) { // static homepage (page.php)
} elseif ( is_home() ) { // blog page
} else { //everything else
}
*/

/* Search highlighting */
/*
function search_title_highlight() {
    $title = get_the_title();
    $keys = implode('|', explode(' ', get_search_query()));
    $title = preg_replace('/(' . $keys .')/iu', '<strong class="search-highlight">\0</strong>', $title);
    echo $title;
}
function search_excerpt_highlight($excerpt_length = 80) {
$excerpt = get_the_excerpt();
$keys = implode('|', explode(' ', get_search_query()));
$excerpt = preg_replace('/(' . $keys .')/iu', '<strong class="search-highlight">\0</strong>', $excerpt);
echo $excerpt;
}
*/


/* This code enables Shortcodes in WordPress Text Widget */
/*
function php_text($text) {
 if (strpos($text, '<' . '?') !== false) {
 ob_start();
 eval('?' . '>' . $text);
 $text = ob_get_contents();
 ob_end_clean();
 }
 return $text;
}
add_filter('widget_text', 'do_shortcode');
*/

/***********************
* Remove unneeded code *
***********************/
/* Remove Emoji junk by Christine Cooper
 * Found on http://wordpress.stackexchange.com/questions/185577/disable-emojicons-introduced-with-wp-4-2
 */
function disable_wp_emojicons() {
  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' ); // filter to remove TinyMCE emojis
}
add_action( 'init', 'disable_wp_emojicons' );
function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}
/*
 * control (remove) gravatar
 */
function bp_remove_gravatar ($image, $params, $item_id, $avatar_dir, $css_id, $html_width, $html_height, $avatar_folder_url, $avatar_folder_dir) {
	$default = get_stylesheet_directory_uri() .'/images/avatar.png';
	if( $image && strpos( $image, "gravatar.com" ) ){
		return '<img src="' . $default . '" alt="avatar" class="avatar" ' . $html_width . $html_height . ' />';
	} else {
		return $image;
	}
}
add_filter('bp_core_fetch_avatar', 'bp_remove_gravatar', 1, 9 );
function remove_gravatar ($avatar, $id_or_email, $size, $default, $alt) {
	$default = get_stylesheet_directory_uri() .'/images/avatar.png';
	return "<img alt='{$alt}' src='{$default}' class='avatar avatar-{$size} photo avatar-default' height='{$size}' width='{$size}' />";
}
add_filter('get_avatar', 'remove_gravatar', 1, 5);
function bp_remove_signup_gravatar ($image) {
	$default = get_stylesheet_directory_uri() .'/images/avatar.png';
	if( $image && strpos( $image, "gravatar.com" ) ){
		return '<img src="' . $default . '" alt="avatar" class="avatar" width="60" height="60" />';
	} else {
		return $image;
	}
}
add_filter('bp_get_signup_avatar', 'bp_remove_signup_gravatar', 1, 1 );


?>
