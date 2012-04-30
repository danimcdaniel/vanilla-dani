<?php
/*---------------------------------------------------------------------------------------------
TABLE OF CONTENTS
- Adds path to theme specific function files
- Add RSS Feed Links to Header
- jQuery Inclusion
- Remove Junk from Header
- Add Google Analytics To Footer
- Add Thumbnail Support
- Excerpt Length
- End of Excerpt
- Enable Threaded Comments
- Enable Shortcodes in Widgets
- Make Shortlinks display actual link
- Adds "All Settings" link to Dashboard
- Adds Post Formats
- Adds NoFollow
----------------------------------------------------------------------------------------------*/

//--PATH TO THEME SPECIFIC FUNCTION FILES-----------------------------------------------------*/
$functions_path = TEMPLATEPATH . '/functions/';
require_once ($functions_path . 'includes.php');

//--ADD FEED LINKS TO HEADER------------------------------------------------------------------*/
if (function_exists('automatic_feed_links')) {
	automatic_feed_links();
} else {
	return;
}

//--SMART JQUERY INCLUSION--------------------------------------------------------------------*/
if (!is_admin()) {
	wp_deregister_script('jquery');
	wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false, '1.3.2');
	wp_enqueue_script('jquery');
}

//--REMOVE JUNK FROM HEAD---------------------------------------------------------------------*/
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

//--ADD GOOGLE ANALYTICS TO FOOTER-------------------------------------------------------------*/
function add_google_analytics() {
	echo '<script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>';
	echo '<script type="text/javascript">';
	echo 'var pageTracker = _gat._getTracker("UA-XXXXX-X");';
	echo 'pageTracker._trackPageview();';
	echo '</script>';
}
add_action('wp_footer', 'add_google_analytics');

//--ADD THUMBNAIL SUPPORT----------------------------------------------------------------------*/
add_theme_support( 'post-thumbnails' );
add_image_size( 'blog-thumbnail', 628, 150, true );
add_image_size( 'single-post-thumbnail', 628, 9999 );

//--CUSTOM EXCERPT LENGTH----------------------------------------------------------------------*/
function custom_excerpt_length($length) {
	return 20;
}
add_filter('excerpt_length', 'custom_excerpt_length');

//--CHANGES WHAT COMES AT THE END OF THE EXCERPT-----------------------------------------------*/
function new_excerpt_more($more) {
       global $post;
       return '<div class="more">' . '<a href="'. get_permalink($post->ID) . '">' . 'Read more &rsaquo;' . '</a>' . '</div>';
}
add_filter('excerpt_more', 'new_excerpt_more');

//--ENABLE THREADED COMMENTS-------------------------------------------------------------------*/
function enable_threaded_comments(){
	if (!is_admin()) {
		if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
			wp_enqueue_script('comment-reply');
		}
}
add_action('get_header', 'enable_threaded_comments');

//--ENABLES SHORTCODES IN WIDGETS--------------------------------------------------------------*/
add_filter('widget_text', 'do_shortcode');

//--ENSURES SHORTLINK DISPLAYS ACTUAL LINK-----------------------------------------------------*/
add_filter( 'the_shortlink', 'my_shortlink', 10, 4 );
function my_shortlink( $link, $shortlink, $text, $title )
{
	return '<a rel="shortlink" href="' . esc_url( $shortlink ) . '" title="' . $title . '">' . $shortlink . '</a>';
}

//--LINK FOR ALL SETTINGS IN ADMIN-------------------------------------------------------------*/
function all_settings_link() {
	add_options_page(__('All Settings'), __('All Settings'), 'administrator', 'options.php');
}
add_action('admin_menu', 'all_settings_link');

//--ADDS POST FORMATS--------------------------------------------------------------------------*/
add_theme_support(
   'post-formats',
    array(
    'aside',
    'chat',
    'gallery',
    'image',
    'link',
    'quote',
    'status',
    'video',
    'audio'
));

//--ADDS NOFOLLOW--------------------------------------------------------------------------------
//--source: http://digwp.com/2010/02/remove-nofollow-attributes-from-post-content/ -------------*/

function remove_nofollow($string) {
	$string = str_ireplace(' rel="nofollow"', '', $string);
	return $string;
}
add_filter('the_content', 'remove_nofollow');
add_filter('comment_text', 'remove_nofollow');
add_filter('comment_author_link', 'remove_nofollow'); 

//--add a filter to remove nofollow-------------------------------------------------------------*/
?>