<?php

echo '<div id="subcontentcontainer"><section>';

// subcontentbox1
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-subcontentbox1')){
echo '<div class="outermargin"><div id="subcontenttop">';
dynamic_sidebar('widgets-subcontentbox1');
echo '<div class="clr"></div></div></div>';
}

echo '<div class="outermargin"><article>';
// subcontentbox2 (side)
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-subcontentbox2')){
echo '<div id="subsidebar1"><aside>';
dynamic_sidebar('widgets-subcontentbox2');
echo '<div class="clr"></div></aside></div>'; // end subsidebar
}

echo '<div id="subcontentbar">';

// subcontentbox3 (top)
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-subcontentbox3')){
echo '<div id="subcontentbefore">';
dynamic_sidebar('widgets-subcontentbox3');
echo '<div class="clr"></div></div>';
}


// subcontentbox4 (side)
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-subcontentbox4')){
echo '<div id="subsidebar2"><aside>';
dynamic_sidebar('widgets-subcontentbox4');
echo '<div class="clr"></div></div>';
}
// subcontentbox5 (submain)
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-subcontentbox5')){
echo '<div id="subcontentmain">';
dynamic_sidebar('widgets-subcontentbox5');
echo '<div class="clr"></div></div>';
}

// subcontentbox6 (below)
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-subcontentbox6')){
echo '<div id="subcontentbelow">';
dynamic_sidebar('widgets-subcontentbox6');
echo '<div class="clr"></div></div>';
}
echo '<div class="clr"></div></div>'; // end subcontentbar

echo '<div class="clr"></div></article></div>';

// subcontentbox7 (end)
if( function_exists('dynamic_sidebar') && function_exists('is_sidebar_active') && is_sidebar_active('widgets-subcontentbox7')){
echo '<div class="outermargin"><div id="subcontentend">';
dynamic_sidebar('widgets-subcontentbox7');
echo '<div class="clr"></div></div></div>';
}

echo '<div class="clr"></div></section></div>';


?>
