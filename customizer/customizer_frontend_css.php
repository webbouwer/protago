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

  /* variable () */
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

 /* variable global padding (style.css) */
 .contentmargin,
 .widget .innerpadding,
 .column .innerpadding,
 nav ul > li > a:not(#site-logo),
 #site-titlebox .innerpadding
 {
   padding:0px 15px;
 }

 /* header background-color */
 #header > .outermargin
 {
   background-color:yellow;
 }

 #header > .outermargin #topbar
 {
   background-color:#2d2d2d;
 }

 #header > .outermargin #mainbar
 {
   background-color:black;
 }


 /* mainbar background-color, height and menu content alignment (header.css)*/
 body.large #mainbar #mainmenubox #mainmenu nav .innerpadding .menu > ul > li > a:not(#site-logo),
 body.large #mainbar:not(.display-center) .innerbar > #site-titlebox > div,
 body.large #mainbar .innerbar > #mainbar_widgets > div,
 body.large #mainbar #mainmenubox #mainmenu nav .innerpadding .menu > ul > li#item-logobox > div,
 body.large #mainbar #mainmenubox #mainmenu nav .innerpadding .menu > ul > li#item-widgets > div
 {
    /* bar menu height */
     min-height:80px;
     /* align button text */
     justify-content:center;
     background-color: black;
     color:white;
 }

 body.large #mainbar #mainmenubox #mainmenu nav .innerpadding .menu > ul > li > a:not(#site-logo):hover
 {
   background-color: #2d2d2d;
   color:white;
 }

 </style>
 <?php
 }
 add_action( 'wp_head' , 'protago_customizer_frontend_css' );
