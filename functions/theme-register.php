<?php
/*-----------------------------------------------------------------------------------
TABLE OF CONTENTS

- Register 3.0 menu navigation
- Register Sidebars
-----------------------------------------------------------------------------------*/

//REGISTERS WP V3.0 MENU NAVIGATION
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
	register_nav_menus(
		array(
			'top-menu' => __( 'Top Menu' ),
			'main-menu' => __( 'Main Menu' ),
			'footer-menu' => __( 'Footer Menu' ),
		)
	);
}
//REGISTER SIDEBAR WIDGETS
add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
register_sidebar(
		array(
		'id' => 'home-sidebar',
		'name' => __( 'Home Sidebar' ),
		'description' => __( 'Home Sidebar Widget Area' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
));
register_sidebar(
		array(
		'id' => 'blog-sidebar',
		'name' => __( 'Blog Sidebar' ),
		'description' => __( 'Blog Sidebar Widget Area' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
));
register_sidebar(
		array(
		'id' => 'page-sidebar',
		'name' => __( 'Page Sidebar' ),
		'description' => __( 'Page Sidebar Widget Area' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
));
register_sidebar(
		array(
		'id' => 'footer-one',
		'name' => __( 'Footer One' ),
		'description' => __( 'Footer One Widget Area' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
));
register_sidebar(
		array(
		'id' => 'footer-two',
		'name' => __( 'Footer Two' ),
		'description' => __( 'Footer Two Widget Area' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
));
register_sidebar(
		array(
		'id' => 'footer-three',
		'name' => __( 'Footer Three' ),
		'description' => __( 'Footer Three Widget Area' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
));
register_sidebar(
		array(
		'id' => 'footer-four',
		'name' => __( 'Footer Four' ),
		'description' => __( 'Footer Four Widget Area' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
));
}
?>