<?php
/* protago
 * content.php
 */


$content_width = get_theme_mod( 'protago_content_width', 'content');

echo '<div id="content"><div class="outermargin '.$content_width.'">';

get_template_part('html/loop');

get_template_part('html/sidebar');

echo '<div class="clr"></div></div></div>';
