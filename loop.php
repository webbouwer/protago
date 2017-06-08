<!-- POSTS -->
<?php // check list type
// search
if( is_search() ){ // search results
echo '<div class="searchheader">'.__('Resultaten voor ', 'protago' ).'<strong>'.wp_specialchars($s).'</strong></div>';
}
// get post(s)
if ( have_posts() ) :
while( have_posts() ) : the_post();


if ( !is_single() && !is_page() ) {

// post in a list
?>
<div id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?>>
<?php
echo '<h2><a href="'.get_the_permalink().'">';
if( is_search() ){ echo search_title_highlight(); }else{ echo get_the_title(); }
echo '</a></h2>';
if ( has_post_thumbnail() ) {
echo '<a href="'.get_the_permalink().'" title="'.get_the_title().'" >';
the_post_thumbnail('big-thumb');
echo '</a>';
}
if( get_theme_mod('protago_settings_content_authordisplay', 'list') == 'list' || get_theme_mod('protago_settings_content_authordisplay', 'list') == 'all' ){
protago_display_author();
}
if( get_theme_mod('protago_settings_content_datedisplay', 'list') == 'list' || get_theme_mod('protago_settings_content_datedisplay', 'list') == 'all' ){
protago_display_date();
}
if ( is_super_admin() ) {
edit_post_link( __( 'Bewerk' , 'protago' ), '<span class="edit-link">', '</span>' );
}

echo '<div class="innerpadding">';
if( is_search() ) {
echo search_excerpt_highlight();
}else{
echo apply_filters('the_excerpt', get_the_excerpt());
}

echo '<a href="'.get_the_permalink().'">'.__('Lees meer', 'protago' ).'</a>';

echo '</div>';



echo '</div>';

}else if(is_single()){

// single post
?>
<div id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?>>
<?php
echo '<article>';

if ( has_post_thumbnail() ) {
the_post_thumbnail('medium');
}
echo '<h1><a href="'.get_the_permalink().'">'.get_the_title().'</a></h1>';

if( get_theme_mod('protago_settings_content_authordisplay', 'list') == 'single' || get_theme_mod('protago_settings_content_authordisplay', 'list') == 'list' || get_theme_mod('protago_settings_content_authordisplay', 'list') == 'all' ){
protago_display_author();
}
if( get_theme_mod('protago_settings_content_datedisplay', 'list') == 'single' || get_theme_mod('protago_settings_content_datedisplay', 'list') == 'list' || get_theme_mod('protago_settings_content_datedisplay', 'list') == 'all' ){
protago_display_date();
}
if ( is_super_admin() ) {
edit_post_link( __( 'Edit' , 'protago' ), '<span class="edit-link">', '</span>' );
}

echo '<div class="innerpadding">';
echo apply_filters('the_content', get_the_content());
echo '</div>';

echo '</article>';

// post categories
the_category(', ');
the_tags('Tags: ',' ');

// prev / next posts
previous_post_link('%link', __('vorige', 'protago' ).': %title', TRUE);
next_post_link('%link', __('volgende', 'protago' ).': %title', TRUE);

echo '</div>';

// post comments
if ( comments_open() || get_comments_number() ) {
comments_template(); // WP THEME STANDARD: comments_template( $file, $separate_comments );
}

}else if( is_page() ){

?>
<div id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?>>
<?php

echo '<article>';
if ( has_post_thumbnail() ) {
the_post_thumbnail('medium');
}
echo '<h1><a href="'.get_the_permalink().'">'.get_the_title().'</a></h1>';

if( get_theme_mod('protago_settings_content_authordisplay', 'list') == 'page' || get_theme_mod('protago_settings_content_authordisplay', 'list') == 'all' ){
protago_display_author();
}
if( get_theme_mod('protago_settings_content_datedisplay', 'list') == 'page' || get_theme_mod('protago_settings_content_datedisplay', 'list') == 'all' ){
protago_display_date();
}
if ( is_super_admin() ) {
edit_post_link( __( 'Edit' , 'protago' ), '<span class="edit-link">', '</span>' );
}

echo '<div class="innerpadding">';
echo apply_filters('the_content', get_the_content());
echo '</div>';

echo '</article>';

$defaults = array(
		'before'           => '<div>' . __( 'Pagina\'s:'  , 'protago' ),
		'after'            => '</div>',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => __( 'volgende page'  , 'protago' ),
		'previouspagelink' => __( 'vorige page'  , 'protago' ),
		'pagelink'         => '%',
		'echo'             => 1
);
wp_link_pages( $defaults );

}
endwhile;
endif;

// pagination
if ( !is_single() ) {

global $wp_query;
$big = 999999999; // need an unlikely integer
echo paginate_links( array(
'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
'format' => '?paged=%#%',
'current' => max( 1, get_query_var('paged') ),
'total' => $wp_query->max_num_pages
));

}

?>
