<?php
/* protago
 * custom_js.php
 */

// head javascript
function customizer_head_js(){
  $content_width  = get_theme_mod( 'protago_screen_content_maxwidth', 1600);
  $tablet_width   = get_theme_mod( 'protago_screen_tabvar_maxwidth', 1140);
  $mobile_width   = get_theme_mod( 'protago_screen_mobile_maxwidth', 640);
?>
<script>
// check screensize large / tablet / mobile
function screenSize(){
  var maxw = <?php echo $content_width; ?>;
  var tabminw = <?php echo $tablet_width; ?>;
	var mobminw = <?php echo $mobile_width; ?>;
  var curwinw = document.documentElement.clientWidth;
  var screensize = 'large';
  if( curwinw <= mobminw ){
    screensize = 'mobile';
  }else if( curwinw <= tabminw ){
    screensize = 'tablet';
  }
  document.body.classList.remove('mobile');
  document.body.classList.remove('tablet');
  document.body.classList.remove('large');
  document.body.classList.add(screensize);
  return screensize;
}

</script>
<?php
}
add_action( 'wp_head' , 'customizer_head_js' );

/*
function custom_js_enqueue() {
  $content_width  = get_theme_mod( 'protago_screen_content_maxwidth', 1600);
  $tablet_width   = get_theme_mod( 'protago_screen_tabvar_maxwidth', 1140);
  $mobile_width   = get_theme_mod( 'protago_screen_mobile_maxwidth', 640);
   wp_add_inline_script( 'custom_js', '
   function screenSize(){
     var maxw = '.$content_width.';
     var tabminw = '.$tablet_width.';
   	var mobminw = '.$mobile_width.';
     var curwinw = document.documentElement.clientWidth;
     var screensize = 'large';
     if( curwinw <= mobminw ){
       screensize = 'mobile';
     }else if( curwinw <= tabminw ){
       screensize = 'tablet';
     }
     document.body.classList.remove('mobile');
     document.body.classList.remove('tablet');
     document.body.classList.remove('large');
     document.body.classList.add(screensize);
     return screensize;
   }
   ' );
}
add_action( 'wp_enqueue_scripts', 'custom_js_enqueue' );
*/
