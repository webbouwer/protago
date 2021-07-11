<?php
/* protago
 * loop.php
 */

// get post(s)
// detect frontpage,page, post custom post or taxonomies

echo '<div id="maincontent"><div class="contentmargin"><div id="loopcontainer">';

if ( have_posts() ) :

  while( have_posts() ) : the_post(); ?>

    <div id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?>>
    <?php

    if ( is_super_admin() && ( is_single() || is_page() ) ) {
      edit_post_link( __( 'Edit' , 'protago' ), '<span class="edit-link">', '</span>' );
    }

    echo '<h1><a href="'.get_the_permalink().'">'.get_the_title().'</a></h1>';

    // post meta
    // time_post_public

    if( is_single() || is_page() ){

        echo apply_filters('the_content', get_the_content());

        if( is_single() && ( comments_open() || get_comments_number() ) ){
            comments_template( '/html/comments.php' );
        }

    }else{

        echo apply_filters('the_excerpt', get_the_excerpt()); // the_excerpt_length( 32 );

    }

    echo '</div>';

  endwhile;

endif;

echo '<div class="clr"></div></div>';

wp_link_pages();

echo '</div></div>';

wp_reset_query();
