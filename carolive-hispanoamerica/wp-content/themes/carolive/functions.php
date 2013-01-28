<?php

if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support( 'post-thumbnails' );
}

add_filter('wp_head','sb_force_comment');
function sb_force_comment( ) {
  global $withcomments;
  if(is_category())
    $withcomments = true; //force to show the comment on category page
}

function carolive_comment( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;
?>
	<li id="li-comment-<?php comment_ID(); ?>">
			<div class="comment-content"><?php comment_text(); ?></div>
  </li>

<?php
}

?>