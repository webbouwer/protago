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

 /* topbar */
 #header > .outermargin #topbar
 {
   background-color:#2d2d2d;
   color:ededed;
 }


/* bottombar (footer.css)*/
body.large #topbar #topmenubox #topmenu  nav .innerpadding .menu > ul > li > a,
body.large #topbar #topbar_widgets_1 > div,
body.large #topbar #topbar_widgets_2 > div
{
   /* bar menu height */
    min-height:30px;
    /* align button text */
    align-items: center; /* baseline, flex-end */
    justify-content:flex-start; /* space-around,center */
    background-color: #2d2d2d;
}

 body.large #topbar #topmenubox #topmenu  nav .innerpadding .menu > ul > li > a:hover
 {
   background-color: black;
   color:white;
 }

 /* mainbar background-color, height and menu content alignment (header.css)*/
  #header > .outermargin #mainbar
  {
    background-color:black;
  }


 body.large #mainbar #mainmenubox #mainmenu nav .innerpadding .menu > ul > li > a:not(#site-logo),
 body.large #mainbar:not(.display-center) .innerbar > #site-titlebox > div,
 body.large #mainbar .innerbar > #mainbar_widgets > div,
 body.large #mainbar #mainmenubox #mainmenu nav .innerpadding .menu > ul > li#item-logobox > div,
 body.large #mainbar #mainmenubox #mainmenu nav .innerpadding .menu > ul > li#item-widgets > div
 {
    /* bar menu height */
     min-height:120px;
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


 /* widgetbar */
 #footer_widgets
 {
   background-color:black;
   color:white;
 }
/* widgetbar (footer.css)*/
body.large #footer_widgets .outermargin .widgetcolumn > div
{
   /* bar menu height */
    min-height:90px;
    /* align button text */
    align-items: baseline;  /* center, flex-end */
    justify-content: flex-start; /* center */
    background-color: black;
}


/* bottombar */
#bottombar
{
  background-color:black;
  color:white;
}
/* bottombar (footer.css)*/
body.large #bottombar #footermenubox #footermenu  nav .innerpadding .menu > ul > li > a,
body.large #bottombar #bottombar_widgets_1 > div,
body.large #bottombar #bottombar_widgets_2 > div
{
   /* bar menu height */
    min-height:90px;
    /* align button text */
    align-items: center; /* baseline, flex-end */
    justify-content: flex-start; /* space-around, center */
    background-color: black;
}
body.large #bottombar #footermenubox #footermenu  nav .innerpadding .menu > ul > li > a:hover
{
  background-color: #2d2d2d;
  color:white;
}

/* footnote bar */
#footnote
{
  background-color:#2d2d2d;
  color:white;
}

 </style>
 <?php
 }
 add_action( 'wp_head' , 'protago_customizer_frontend_css' );
