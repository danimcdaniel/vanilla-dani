<?php
// Quote Post Type Template
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('quote'); ?>>
	<h2 class="entry-title quote-title">
		<?php the_title(); ?>
	</h2>
	<div class="additional-meta quote-additional-meta">
		Posted on <?php the_time('F jS, Y') ?> by <?php the_author() ?>
	</div>
	<div class="entry-content quote-content">
		<?php if ( has_post_thumbnail()) the_post_thumbnail('single-post-thumbnail'); ?>
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:'), 'after' => '</div>' ) ); ?>
	</div><!-- end .entry-content -->
	
	<div class="entry-meta quote-meta">
	<ul>
		<li>Posted in <?php the_category(', ') ?></li>
		<li><?php the_tags('Tags: ',' &bull; '); ?></li>
	</ul>
		<?php the_shortlink('short link', null, '<ul><li>Short Link: ', '</li></ul>'); ?>
		<?php edit_post_link( __('Edit Post'), '<ul><li>', '</li></ul>'); ?>
	</div><!-- end .entry-meta --> 
</div>
<!-- end .post .quote -->