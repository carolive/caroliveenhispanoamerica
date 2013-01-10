<?php global $post;
$categories = get_the_category();
foreach ($categories as $category) :
?>
<h3>More News From This Category</h3>
<ul>
	<?php
	$posts = get_posts('numberposts=20&category='. $category->term_id);
	foreach($posts as $post) :
	?>
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></li>
	<?php endforeach; ?>
	<li><strong><a
			href="<?php echo get_category_link($category->term_id);?>"
			title="View all posts filed under <?php echo $category->name; ?>">ARCHIVE
				FOR '<?php echo $category->name; ?>' CATEGORY &raquo;
		</a> </strong></li>
	<?php endforeach; ?>
</ul>
