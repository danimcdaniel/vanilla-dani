<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->

<head profile="http://gmpg.org/xfn/11">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<?php if (is_search()) { ?>
	<meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
	
	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
	
	<meta name="title" content="<?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	
	<meta name="google-site-verification" content="">
	<!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->
	
	<meta name="author" content="Your Name Here">
	

	<!-- CSS: screen, mobile & print are all in the same file -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<link rel="stylesheet" type="text/css"  href="<?php bloginfo('template_directory'); ?>/css/colors/<?php echo get_option('dm_color_scheme'); ?>.css" />
	<link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo stripslashes(get_option('dm_favicon')); ?>" />
	
	<!-- all our JS is at the bottom of the page, except for Modernizr. -->
	<script src="<?php bloginfo('template_directory'); ?>/js/modernizr-1.7.min.js"></script>
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<!-- KEEPS DUPLICATE CONTENT FROM BEING INDEXED -->
	<?php if((is_home() && ($paged < 2 )) || is_single() || is_page() || is_category()){
	    echo '<meta name="robots" content="index,follow" />';
	} else {
	    echo '<meta name="robots" content="noindex,follow" />';
	} ?> 
	<link type="text/plain" rel="author" href="<?php echo bloginfo('url'); ?>/humans.txt" />
	<!-- END DUPLICATE CONTENT -->
	
	<?php wp_head(); //leave for plugins ?>
	
	<!-- THEME OPTIONS CUSTOM CSS -->
	<?php if (get_option('dm_custom_css') != '') { ?>
		<style type="text/css">
			<?php echo stripslashes(get_option('dm_custom_css')); ?>
		</style>
	<?php } ?>
</head>


<body <?php body_class(); ?>>
<div id="wrapper">
    <div id="header">
        <div class="right">
            <?php wp_nav_menu(
                array(
                    'theme_location' => 'top-menu',
                    'container' => '',
                    'menu_class' => '',
                    'menu' => '',
                )); ?>
            <?php if ( get_option('dm_hdrad_disable') == 'true') { ?>
            <?php } else { ?>
                <?php echo stripslashes(get_option('dm_header_ad')); ?>
            <?php } ?>
        </div>
        <div class="left">
            <?php if (get_option('dm_logo') != '') { ?>
                <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                   <img src="<?php echo stripslashes(get_option('dm_logo')); ?>" alt="<?php bloginfo( 'name' ); ?>" />
                </a>
            <?php } else { ?>
                <h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <h2><?php bloginfo('description'); ?></h2>
			<?php } ?>
         </div>
    </div><!-- END #header -->
     
	<?php wp_nav_menu(
	   array(
	      'theme_location' => 'main-menu',
		  'container_id' => 'mainnav',
		  'menu_class' => '',
		  'menu' => '',
	)); ?>