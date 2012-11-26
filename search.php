<?php get_header(); ?>
<div id="content">
	<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?> <!-- BREADCRUMBS in functions.php -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<h1 class="archive-title">
		Search Results:
	</h1>
	<div id="post-<?php the_ID(); ?>" <?php post_class('search'); ?>>
		<h2 class="entry-title search-title">
			<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h2>
		<div class="additional-meta search-additional-meta">
			Posted on <?php the_time('F jS, Y') ?> by <?php the_author() ?>
		</div>
		<div class="entry-content search-content">
			<?php if (has_post_thumbnail()) { the_post_thumbnail(); } ?>
			<?php the_excerpt(); ?>
		</div><!-- end .entry-content -->
		<div class="entry-meta search-meta">
			<ul>
			<li>Posted in <?php the_category(', ') ?></li>
				<li><?php comments_popup_link( __( 'No Comments', 'blank' ), __( '1 Comment', 'blank' ), __( '% Comments', 'blank' ), 'comments-link', __('Comments closed', 'blank')); ?></li>
				<li><?php the_tags('Tags: ',' &bull; '); ?></li>
				<?php edit_post_link( __('Edit Post'), '<li>', '</li>'); ?>
			</ul>
		</div><!-- end .entry-meta -->
	</div><!-- end .post -->
	<?php endwhile; ?>

	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); ?>
	<?php } else { ?>
	<div class="navigation search-navigation">
		<div class="nav-prev"><?php next_posts_link( __('Older Entries', 'blank')) ?></div>
		<div class="nav-next"><?php previous_posts_link( __('Newer Entries', 'blank')) ?></div>
	</div>
	<?php } ?>

	<?php else : ?>
	<div class="error">
		<h4>
			The Page or Post you are looking for has either been deleted or moved.
		</h4>
		<p>Would you like to search for it?</p>
		<?php get_search_form(); ?> 
	</div>
	<?php endif; ?>
</div><!-- end #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>      