// function lib
// Multi event listener

/*
jQuery(function($){

  function setHeaderElements(){

    var menu = $("#mainmenu").find("ul").first();

    if ( $('#mainbar').hasClass('display-incenter') ){

      var w1 = $('#mainbar_widgets_1').clone();
      var w2 = $('#mainbar_widgets_2').clone();
      $('#mainbar_widgets_1').remove();
      $('#mainbar_widgets_2').remove();

      menu.append( w1 );
      menu.append( w2 );
      var i = Math.round( menu.find("li").length / 2);
      var logobox = $('#logobox').clone();
      $('#logobox').remove();
      menu.find("li").eq(i).after( logobox );

    }

  }

  $(document).ready(function() {
    setHeaderElements();
    console.log('set!');
  });

});
*/

function ProtagoListenOnMultiEvents(element, eventNames, listener) {
  var events = eventNames.split(' ');
  for (var i = 0, iLen = events.length; i < iLen; i++) {
    element.addEventListener(events[i], listener, false);
  }
}

function hasProClass(element, cls) {
  return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
}

function addProItemAtEnd(listel, dynel, newid) {
  var li = document.createElement("li");
  li.setAttribute('id', newid);
  li.appendChild(dynel);
  listel.appendChild(li);
}

function addProItemAtStart(listel, dynel, newid) {
  var li = document.createElement("li");
  li.setAttribute('id', newid);
  li.appendChild(dynel);
  listel.insertBefore(li, listel.children[0]);
}

function addProItemInMiddle(listel, dynel, newid) {
  var li = document.createElement("li");
  li.setAttribute('id', newid);
  li.appendChild(dynel);
  var placeindex = Math.round(countProListElements(listel) / 2);
  listel.insertBefore(li, listel.children[placeindex]);
}

function removeProItem(listel, remid) {
  var ul = document.getElementById("dynamic-list");
  var candidate = document.getElementById("candidate");
  var item = document.getElementById(remid);
  listel.removeChild(item);
}

function countProListElements(listel) {
  var c = 0;
  for (var i = 0; i < listel.childNodes.length; i++) {
    if (listel.childNodes[i].nodeName == "LI") {
      c++;
    }
  }
  return c;
}

function ProtagoHeaderElements(){

  var scrsz = screenSize();

  var probar = document.getElementById('mainbar');
  var promenu = document.getElementById("mainmenu");
  var promenulist = promenu.getElementsByTagName("ul")[0];

  var prologobox = document.getElementById('logobox');
  var prowidgetbox1 = document.getElementById('mainbar_widgets_1');
  var prowidgetbox2 = document.getElementById('mainbar_widgets_2');

  var promenuaddid = 'item-logobox';
  var prowidgetaddid1 = 'item-widgets1';
  var prowidgetaddid2 = 'item-widgets2';

  if( scrsz = 'large' ){

    // large screen
		if (hasProClass(probar, 'display-inright') || hasProClass(probar, 'display-inleft')) {
      probar.getElementsByClassName('outermargin')[0].appendChild(prowidgetbox1);
      if (document.getElementById(prowidgetaddid1)) {
        removeProItem(promenulist, prowidgetaddid1);
      }
      probar.getElementsByClassName('outermargin')[0].appendChild(prowidgetbox2);
      if (document.getElementById(prowidgetaddid2)) {
        removeProItem(promenulist, prowidgetaddid2);
      }
    } else {
      // move widgetbox inside menu
      if (!document.getElementById(prowidgetaddid1)) {
        addProItemAtEnd(promenulist, prowidgetbox1, prowidgetaddid1);
      }
      if (!document.getElementById(prowidgetaddid2)) {
        addProItemAtEnd(promenulist, prowidgetbox2, prowidgetaddid2);
      }
    }

    // move logobox outside menu
    if ((hasProClass(probar, 'display-center') || hasProClass(probar, 'display-left') || hasProClass(probar, 'display-right')) && document.getElementById(promenuaddid)) {
      probar.getElementsByClassName('outermargin')[0].prependChild(prologobox);
      removeProItem(promenulist, promenuaddid);
    }
    // move logobox inside menu centered
    if (hasProClass(probar, 'display-incenter')) {
      if (document.getElementById(promenuaddid)) {
        probar.getElementsByClassName('outermargin')[0].prependChild(prologobox);
        removeProItem(promenulist, promenuaddid);
      }
      addProItemInMiddle(promenulist, prologobox, promenuaddid);
    }
    // move logobox inside menu at start
    if (hasProClass(probar, 'display-inleft') || hasProClass(probar, 'display-inright')) {
      if (document.getElementById(promenuaddid)) {
        probar.getElementsByClassName('outermargin')[0].prependChild(prologobox);
        removeProItem(promenulist, promenuaddid);
      }
      addProItemAtStart(promenulist, prologobox, promenuaddid);
    }

  }
  console.log(scrsz);

}
ProtagoListenOnMultiEvents( window, 'DOMContentLoaded resize', function(){ // DOMContentLoaded
	// onload and resize menu configuration
  ProtagoHeaderElements();
});
