<?php get_header(); ?>
<div id="posts-wrap">
   <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?> <!-- BREADCRUMBS in functions.php -->
   <?php if (have_posts()) : ?>
   <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	   <h1 class="archive-title">
	      <?php /* If this is a category */ if (is_category()) { ?>
	         <?php _e('Category', 'blank'); ?> &#8220;<?php single_cat_title(); ?>&#8221;
	      <?php /* If this is a tag */ } elseif( is_tag() ) { ?>
	         <?php _e('Posts tagged with', 'blank'); ?> &#8220;<?php single_tag_title(); ?>&#8221;
	      <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
	         <?php _e('Archive for', 'blank'); ?> <?php the_time('F jS, Y'); ?>
	      <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	         <?php _e('Archive for', 'blank'); ?> <?php the_time('F, Y'); ?>
	      <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	         <?php _e('Archive for', 'blank'); ?> <?php the_time('Y'); ?>
	      <?php /* If this is an author archive */ } elseif (is_author()) { ?>
	         <?php _e('Author Archive ', 'blank'); ?>
	      <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	         <?php _e('Blog Archives ', 'blank'); ?>
	 	   <?php } ?>
		</h1>
   
		<?php if (is_category()) { $this_category = get_category($cat); if (get_category_children($this_category->cat_ID) != "")
		{
		   echo "<div class='subcat'>";
		   echo "<h4 class='archive-title'>Subcategories</h4>";
		   echo "<ul>";
		   wp_list_categories('orderby=id&show_count=0&title_li=&use_desc_for_title=1&child_of='.$this_category->cat_ID);
		   echo "</ul>";
		   echo "</div>"; }
		}
		?>

	<?php while (have_posts()) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class('post-archive'); ?>>
		<h2 class="entry-title archive-title">
			<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h2>
		<div class="additional-meta additional-meta-archive">
			Posted on <?php the_time('F jS, Y') ?> by <?php the_author() ?>
		</div>

		<div class="entry-content archive-content">
			<?php if (has_post_thumbnail()) { the_post_thumbnail(); } ?>
			<?php the_excerpt(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:'), 'after' => '</div>' ) ); ?>
		</div><!-- end .entry-content -->

        <div class="entry-meta entry-meta-archive">
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
		<div class="navigation navigation-archive">
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
</div><!-- end #posts-wrap -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>