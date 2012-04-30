<?php
/*
The template for displaying Comments.
The area of the page that contains both list of comments
and the comment form.
 */
?>
<div id="comments">
<?php if ( post_password_required() ) : ?>
   <p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'blank' ); ?></p>
<?php
   /* Stop the rest of comments.php from being processed,
   * but don't kill the script entirely -- we still have
   * to fully load the template.
   */
   return;
   endif;
?>
<?php // You can start editing here -- including this comment! ?>
<?php if ( have_comments() ) : ?>
   <h2 class="entry-title comments-title">
      <?php
      printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'blank' ),
      number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
      ?>
   </h2>
   
   <ul class="commentlist">
        <li class="rss"><?php comments_rss_link('Subscribe to these comments'); ?></li>
        <?php wp_list_comments( array( 'callback' => 'custom_comment' ) ); ?>
   </ul>
  
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
<?php if(function_exists('wp_commentnavi')) { wp_commentnavi();  ?> 
   <?php } else { ?>
   <div class="navigation navigation-comments">
      <div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'blank' ) ); ?></div>
      <div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'blank' ) ); ?></div>
   </div><!-- .navigation -->
<?php } ?>
<?php endif; // check for comment navigation ?>

<?php else : // or, if we don't have comments:
if ( ! comments_open() ) :
?>

<p class="nocomments"><?php _e( 'Comments are closed.', 'blank' ); ?></p>

<?php endif; // end ! comments_open() ?>
<?php endif; // end have_comments() ?>

   <div id="commentsform">
   <?php
      $commenter = wp_get_current_commenter();
      $req = get_option( 'require_name_email' );
   ?>
   <?php comment_form(
      array(
         'title_reply'=> '<h4 class="entry-title comments-title">' .__( 'Leave a Comment!' ) . '</h4>',
         'label_submit' => __( 'Post your Comment' ),
         'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published. Required fields are marked with *' ) . '</p>' . '<p class="form-allowed-tags">' . sprintf( __( 'You may use these HTML tags and attributes: %s' ), '<code>' . allowed_tags() . '</code>' ) . '</p>',
         'comment_notes_after' => '',
         'comment_field' => '<p class="comment-form-comment">' . '<label for="comment">' . __( 'Message', 'noun' ) . '</label>' . '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' . '</textarea>' . '</p>',
         'fields' => array(
         'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label>' . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"  />' . '</p>',
         'email' => '<p class="comment-form-email">' . '<label for="email">' . __( 'Email' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label> ' . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" />' . '</p>',
         'url' => '<p class="comment-form-url">' . '<label for="url">' . __( 'Website' ) . '</label>' . '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />' . '</p>',    
      )));
   ?>
   </div><!-- #commentsform -->
</div> <!-- END #comments -->