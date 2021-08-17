<?
/*
 * header.php
 */
// $options = get_option( 'protago_settings' );

get_template_part('html/htmlhead');

echo '<body '; body_class(); echo '>';

wp_body_open();

echo '<div id="viewcontainer">';

get_template_part('html/header');

$content_display_width = get_theme_mod( 'protago_content_display_width', 'content');

echo '<div id="postcontent"><div class="outermargin '.$content_display_width.'">';
