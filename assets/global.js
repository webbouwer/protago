/**
 * Global JQuery for  WP html
 */


 /*
Plugin Name: Menu Subs
Plugin URI:
Description: Provide submenu hover navigation
Author: Carl Müller aka Oddsized
Version: 0.1.2
Author URI: https://oddsized.com
*/
(function ($) {
	$(document).ready(function () {

    $('.sub-menu').hide();

    $( '.menu-item-has-children' ).hover(
        function(){
            $(this).children('.sub-menu').slideDown(200);
        },
        function(){
            $(this).children('.sub-menu').slideUp(200);
        }
    );
	});
})(jQuery);

