<?php

function linked_label($atts = null) {
	$defaults = array(
		"title" => "A linked post",
		"class" => "label"
	);
	$attr = wp_parse_args($atts, $defaults);
	
	if(strpos($attr['class'], "label") === false)
		$attr['class'] .= " label";
		
	echo content_tag("span", "Linked", $attr);
}

function sep($symbol = "&middot;"){
	return '<span class="sep">'.$symbol.'</span>';
}


/**
*	Wrapper function for linking to pages.
*
*	@args String/int $page: The slug or ID of the page you're linking to
*	@args bool $echo: Prints (true) or returns (false) the permalink.
*
*	Usage: <a href="<?php link_to('about');?>">About me</a>
*/
function link_to_page($page_slug, $echo = true){
	if(is_string($page_slug))
		$page = get_ID_by_slug($page_slug);
	
	if(!$page){
		$link = get_bloginfo("url")."/".$page_slug;
	}
	else {
		$link = get_permalink($page);
	}

	if($echo && $link)
		echo $link;
	else
		return $link;
}





/**
*	Returns the ID of a page from the slug.
*
*	@args String $page_slug: The slug.
*/
function get_id_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page)
        return $page->ID;
	else
        return null;
}



/**
*	Only show day + month when they are in the current year.
*
*/
function get_jb_relative_time($format, $id=null){
	if($id == null){
		global $post;
		$id = $post->ID;
	}
	
	if(get_the_time("Y", $id) == date("Y"))
		return get_the_time($format, $id);
	else
		return get_the_time($format . ", Y", $id);
}

function jb_relative_time($format, $id=null){
	echo get_jb_relative_time($format, $id);
}


/**
*	List posts by month
*/

function list_posts_by_month($outer_class_name, $inner_class_name=null){
	if($inner_class_name == null)
		$inner_class_name = $outer_class_name;
		
	// Declare some helper vars
	$previous_year = $year = 0;
	$previous_month = $month = 0;
	$ul_open = false;

	// Get the posts
	$myposts = get_posts('numberposts=-1&orderby=post_date&order=DESC');
	
	echo '<ol class="'.$outer_class_name.'">';
	
	?>

	<?php foreach($myposts as $p) : ?>

		<?php
		
		$year = mysql2date('Y', $p->post_date);
		$month = mysql2date('n', $p->post_date);
		$day = mysql2date('j', $p->post_date);
		
		$format = (get_the_time("Y", $p) == date("Y")) ? "F" : "F Y";

		?>

		<?php if($year != $previous_year || $month != $previous_month) : ?>

			<?php if($ul_open == true) : ?>
			</ol>
			
			</li>
			
			<?php endif; ?>
			
			<li>
			
			<h3><?php echo get_the_time($format, $p); ?></h3>

			<ol class="<?php echo $inner_class_name;?>">

			<?php $ul_open = true; ?>

		<?php endif; ?>

		<?php $previous_year = $year; $previous_month = $month; ?>
			
			<?php #TODO Duplicate code here. Need to fix.?>
			
			<li>
				<small class="list-detail"><?php echo get_the_time("M j, Y", $p->ID);?></small>
				<a rel="bookmark" href="<?php echo get_permalink($p->ID);?>"><?php echo get_the_title($p->ID);?></a>
				<?php if(get_post_format($p->ID) == "link") linked_label(array("class" => "list-right")); ?>
			</li>


	<?php endforeach; ?>
		</ol>
		
		</ol>
		
<?php }



?>