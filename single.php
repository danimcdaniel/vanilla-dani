<?php get_header(); ?>
<div id="posts-wrap">
	<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?> <!-- BREADCRUMBS in functions.php -->
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?> <!-- Start Loop -->
		<div id="post-<?php the_ID(); ?>" <?php post_class('post-single'); ?>>
		    <h2 class="entry-title single-title">
		        <?php the_title(); ?>
		    </h2>
		    <div class="entry-content single-content">
				<?php if ( has_post_thumbnail()) the_post_thumbnail('single-post-thumbnail'); ?>
		        <?php the_content(); ?>
		        <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:'), 'after' => '</div>' ) ); ?>
		    </div><!-- end .entry-content -->
	
	      	<div class="entry-meta entry-meta-single">
				<ul>
					<li>Posted in <?php the_category(', ') ?></li>
					<li><?php the_tags('Tags: ',' &bull; '); ?></li>
				</ul>
				<?php the_shortlink('short link', null, '<ul><li>Short Link: ', '</li></ul>'); ?>
				<?php edit_post_link( __('Edit Post'), '<ul><li>', '</li></ul>'); ?>
	      	</div><!-- end .entry-meta --> 
	      	
	      	<?php if ( get_option('dm_author_disable') == 'true') { ?>
	      	<?php } else { ?>
	      	<div class="author-box">
	      		<div class="right">
	      			<p>
	      				<h4><?php echo get_the_author_link(); ?></h4>
	      				<?php the_author_description(); ?>
	      			</p>
	      			<div class="author-meta">
	      				View more posts by <?php the_author_posts_link(); ?>
	      			</div>
	      		</div>
	      		<div class="left">
	      			<?php echo get_avatar( get_the_author_email(), '75' ); ?>
	      		</div>
	      	</div><!--end author box-->
	      	<?php } ?>
	   </div><!-- end .post post-single -->

		<div class="navigation navigation-single">
			<?php if (get_adjacent_post(false, '', true)): // if there are older posts ?>
				<div class="nav-prev"><?php previous_post_link('&laquo; %link'); ?></div>
			<?php endif; ?>
			<?php if (get_adjacent_post(false, '', false)): // if there are newer posts ?>
				<div class="nav-next"><?php next_post_link('%link &raquo;'); ?></div>
			<?php endif; ?>
		</div>
	
	<?php comments_template( '', true ); ?>
	<?php endwhile; else: ?>
	
	<div class="error">
		<h4>The page you are looking for has either been deleted or moved.</h4>
		<p>Would you like to search for it?</p>
		<?php get_search_form(); ?> 
	</div>
   
	<?php endif; ?>
</div><!-- end .posts-wrap -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>