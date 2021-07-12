<?php
/* protago
 * htmlhead.php
 */
echo '<!DOCTYPE HTML>';
echo '<html '; language_attributes(); echo '><head>';
echo '<meta http-equiv="Content-Type" content="text/html; charset='.get_bloginfo( 'charset' ).'" />';
echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
echo '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">';
if ( ! isset( $content_width ) ) $content_width = 360;
echo '<link rel="stylesheet" type="text/css" href="'.esc_url( get_template_directory_uri() ).'/style.css" />';
wp_head();
echo '</head>';
?>
