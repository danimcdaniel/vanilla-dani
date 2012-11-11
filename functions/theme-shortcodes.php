<?php
/*-----------------------------------------------------------------------------------
TABLE OF CONTENTS - Shortcodes
 - Related Posts
-----------------------------------------------------------------------------------*/
//RELATED POSTS
function related_posts( $atts ) {
	extract(shortcode_atts(array(
	    'limit' => '5',
                ), $atts));
	global $wpdb, $post, $table_prefix;
	if ($post->ID) {
		$retval = '<h5>Related Posts</h5><ul>';
 		// Get tags
		$tags = wp_get_post_tags($post->ID);
		$tagsarray = array();
		foreach ($tags as $tag) {
			$tagsarray[] = $tag->term_id;
		}
		$tagslist = implode(',', $tagsarray);

		// Do the query
		$q = "SELECT p.*, count(tr.object_id) as count
			FROM $wpdb->term_taxonomy AS tt, $wpdb->term_relationships AS tr, $wpdb->posts AS p WHERE tt.taxonomy ='post_tag' AND tt.term_taxonomy_id = tr.term_taxonomy_id AND tr.object_id  = p.ID AND tt.term_id IN ($tagslist) AND p.ID != $post->ID
				AND p.post_status = 'publish'
				AND p.post_date_gmt < NOW()
 			GROUP BY tr.object_id
			ORDER BY count DESC, p.post_date_gmt DESC
			LIMIT $limit;";

		$related = $wpdb->get_results($q);
 		if ( $related ) {
			foreach($related as $r) {
				$retval .= '<li><a title="'.wptexturize($r->post_title).'" href="'.get_permalink($r->ID).'">'.wptexturize($r->post_title).'</a></li>';
			}
		} else {
			$retval .= '
	<h5>No related posts found</h5>';
		}
		$retval .= '</ul>';
		return $retval;
	}
	return;
}
add_shortcode('related', 'related_posts');

//TWEETMEME RETWEET BUTTON
function tweetmeme() {
	return '<div class="tweetmeme"><script type="text/javascript" src="http://tweetmeme.com/i/scripts/button.js"></script></div>';
}
add_shortcode('tweet', 'tweetmeme');

//STUMBLEUPON BUTTON
function stumble_shortcode() {
	$stumble = '<div class="stumble"><script src="http://www.stumbleupon.com/hostedbadge.php?s=5&amp;r=">// <![CDATA[">// ]]></script></div>';
	return $stumble;
}
add_shortcode('stumble', 'stumble_shortcode');

//FACEBOOK SHARE BUTTON
function facebook_shortcode() {
    return '<div class="facebook"><script src="http://widgets.fbshare.me/files/fbshare.js"></script></div>';
}
add_shortcode( 'facebook', 'facebook_shortcode' );

//LIST STYLES FOR POSTS
function bullet($atts, $content = null) {
	return '
<div class="bullet">'.$content.'</div>
';
}
add_shortcode('bullet', 'bullet');
function square($atts, $content = null) {
	return '
<div class="square">'.$content.'</div>
';
}
add_shortcode('square', 'square');

//CSS BUTTONS
function button_shortcode( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'color' => '',
      ), $atts ) );
      return '<div class="button button_' . $color . '">' . $content . '</div>';
}
add_shortcode('button', 'button_shortcode');
?>