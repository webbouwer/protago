<?php
/* protago
 * custom_css.php
 */

// head javascript
function custom_head_css(){

  $content_width  = get_theme_mod( 'protago_screen_content_maxwidth', '1480');
  $tablet_width   = get_theme_mod( 'protago_screen_tablet_maxwidth', '1140');
  $mobile_width   = get_theme_mod( 'protago_screen_mobile_maxwidth', '480');

?>
<style>
/* large | tablet | mobile */
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
  max-width:100%;
}
.outermargin.center
{
  width:96%;
  max-width: <?php echo $content_width; ?>px;
}

/* header mainmenu */
#mainbar #mainmenubox #mainmenu nav .innerpadding div > ul.menu > li > a
{
}

#mainbar #mainmenubox #mainmenu nav .innerpadding div > ul.menu > li > ul.sub-menu
{
  visibility: hidden;
  opacity: 0;
  position: absolute;
  transition: all 0.5s ease;
  margin-top: 1rem;
  left: 0;
  display: none;
}
#mainbar #mainmenubox #mainmenu nav .innerpadding div > ul.menu > li:hover > ul.sub-menu,
#mainbar #mainmenubox #mainmenu nav .innerpadding div > ul.menu > li > ul.sub-menu li:hover
{
  visibility: visible;
  opacity: 1;
  display: block;
}
#mainbar #mainmenubox #mainmenu nav .innerpadding div > ul.menu > li:hover > ul.sub-menu > li
{
  clear: both;
  width: 100%;
}
</style>
<?php
}
add_action( 'wp_head' , 'custom_head_css' );
