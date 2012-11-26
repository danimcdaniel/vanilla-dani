<?php get_header(); ?>
<div id="content">
	
		<div class="error">
	         <h2 class="entry-title error-title">
	            Error 404 - Not Found<br />
	            The page you were looking for has either been deleted or moved
	         </h2>
         	<div class="entry-content error-content">
         		Would you like to search for something else?
            	<?php get_search_form(); ?>
      		</div>
       </div>
       
</div><!-- end #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>