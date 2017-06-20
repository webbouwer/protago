/*
Name: Responsive js
Description: Provide adjustments on resize end
Author: Carl Müller aka Oddsized
Version: 0.0.4
Author URI: https://oddsized.com
*/
jQuery(function ($) {
	$(document).ready(function() {

		var rtime;
		var timeout = false;
		var delta = 200;
		$(window).resize(function() {
			rtime = new Date();
			if (timeout === false) {
				timeout = true;
				setTimeout(resizeend, delta);
			}
		});

		function resizeend() {
			if (new Date() - rtime < delta) {
				setTimeout(resizeend, delta);
			} else {
				timeout = false;
				protago_js_on_resize(); //alert('Done resizing');
			}
		}


		// add page bottom margin for full content view if absolute or fixed positioned footer
		function addPageBottomPadding(){
			if ( $('#footercontainer').css("position") === "absolute" || $('#footercontainer').css("position") === "fixed") {
			var footerheight = $('#footercontainer').outerHeight(true); // height including padding etc.

			var endcontentelement = '#maincontentcontainer';
			if( $('#subcontentcontainer').length > 0 ){
				endcontentelement = '#subcontentcontainer';
			}

			$(endcontentelement).css("padding-bottom", footerheight); // add bottom padding
			}else{
			$(endcontentelement).css("padding-bottom", 0);
			}
		}

		function protago_js_on_resize(){
			addPageBottomPadding();
		}

		protago_js_on_resize();

 	});
});
