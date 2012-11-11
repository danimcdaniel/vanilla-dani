<?php
//BEGIN COMMENTS LIST
//comment form located in comments.php
/**
Template for comments and pingbacks.
To override in a child theme without modifying the comments template
simply create your own custom_comment(), and that function will be used instead.
Used as a callback by wp_list_comments() for displaying the comments.
**/
function custom_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
<div class="comment-entry" id="comment-<?php comment_ID(); ?>">
    <?php if ( $comment->comment_approved == '0' ) : ?>
      <em><?php _e( 'Your comment is awaiting moderation.', 'blank' ); ?></em>
	<?php endif; ?>
   <div class="comment-body">
      <?php comment_text(); ?>
       <div class="reply">
          <?php comment_reply_link( array_merge( $args, array( 'reply_text' => 'Reply to this comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
       </div>
   </div>
   <div class="comment-meta group">
        <ul>
            <li>Written by <?php comment_author_link(); ?></li>
            <li>Posted on <?php /* translators: 1: date, 2: time */printf( __( '%1$s at %2$s', 'blank' ), get_comment_date(),  get_comment_time() ); ?></li>
        </ul>
        <?php echo get_avatar( $comment, 40 ); ?>
		<?php edit_comment_link('(edit)','',''); ?>
   </div>
</div>

<?php
	break;
	case 'pingback'  :
	case 'trackback' :
?>
<li class="pingback">
	<div class="pingback-entry">
		<div class="pingback-author">
			<?php _e( 'Pingback:', 'blank' ); ?> <?php comment_author_link(); ?>
		</div>
	</div>
<?php
	break;
	endswitch;
}
//END COMMENTS
?>