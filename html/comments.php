<?php
/* protago
 * comments.php
 */

/* If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

// If comments are closed and there are comments, leave a  note
if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
?>
<p class="no-comments"><?php __( 'Comments closed', 'protago' ); ?></p>
<?php endif;
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );
$comment_args = array( 'title_reply'=> __('Nieuw bericht:', 'protago' ),

'fields' => apply_filters(
    'comment_form_default_fields', array(

        'author' =>
        '<div class="comments-nameinput"><label for="author">' . __( 'Naam', 'protago' ) .
        ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
        '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" ' . $aria_req . ' /></div>',

        'email' =>
        '<div class="comments-emailinput"><label for="email">' . __( 'Email', 'protago' ) .
        ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
        '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" ' . $aria_req . ' /></div>',

        'url' => '' ) ),

        'comment_field' =>
        '<div class="comments-textinput"><label for="comment">'. __( 'Bericht:', 'protago' ) . '</label>' .
        '<textarea id="comment" name="comment" cols="45″ rows="8″ aria-required="true"></textarea></div>',

        'label_submit' => __( 'verstuur', 'protago' ),
        'comment_notes_before' => '',
        'comment_notes_after' => '',
);

comment_form($comment_args);
// Arguments for the query
$args = array();
// The comment query
$comments_query = new WP_Comment_Query;
$comments = $comments_query->query( $args );
// The comment loop
if ( !empty( $comments ) ) {
    echo '<ul>';
    foreach ( $comments as $comment ) {
        //comment_author
        //comment_content
        //comment_date / comment_date_gmt
        echo '<li class="comment">';
            echo '<div class="message">'. $comment->comment_content .'</div>';
            echo '<div class="author">'. $comment->comment_author.'</div>';
            echo '<div class="time">';
            time_post_public( ( strtotime($comment->comment_date) );
            echo '</div>';
        echo '</li>';
        //print_r($comment);
    }
    echo '</ul>';
} else {
    echo 'No comments found.';
}
?>
