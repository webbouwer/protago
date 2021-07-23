<?php
/* protago
 * custom_css.php
 */

// head javascript
function custom_head_css(){

  $content_width  = get_theme_mod( 'protago_screen_content_maxwidth', 'content');
  $tablet_width   = get_theme_mod( 'protago_screen_tablet_maxwidth', 'content');
  $mobile_width   = get_theme_mod( 'protago_screen_mobile_maxwidth', 'content');

?>
<style>

.outermargin
{
  position:relative;
  margin:0px auto;
  width:98%;
  max-width: <?php echo $content_width; ?>px;
}
.outermargin.content
{
  width:96%;
  max-width: <?php echo $content_width; ?>px;
}
.outermargin.full
{
  width:100%;
}
.outermargin.center
{
  width:auto;
  min-width: <?php echo $mobile_width; ?>px;
}
</style>
<?php
}
add_action( 'wp_head' , 'custom_head_css' );
