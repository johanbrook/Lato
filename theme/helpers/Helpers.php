<?php

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


function add_google_analytics_async($id){?>
	
	<script>
	 var _gaq = [['_setAccount', '<?php echo $id; ?>'], ['_trackPageview']];
	 (function(d, t) {
	  var g = d.createElement(t),
	      s = d.getElementsByTagName(t)[0];
	  g.async = 1;
	  g.src = '//www.google-analytics.com/ga.js';
	  s.parentNode.insertBefore(g, s);
	 }(document, 'script'));
	</script>

<?php
}

?>