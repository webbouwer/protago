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
// Functions
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
// check screensize
function screenSize(){

  var maxw = <?php echo $contentmaxwidth; ?>;
  var tabminw = <?php echo $tabletmaxwidth; ?>;
	var mobminw = <?php echo $mobilemaxwidth; ?>;
  var curwinw = document.documentElement.clientWidth;

  // mainbar large / tablet /mobile
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
// adapt elements
function dynamicElements(){

  var screensize = screenSize();

  // header mainbar
	var bar = document.getElementById('mainbar');
  var menu = document.getElementById("mainmenu");
  var menulist = menu.getElementsByTagName("ul")[0];

  var logobox = document.getElementById('site-titlebox');

  var widgetbox = '';
  if( document.getElementById('mainbar_widgets') ){
    widgetbox = document.getElementById('mainbar_widgets');
  }

  var menuaddid = 'item-logobox';
  var widgetaddid = 'item-widgets';

  // mainbar widget and logobox placement
  if( widgetbox !== '' ){
    if( screensize == 'large' ){
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
    	// mobile/tablet screen
      // move widgetbox inside menu
    	if( !document.getElementById(widgetaddid) ){
        addItemAtEnd( menulist, widgetbox, widgetaddid );
      }
    }
}

  // mainbar logobox placement
  if( screensize == 'large' ){
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
// experimental __
function triggerLoading( elementid ) {

    if( document.getElementById(elementid) ){
      var box = document.getElementById(elementid);
  		if (box.classList.contains('loading')) {
  			// show
  			box.classList.add('view-transition');
  			box.clientWidth; // force layout to ensure the now display: block and opacity: 0 values are taken into account when the CSS transition starts.
  			box.classList.remove('loading');
  		} else {
  			// hide
  			box.classList.add('view-transition');
  			box.classList.add('loading');
  		}
  	  box.addEventListener('transitionend', function() {
  		  box.classList.remove('loading-transition');
  	  }, false);
    }

}

listenOnMultiEvents( window, 'DOMContentLoaded resize', function(){
	// onload and resize
	dynamicElements();
});



</script>
<?php
}
add_action( 'wp_head' , 'protago_customizer_frontend_js' );
