<?php
/* Protago
 * index.php
 * default theme file
 */

get_template_part('html/header');

echo '<body '; body_class(); echo '>';

wp_body_open();

get_template_part('html/top');

get_template_part('html/loop');

get_template_part('html/sidebar');

get_template_part('html/footer');

echo '</body></html>';
