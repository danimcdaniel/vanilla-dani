<?php get_header(); ?>
<div id="content">
	<!-- start breadcrumbs -->
	<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?> 
	<!-- end breadcrumbs -> functions/theme-functions.php -->

	<!-- Start Loop -->
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
	
	<!-- Start Post Format - If no post format uses standard template (template-post.php) otherwise specific post formate template (ex. template-quote.php) -->
	<?php if(!get_post_format()) {
               get_template_part('format', 'post');
          } else {
               get_template_part('format', get_post_format());
          }
    ?>
    <!-- End Post Format -->
	
	<!--start author box - includes theme options can be removed if not using theme options -->
	<?php if ( get_option('dm_author_disable') == 'true') { ?>
		<?php } else { ?>
		<div class="author-box">
			<div class="author-title">
				<?php echo get_avatar( get_the_author_email(), '75' ); ?>
				<h4><?php echo get_the_author_link(); ?></h4>
				<ul>
					<li>Website: <a href="<?php the_author_meta( 'url' ); ?>"><?php the_author_meta( 'url' ); ?></a></li>
					<li>Company: <?php the_author_meta( 'company' ); ?></li>
				</ul>
				<ul>
					<li>Twitter Username: <a href="http://twitter.com/<?php the_author_meta( 'twitter' ); ?>"><?php the_author_meta( 'twitter' ); ?></a></li>
					<li>Gtalk/Jabber: <?php the_author_meta( 'jabber' ); ?></li>
				</ul>
			</div>
			<div class="author-content">
				<?php the_author_description(); ?>
				<p>View more posts by <?php the_author_posts_link(); ?></p>
			</div>
		</div>
	<?php } ?>
	<!--end author box-->
	
	<!--start single post navigation-->
	<div class="navigation single-navigation">
		<?php if (get_adjacent_post(false, '', true)): // if there are older posts ?>
		<div class="nav-prev"><?php previous_post_link('&laquo; %link'); ?></div>
		<?php endif; ?>
		<?php if (get_adjacent_post(false, '', false)): // if there are newer posts ?>
		<div class="nav-next"><?php next_post_link('%link &raquo;'); ?></div>
		<?php endif; ?>
	</div>
	<!--end single post navigation -->

	<?php comments_template( '', true ); ?>

	<?php endwhile; else: ?>

	<!--start error if no posts-->
	<div class="error">
		<h4>The page you are looking for has either been deleted or moved.</h4>
		<p>Would you like to search for it?</p>
		<?php get_search_form(); ?> 
	</div>
	<!--end error-->

	<?php endif; ?>
</div>
<!-- end #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>