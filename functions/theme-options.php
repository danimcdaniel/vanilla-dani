<?php
//BEGIN CUSTOM THEME OPTIONS
//Define Name
$themename = "Vanilla Dani";
$shortname = "dm";
//Automatically Generate A List Of Wordpress Categories
$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
array_unshift($wp_cats, "Choose a category");

//Start Custom Theme Option Fields
$options = array (
array( "name" => $themename." Theme Options", "type" => "title"),
array( "name" => "Customize", "type" => "section"),
array( "type" => "open"),
    array( "name" => "Color Scheme",  
           "desc" => "Select the color scheme",  
           "id" => $shortname."_color_scheme",  
           "type" => "select",  
           "options" => array("default", "red", "green", "blue"),  
           "std" => "default"
          ),
    array( "name" => "Custom CSS",  
           "desc" => "Add custom CSS here",  
           "id" => $shortname."_custom_css",  
           "type" => "textarea",  
           "std" => ""
          ),
    array( "name" => "Logo Image URL",
           "desc" => "Enter the url of your logo image",
           "id" => $shortname."_logo",
           "type" => "text",
           "std" => ""
          ),
    array( "name" => "Custom Favicon",  
           "desc" => "Enter the url of your favicon.ico (Be sure your favicon is in .ico format)",  
           "id" => $shortname."_favicon",  
           "type" => "text",  
           "std" => get_bloginfo('url') ."/favicon.ico"
          ), 
array( "type" => "close"),

array( "name" => "Posts", "type" => "section"),
array( "type" => "open"),   
    array( "name" => "Disable Author Box",
           "desc" => "Check this box if you want to disable the author information box on single posts.",
           "id" => $shortname."_author_disable",
           "type" => "checkbox",
           "std" => "true"
         ),          	
array( "type" => "close"),

array( "name" => "Footer", "type" => "section"),
array( "type" => "open"),
    array( "name" => "Copyright Text",
    	   "desc" => "Enter your copyright information HTML Allowed",
    	   "id" => $shortname."_rights_text",
    	   "type" => "textarea",
    	   "std" => ""),
    array( "name" => "Google Analytics Code",
    	   "desc" => "Enter your Google Analytics or other tracking code",
    	   "id" => $shortname."_ga_code",
    	   "type" => "textarea",
    	   "std" => ""),		
array( "type" => "close"),

array( "name" => "Social", "type" => "section"),
array( "type" => "open"),   
    array( "name" => "Feedburner URL",  
           "desc" => "Enter your Feedburner URL",  
           "id" => $shortname."_feedburner",  
           "type" => "text",  
           "std" => get_bloginfo('rss2_url')
         ),          
    array( "name" => "Twitter Username",
           "desc" => "Enter your Twitter username",
           "id" => $shortname."_twitter",
           "type" => "text",
           "std" => ""
          ),
    array( "name" => "Facebook URL",
           "desc" => "Enter your Facebook URL",
           "id" => $shortname."_fb",
           "type" => "text",
           "std" => ""
          ),
    array( "name" => "LinkedIn URL",
           "desc" => "Enter your LinkedIn URL",
           "id" => $shortname."_linkedin",
           "type" => "text",
           "std" => ""
          ),	
array( "type" => "close"),

array( "name" => "Sponsored Ads", "type" => "section"),
array( "type" => "open"),
    array( "name" => "Disable Header Sponsored Ad?",
           "desc" => "Check this box if you want to disable the sponsored ad space in the header on this theme",
           "id" => $shortname."_hdrad_disable",
           "type" => "checkbox",
           "std" => "true"
         ),
    array( "name" => "Header Ad",
           "desc" => "Paste your 468x60 sponsored ad HTML here",
           "id" => $shortname."_header_ad",
           "type" => "textarea",
           "std" => ""
         ),
    array( "name" => "Disable Sponsored Ad Block?",
           "desc" => "Check this box if you want to disable the sponsored ad block in the sidebar.",
           "id" => $shortname."_ad_disable",
           "type" => "checkbox",
           "std" => "true"
         ),
    array( "name" => "Ad #1",
           "desc" => "Paste your 125x125 sponsored ad HTML here",
           "id" => $shortname."_ad1",
           "type" => "textarea",
           "std" => ""
         ),
    array( "name" => "Ad #2",
           "desc" => "Paste your 125x125 sponsored ad HTML here",
           "id" => $shortname."_ad2",
           "type" => "textarea",
           "std" => ""
         ),
    array( "name" => "Ad #3",
           "desc" => "Paste your 125x125 sponsored ad HTML here",
           "id" => $shortname."_ad3",
           "type" => "textarea",
           "std" => ""
         ),
    array( "name" => "Ad #4",
           "desc" => "Paste your 125x125 sponsored ad HTML here",
           "id" => $shortname."_ad4",
           "type" => "textarea",
           "std" => ""
         ),	
array(  "type" => "close")
);
//END CUSTOM THEME OPTION FIELDS
//VIEW ADMIN PANEL 
function mytheme_add_admin() {

global $themename, $shortname, $options;

if ( $_GET['page'] == basename(__FILE__) ) {

	if ( 'save' == $_REQUEST['action'] ) {

		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

	header("Location: admin.php?page=theme-options.php&saved=true");
die;

}
else if( 'reset' == $_REQUEST['action'] ) {

	foreach ($options as $value) {
		delete_option( $value['id'] ); }

	header("Location: admin.php?page=theme-options.php&reset=true");
die;

}
}
add_menu_page($themename." Theme Options", "".$themename." Theme Options", 'administrator', basename(__FILE__), 'mytheme_admin', '', 61);
}

function mytheme_add_init() {
$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/css/admin.css", false, "1.0", "all");
wp_enqueue_script("rm_script", $file_dir."/js/rm_script.js", false, "1.0");
}
//END VIEW ADMIN PANEL
function mytheme_admin() {
global $themename, $shortname, $options;
$i=0;
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>
<div class="wrap rm_wrap">
    <h2><?php echo $themename; ?> Custom Theme Options</h2>
    <div class="rm_opts">
        <form method="post">
        <?php foreach ($options as $value) {
        switch ( $value['type'] ) {
        case "open":
        ?>
        <?php break; case "close": ?>
    </div>
</div>

<?php break; case "title": ?>

<p>Easily customize the <?php echo $themename;?> Theme using the options below!</p>

<?php break; case 'text': ?>

<div class="rm_input rm_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
    <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>

<?php break; case 'textarea': ?>

<div class="rm_input rm_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
    <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>

<?php break; case 'select': ?>

<div class="rm_input rm_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
    <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
        <?php foreach ($value['options'] as $option) { ?>
        <option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
    </select>
	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>

<?php break; case "checkbox": ?>

<div class="rm_input rm_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
    <?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
    <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
	<div class="full"><?php echo $value['desc']; ?></div><div class="clearfix"></div>
</div>

<?php break; case "section": $i++; ?>

<div class="rm_section">
<div class="rm_title">
    <h3>
        <img src="<?php bloginfo('template_directory')?>/img/trans.gif" class="inactive" alt="">
        <?php echo $value['name']; ?>
    </h3>
    <span class="submit">
        <input name="save<?php echo $i; ?>" type="submit" value="Save changes" />
    </span>
    <div class="clearfix"></div>
</div>
<div class="rm_options">

<?php break; }} ?>

<input type="hidden" name="action" value="save" />
</form>
<form method="post">
    <p class="submit">
        <input name="reset" type="submit" value="Reset Theme Options" />
        <input type="hidden" name="action" value="Reset Theme Options" />
    </p>
</form>
</div>

<div class="shortcodes">
	<h3><?php echo $themename;?> Theme Shortcodes</h3>
	<p>When creating a new post, whenever you want to display a shortcode just type the code into the editor exactly as it is below. For example if you want to add related posts to your article, wherever you want to place them just add [related] into your post and the related posts will be displayed. Shortcodes can be added to widgets as well.</p>
	<ul>
		<li class="title">Buttons:</li>
		<li>[button color="pink"]Button Text[/button]</li>
		<li>Colors included: Pink</li>
	</ul>
	<ul>
		<li class="title">Related Posts:</li>
		<li>[related]</li>
	</ul>
	<ul>
		<li class="title">Tweetmeme Retweet Button:</li>
		<li>[tweet]</li>
	</ul>
	<ul>		
		<li class="title">Stumbleupon Button:</li>
		<li>[stumble]</li>
	</ul>
	<ul>		
		<li class="title">Facebook Share Button:</li>
		<li>[facebook]</li>
	</ul>
	<ul>
		<li class="title">List Style - Bullet</li>
		<li>To add a list with a bullet enclose the list in the following: [bullet][/bullet]</li>
	</ul>
	<ul>
		<li class="title">List Style - Square</li>
		<li>To add a list with a square enclose the list in the following: [square][/square]</li>
	</ul>
</div>
<?php } ?>
<?php
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
?>