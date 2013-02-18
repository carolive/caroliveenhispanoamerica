<?php

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	// Taille des images :
	add_image_size('trip-post-thumbnail', 210, 280);
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

function add_span_to_post_title( $title ) {
	if (trim($title) != "") {
		$array_title = explode(" ", $title);
		if(sizeof($array_title) > 1 ) {
			$first_word = "<span>".$array_title['0']."</span>";
			unset($array_title['0']);
			return $first_word." ".implode(" ", $array_title);
		} else {
			return "<span>{$title}</span>";
		}
	}
	return $title;
}
add_filter( 'the_title', 'add_span_to_post_title' );

add_filter('wp_head','sb_force_comment');
function sb_force_comment( ) {
	global $withcomments;
	if(is_category())
		$withcomments = true; //force to show the comment on category page
}


?>