<?php
/* protago
 * customizer_frontend_js.php
 */

// head javascript
function protago_customizer_frontend_js(){

// collect variables
$contentmaxwidth = get_theme_mod( 'protago_screen_content_maxwidth', 1600);
$tabletmaxwidth = get_theme_mod( 'protago_screen_tablet_maxwidth', 1140);
$mobilemaxwidth = get_theme_mod( 'protago_screen_mobile_maxwidth', 640);

// start output js
?>
<script>
// Multi event listener
function listenOnMultiEvents(element, eventNames, listener) {
  var events = eventNames.split(' ');
  for (var i=0, iLen=events.length; i<iLen; i++) {
    element.addEventListener(events[i], listener, false);
  }
}
function hasClass(element, cls) {
    return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
}
function addItemAtEnd( listel, dynel, newid ){
  var li = document.createElement("li");
  li.setAttribute('id', newid );
  li.appendChild(dynel);
  listel.appendChild(li);
}
function addItemAtStart( listel, dynel, newid ){
  var li = document.createElement("li");
  li.setAttribute('id', newid );
  li.appendChild(dynel);
  listel.insertBefore( li, listel.children[0]);
}
function addItemInMiddle( listel, dynel, newid ){
  var li = document.createElement("li");
  li.setAttribute('id', newid );
  li.appendChild(dynel);
	var placeindex = Math.round( countListElements( listel ) / 2 );
  listel.insertBefore( li, listel.children[placeindex]);
}
function removeItem( listel, remid ){
	var ul = document.getElementById("dynamic-list");
  var candidate = document.getElementById("candidate");
  var item = document.getElementById( remid );
  listel.removeChild(item);
}
function countListElements( listel ){
	var c = 0;
  for (var i = 0; i < listel.childNodes.length; i++) {
    if (listel.childNodes[i].nodeName == "LI") {
      c++;
    }
  }
  return c;
}


function setDynamicMenu(){
	var mobminw = <?php echo $mobilemaxwidth; ?>;
  var curwinw = document.documentElement.clientWidth;

	var bar = document.getElementById('mainbar');
  var menu = document.getElementById("mainmenu");
  var menulist = menu.getElementsByTagName("ul")[0];

  var logobox = document.getElementById('site-titlebox');
  var widgetbox = document.getElementById('mainbar_widgets');

  var menuaddid = 'item-logobox';
  var widgetaddid = 'item-widgets';

  // mainbar large / small
  if( curwinw > mobminw ){
  	bar.classList.remove('mobile');
  }else{
  	bar.classList.add('mobile');
  }

  // mainbar widget placement
  if( curwinw > mobminw ){
 		// large screen
    // move widgetbox outside menu
  	if( hasClass( bar, 'display-inright' ) || hasClass( bar, 'display-inleft' ) ){
      bar.getElementsByClassName( 'innerbar' )[0].append(widgetbox);
      if(document.getElementById(widgetaddid)){
        removeItem( menulist, widgetaddid );
      }
    }else{
    	// move widgetbox inside menu
      if( !document.getElementById(widgetaddid) ){
        addItemAtEnd( menulist, widgetbox, widgetaddid );
      }

    }
  }else{
  	// small screen
    // move widgetbox inside menu
  	if( !document.getElementById(widgetaddid) ){
      addItemAtEnd( menulist, widgetbox, widgetaddid );
    }
  }

  // mainbar logobox placement
  if( curwinw > mobminw ){
 		// large screen
    // move logobox outside menu
    if( ( hasClass( bar, 'display-center' ) || hasClass( bar, 'display-left' ) || hasClass( bar, 'display-right' )) && document.getElementById( menuaddid ) ){
      bar.getElementsByClassName( 'innerbar' )[0].prepend(logobox);
      removeItem( menulist, menuaddid );
    }
    // move logobox inside menu centered
    if( hasClass( bar, 'display-incenter' ) ){
      if( document.getElementById(menuaddid) ){
      	bar.getElementsByClassName( 'innerbar' )[0].prepend(logobox);
      	removeItem( menulist, menuaddid );
      }
      addItemInMiddle( menulist, logobox, menuaddid );
    }
    // move logobox inside menu at start
    if( hasClass( bar, 'display-inleft' ) || hasClass( bar, 'display-inright' )){
      if( document.getElementById(menuaddid) ){
      	bar.getElementsByClassName( 'innerbar' )[0].prepend(logobox);
      	removeItem( menulist, menuaddid );
      }
      addItemAtStart( menulist, logobox, menuaddid );
    }

  }else{
  	// small screen
    // move logobox outside menu
    if( document.getElementById( menuaddid ) ){
      bar.getElementsByClassName( 'innerbar' )[0].prepend(logobox);
      removeItem( menulist, menuaddid );
    }

  }

}

listenOnMultiEvents( window, 'load resize', function(){

	// onload and resize
	setDynamicMenu();

});
</script>
<?php
}
add_action( 'wp_head' , 'protago_customizer_frontend_js' );
