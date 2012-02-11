<?php

add_filter( 'excerpt_length', 'jb_excerpt_length' );
add_filter( 'get_the_excerpt', 'custom_excerpt' );
add_filter( 'excerpt_more', 'read_more_link' );	
	
add_filter('the_permalink_rss', 'jb_permalink_rss');
add_filter('the_content', 'jb_add_permalink_to_content');
add_filter('the_excerpt_rss', 'jb_add_permalink_to_content');
add_filter('the_shortlink', 'my_shortlink', 10, 4 );
add_filter('body_class','browser_body_class');

add_action('init', 'remove_head_links');
add_shortcode("heroes", "heroes_shortcode");


if(ENV == ENV_PRODUCTION){
	add_action('wp_head', 'add_google_analytics_async');
}


function remove_head_links() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
}



function heroes_shortcode(){
	$links = get_bookmarks("category_name=heroes");
	$ret = "<ul class='columns-two'>";
	if($links): foreach($links as $l): 
		
	$ret .= '<li><a href="'. $l->link_url .'">'. $l->link_name .'</a></li>';
	
	endforeach; endif;
	$ret .= "</ul>";
	
	return $ret;
}



/**
*	Use the actual short URL in shortlinks.
*
*/
function my_shortlink( $link, $shortlink, $text, $title ){
	return $shortlink;
}




/**
*	Adds the current browser as a class to the body tag. Handy for styling.
*
*/
function browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_safari, $is_chrome, $is_iphone;

	$is_win = stripos($_SERVER["HTTP_USER_AGENT"], "windows");
	
	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) $classes[] = 'ie';
	else $classes[] = 'unknown';

	if($is_iphone) $classes[] = 'iphone';
	
	// Adds 'windows' to the body class
	if($is_win !== false) $classes[] = 'windows';
	
	return $classes;
}


/**
*	Sets the excerpt length. Stored in the EXCERPT_LENGTH constant.
*/
function jb_excerpt_length( $length ) {
	return EXCERPT_LENGTH;
}



/**
 * Adds the "Read More" link to custom post excerpts.
 *
 * @return string Excerpt with "Read More" link in the end.
 */
function custom_excerpt( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= read_more_link();
	}
	return $output;
}



/**
* 	Returns a "Read more" link in excerpts
*
*	@args String $text: The text inside the link. Defaults to 'Read more'.
*	@args String $class: The class attribute. Defaults to 'read-more'.
*
*	@return String: The formatted link with an ellipsis in the front.
*/
function read_more_link() {
	$link = ' &hellip; <p class="right"><a class="read-more" href="%2$s">%1$s →</a></p>';
	
	return sprintf($link, __("Read more"), get_permalink());
}


function show_ping($comment, $args, $depth){
	$GLOBALS['comment'] = $comment; ?>
	
	<li>
		<a href="<?php echo $comment->comment_author_url;?>"><?php echo $comment->comment_author;?></a>
	</li>
		
	<?php 
}


/**
*	Make the main heading in users' RSS reader lead to the attached link (custom field: Link).
*
*/

function jb_permalink_rss($content) {
	global $wp_query;
	$postid = $wp_query->post->ID;
	$link = get_post_meta($postid, LINK, true);
	
	if(is_feed()) {
		if($link !== '') {
			$content = $link;
		}
		else {
			$content = get_permalink($postid);
		}
	}
	
	return $content;
}

/**
*	If a custom field Link is attached, show a permalink at the bottom
*/
function jb_add_permalink_to_content($content){
	global $wp_query;
	$postid = $wp_query->post->ID;
	$link = get_post_meta($postid, LINK, true);
	
	if(is_feed()){
		if($link !== ''){
			$content = $content . "<p><a href='". get_permalink($postid) ."' title='permalink'>★ Permalink</a></p>\n";
		}else{
			$content = $content;
		}
	}
	
	return $content;
}