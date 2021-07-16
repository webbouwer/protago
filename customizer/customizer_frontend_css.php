<?php
/* protago
 * customizer_frontend_css.php
 */

 // head css
 function protago_customizer_frontend_css(){

 // collect variables
 $contentmaxwidth = get_theme_mod( 'protago_screen_content_maxwidth', 1600);
 $tabletmaxwidth = get_theme_mod( 'protago_screen_tablet_maxwidth', 1140);
 $mobilemaxwidth = get_theme_mod( 'protago_screen_mobile_maxwidth', 640);

 // start output css
 ?>
 <style>
 .outermargin.content
 {
   max-width: <?php echo  $contentmaxwidth; ?>px;
   width:100%;
   margin:0px auto;
 }

 .outermargin.center
 {
   display:block !important;
   max-width: <?php echo  $contentmaxwidth; ?>px;
   width:100%;
   margin:0px auto;
   text-align:center;
 }


 .outermargin.full
 {
   width:100%;
   margin:0px auto;
 }
 </style>
 <?php
 }
 add_action( 'wp_head' , 'protago_customizer_frontend_css' );
