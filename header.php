<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>
	   <?php echo bloginfo('name'); ?>
	</title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<!--[if gte IE 8]><link href="<?php bloginfo('template_directory'); ?>/css/ie8.css" rel="stylesheet" type="text/css"><![endif]-->
	<!--[if lt IE 8]><link href="<?php bloginfo('template_directory'); ?>/css/ie.css" rel="stylesheet" type="text/css"><![endif]-->
	<!--To change the CSS stylesheet depending on the chosen color-->  
	<link rel="stylesheet" type="text/css"  href="<?php bloginfo('template_directory'); ?>/css/colors/<?php echo get_option('dm_color_scheme'); ?>.css" />
	<link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo stripslashes(get_option('dm_favicon')); ?>" />
	<!-- KEEPS DUPLICATE CONTENT FROM BEING INDEXED -->
	<?php if((is_home() && ($paged < 2 )) || is_single() || is_page() || is_category()){
	    echo '<meta name="robots" content="index,follow" />';
	} else {
	    echo '<meta name="robots" content="noindex,follow" />';
	} ?> 
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