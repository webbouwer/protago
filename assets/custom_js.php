<?php
/* protago
 * custom_js.php
 */

// head javascript
function customizer_head_js(){

  $content_width  = get_theme_mod( 'protago_screen_content_maxwidth', 'content');
  $tablet_width   = get_theme_mod( 'protago_screen_tablet_maxwidth', 'content');
  $mobile_width   = get_theme_mod( 'protago_screen_mobile_maxwidth', 'content');
?>
<script>
</script>
<?php
}
add_action( 'wp_head' , 'customizer_head_js' );
