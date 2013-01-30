<?php

if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
}

function inherit_template() {
	if (is_category()) {
		$catid = get_query_var('cat');
		$cat = &get_category($catid);
		$parent = $cat->category_parent;
		$catParent = &get_category($parent);
		if ($catParent->slug == "trip") {
			if (file_exists(get_template_directory() . '/subcategory-trip.php')) {
				include (get_template_directory() . '/subcategory-trip.php');
				exit;
			}
		}
	}
}

add_action('template_redirect', 'inherit_template', 1);

add_filter('wp_head','sb_force_comment');
function sb_force_comment( ) {
  global $withcomments;
  if(is_category())
    $withcomments = true; //force to show the comment on category page
}

?>