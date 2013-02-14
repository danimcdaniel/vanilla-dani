<div id="sidebar">
	<!-- AD BLOCK from theme options) -->
	<?php if ( get_option('dm_ad_disable') == 'true') { ?>
	<?php } else { ?>
		<div class="ad-block">
			<h3>Sponsored Ads</h3>
			<ul>
				<li><?php echo stripslashes(get_option('dm_ad1')); ?></li>
				<li><?php echo stripslashes(get_option('dm_ad2')); ?></li>
				<li><?php echo stripslashes(get_option('dm_ad3')); ?></li>
				<li><?php echo stripslashes(get_option('dm_ad4')); ?></li>
			</ul>
		</div>
	<?php } ?>
	<!-- START WIDGETS -->
<!--home-->
    <?php if (is_front_page()) { ?>
		<?php dynamic_sidebar('home-sidebar'); ?>
<!--end home-->
<!--page-->
    <?php } elseif (is_page()) { ?>
		<?php dynamic_sidebar('page-sidebar'); ?>
<!--end page-->
<!--general-->
    <?php } else { ?>
		<?php dynamic_sidebar('blog-sidebar'); ?>
<!--end general-->
    <?php } ?>
</div> <!-- end #sidebar -->