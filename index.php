<?php
/* Protago
 * index.php
 * default theme file
 */
get_template_part('html/htmlhead');

echo '<body '; body_class(); echo '><div id="viewcontainer">';

wp_body_open();

get_template_part('html/header');

get_template_part('html/content');

get_template_part('html/footer');

wp_footer();

echo '</div></body></html>';
