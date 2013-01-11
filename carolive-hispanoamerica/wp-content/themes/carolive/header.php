<div id="header"> <!-- j'ai enleve le header du "bodysite" afin qu'il prenne toute la largeur-->
  <div class="banner header_ctnr"> <!-- ajout de la classe header_ctnr que le header soit centre avec le reste de la page -->
    <a href="homepage.html"><h1 id="ceh" name="ceh"><span>Carolive en HispanoAmerica</span></h1></a>
  </div>
</div>
<div id="nav">
	<ul class="menu">
		<li class="universe">
			<a href="<?php bloginfo('url'); ?>" class="home"><span>Home</span></a>
		</li>
    <?php
    $universes = get_categories('orderby=id&exclude=1,3,4&hide_empty=0');
    foreach ($universes as $universe) {
      if ($universe->parent < 1) {
    ?>
        <li class="universe">
          <a href="<?php echo get_category_link( $universe->term_id ); ?>"><?php echo $universe->name ?></a>
          <ul>
            <?php
            $categories = get_categories('orderby=id&child_of='.$universe->term_id.'&hide_empty=0');
            foreach ($categories as $category) {
            ?>
              <li>
                <a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name ?></a>
              </li>
            <?php } ?>
          </ul>
        </li>
    <?php } } ?>
	</ul>
</div>