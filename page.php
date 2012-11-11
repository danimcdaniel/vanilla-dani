<?php get_header(); ?>
<div id="content">
	<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?> <!-- BREADCRUMBS in functions.php -->
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?> <!-- Start loop -->
		<div id="post-<?php the_ID(); ?>" <?php post_class('post-page'); ?>>
			<h2 class="entry-title page-title">
				<?php the_title(); ?>
			</h2>
			<div class="entry-content page-content">
				<?php if ( has_post_thumbnail()) the_post_thumbnail('single-post-thumbnail'); ?>
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:'), 'after' => '</div>' ) ); ?>
				<?php edit_post_link( __('Edit Page'), '<p>', '</p>'); ?>
			</div><!-- end #page-content -->
		</div><!-- end .post -->
	<?php if (function_exists('comments_template')) comments_template( '', true ); ?>
	<?php endwhile; endif; ?>
</div><!-- end #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>