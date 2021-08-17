<?php
/* Protago
 * functions.php
 */

require get_template_directory() . '/customizer.php'; // customizer init
require get_template_directory() . '/assets/customizer_screen.php'; // screen
require get_template_directory() . '/assets/customizer_header.php'; // screen
require get_template_directory() . '/assets/customizer_content.php'; // screen
require get_template_directory() . '/assets/customizer_footer.php'; // screen
require get_template_directory() . '/assets/custom_js.php';
require get_template_directory() . '/assets/custom_css.php';

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

 // register global customizer variables
 function wp_main_theme_global_js() {
     // add jquery
     wp_enqueue_script("jquery"); // default wp jquery
     wp_register_script( 'global_js', get_template_directory_uri().'/functions.js', 99, '1.0', false); // register the script
     /*
		 global $wp_global_data; // get global data var
 		 wp_localize_script( 'global_js', 'site_data', $wp_global_data ); // localize the global data list for the script
		 */
		 // localize the script with specific data.
     //$color_array = array( 'color1' => get_theme_mod('color1'), 'color2' => '#000099' );
     //wp_localize_script( 'custom_global_js', 'object_name', $color_array );
     // The script can be enqueued now or later.
     wp_enqueue_script( 'global_js');
 }
 add_action('wp_enqueue_scripts', 'wp_main_theme_global_js');


 // register style sheet
 function wp_main_theme_stylesheet(){
     $stylesheet = get_template_directory_uri().'/style.css';
     echo '<link rel="stylesheet" id="wp-theme-main-style"  href="'.$stylesheet.'" type="text/css" media="all" />';
 }
 add_action( 'wp_head', 'wp_main_theme_stylesheet', 9999 );

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
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		));
		register_sidebar(array(
			'name' => 'Topbar widgets 2',
			'id'   => 'topbar-widgets-2',
			'description'   => 'This is the topbar widgetized area 2.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		));


		// the mainbar side widgets
		register_sidebar(array(
			'name' => 'Mainbar widgets 1',
			'id'   => 'mainbar-widgets-1',
			'description'   => 'This is the mainbar widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		));
		register_sidebar(array(
			'name' => 'Mainbar widgets 2',
			'id'   => 'mainbar-widgets-2',
			'description'   => 'This is the mainbar widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		));

		// the content sidebar widget
		register_sidebar(array(
			'name' => 'Content sidebar (Widgets Default)',
			'id'   => 'sidebar',
			'description'   => 'This is a standard wordpress sidebar widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		));
		// footer widgets (5 autocolumns)
		register_sidebar(array(
			'name' => 'Footer widgetbox 1',
			'id'   => 'widgets-footer-1',
			'description'   => 'Footer widgets in column 1.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		));
		register_sidebar(array(
			'name' => 'Footer widgetbox 2',
			'id'   => 'widgets-footer-2',
			'description'   => 'Footer widgets in column 2.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		));
		register_sidebar(array(
			'name' => 'Footer widgetbox 3',
			'id'   => 'widgets-footer-3',
			'description'   => 'Footer widgets in column 3.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		));
		register_sidebar(array(
			'name' => 'Footer widgetbox 4',
			'id'   => 'widgets-footer-4',
			'description'   => 'Footer widgets in column 4.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		));
		register_sidebar(array(
			'name' => 'Footer widgetbox 5',
			'id'   => 'widgets-footer-5',
			'description'   => 'Footer widgets in column 5.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		));

		// the bottombar side widget1
		register_sidebar(array(
			'name' => 'Bottombar widgets 1',
			'id'   => 'bottombar-widgets-1',
			'description'   => 'This is the bottombar widgetized area 1.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		));
		register_sidebar(array(
			'name' => 'Bottombar widgets 2',
			'id'   => 'bottombar-widgets-2',
			'description'   => 'This is the bottombar widgetized area 2.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		));

		// footnotes widgets
		register_sidebar(array(
			'name' => 'Footnote widgets 1',
			'id'   => 'footnote-widgets-1',
			'description'   => 'This is the footnote widgetized area 1.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		));
		register_sidebar(array(
			'name' => 'Footnote widgets 2',
			'id'   => 'footnote-widgets-2',
			'description'   => 'This is the footnote widgetized area 2.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		));

	}
}
add_action( 'widgets_init', 'theme_setup_widgets_init' );

/********* Theme Content Exension Functions *********/

// see child theme artificium

/********* Theme Dashboard Functions *********/

// made with http://wpsettingsapi.jeroensormani.com/
add_action( 'admin_menu', 'protago_add_admin_menu' );
add_action( 'admin_init', 'protago_settings_init' );


function protago_add_admin_menu(  ) {

	add_menu_page( 'Protago', 'Protago', 'manage_options', 'protago', 'protago_options_page' );

}


function protago_settings_init(  ) {

	register_setting( 'pluginPage', 'protago_settings' );

	add_settings_section(
		'protago_pluginPage_section',
		__( 'Your section description', 'protago' ),
		'protago_settings_section_callback',
		'pluginPage'
	);

	add_settings_field(
		'protago_text_field_0',
		__( 'Settings field description', 'protago' ),
		'protago_text_field_0_render',
		'pluginPage',
		'protago_pluginPage_section'
	);

	add_settings_field(
		'protago_textarea_field_1',
		__( 'Settings field description', 'protago' ),
		'protago_textarea_field_1_render',
		'pluginPage',
		'protago_pluginPage_section'
	);

	add_settings_field(
		'protago_checkbox_field_2',
		__( 'Settings field description', 'protago' ),
		'protago_checkbox_field_2_render',
		'pluginPage',
		'protago_pluginPage_section'
	);

	add_settings_field(
		'protago_checkbox_field_3',
		__( 'Settings field description', 'protago' ),
		'protago_checkbox_field_3_render',
		'pluginPage',
		'protago_pluginPage_section'
	);

	add_settings_field(
		'protago_radio_field_4',
		__( 'Settings field description', 'protago' ),
		'protago_radio_field_4_render',
		'pluginPage',
		'protago_pluginPage_section'
	);

	add_settings_field(
		'protago_select_field_5',
		__( 'Settings field description', 'protago' ),
		'protago_select_field_5_render',
		'pluginPage',
		'protago_pluginPage_section'
	);


}


function protago_text_field_0_render(  ) {

	$options = get_option( 'protago_settings' );
	?>
	<input type='text' name='protago_settings[protago_text_field_0]' value='<?php echo $options['protago_text_field_0']; ?>'>
	<?php

}


function protago_textarea_field_1_render(  ) {

	$options = get_option( 'protago_settings' );
	?>
	<textarea cols='40' rows='5' name='protago_settings[protago_textarea_field_1]'>
		<?php echo $options['protago_textarea_field_1']; ?>
 	</textarea>
	<?php

}


function protago_checkbox_field_2_render(  ) {

	$options = get_option( 'protago_settings' );
	?>
	<input type='checkbox' name='protago_settings[protago_checkbox_field_2]' <?php checked( $options['protago_checkbox_field_2'], 1 ); ?> value='1'>
	<?php

}


function protago_checkbox_field_3_render(  ) {

	$options = get_option( 'protago_settings' );
	?>
	<input type='checkbox' name='protago_settings[protago_checkbox_field_3]' <?php checked( $options['protago_checkbox_field_3'], 1 ); ?> value='1'>
	<?php

}


function protago_radio_field_4_render(  ) {

	$options = get_option( 'protago_settings' );
	?>
	<input type='radio' name='protago_settings[protago_radio_field_4]' <?php checked( $options['protago_radio_field_4'], 1 ); ?> value='1'>
	<?php

}


function protago_select_field_5_render(  ) {

	$options = get_option( 'protago_settings' );
	?>
	<select name='protago_settings[protago_select_field_5]'>
		<option value='1' <?php selected( $options['protago_select_field_5'], 1 ); ?>>Option 1</option>
		<option value='2' <?php selected( $options['protago_select_field_5'], 2 ); ?>>Option 2</option>
	</select>

<?php

}


function protago_settings_section_callback(  ) {

	echo __( 'This section description', 'protago' );

}


function protago_options_page(  ) {

		?>
		<form action='options.php' method='post'>

			<h2>Protago</h2>

			<?php
			settings_fields( 'pluginPage' );
			do_settings_sections( 'pluginPage' );
			submit_button();
			?>

		</form>
		<?php

}




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
