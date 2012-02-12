<?php

/*
 * Making sure Wordless plugin is enabled
 */

if (!class_exists("Wordless")) {
  echo "This theme requires the <a href='https://github.com/welaika/wordless'>Wordless plugin</a> in order to work. Please, install it now!";
  die();
}



/*
 * In this page, you need to setup Wordless routing: you first
 * determine the type of the page using WordPress conditional tags,
 * and then delegate the rendering to some particular view using
 * the `render_view()` helper.
 *
 * To specify a layout other than the default one, please pass it as
 * the second parameter to the `render_view()` method.
 *
 * For a list of conditional tags, please see here: http://codex.wordpress.org/Conditional_Tags
 */

$routes = array(
	"single" => "posts/single",
	"home" => "layouts/home",
	"page('archive')" => "layouts/archive",
	"page('contact')" => "layouts/contact",
	"archive" => "layouts/archive",
	"page" => "layouts/page",
	"404" => "layouts/404",
	"default" => "layouts/page"
);

foreach($routes as $page => $view) {
	$page = ( strpos($page, ")") === false) ? $page."()" : $page;
	$current_route_is = create_function('$key', 'return is_'.$page.';');

	if($current_route_is($page)) {		
		render_view($view);
		break;
	}
}

/*
if (is_single()) {
	render_view("posts/single");

} else if(is_home()){
	render_view("layouts/home");
} else if(is_archive()){
	render_view("layouts/archive");
} else if(is_page("archive")) {
	render_view("layouts/archive");
} else if(is_page()){
	render_view("layouts/page");
} else if(is_404()) {
	render_view("layouts/404");
} else {
  	render_view("posts/archive");
}*/

