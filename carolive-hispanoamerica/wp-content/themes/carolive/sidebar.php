<div id="sidebar" class="block">
  <div class="block_title">
    <h2><span>Nos</span> Etapes</h2>
  </div>
  <div class="block_content">
    <ul>
      <?php
      global $post;
      $categories = get_the_category();
      foreach ($categories as $category) :
      ?>
      <li class="category">
        <h3><a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name ?></a></h3>
        <ul>
          <?php
          $posts = get_posts('category='. $category->term_id);
          foreach($posts as $post) :
          ?>
          <li class="post">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span class="post_date">le <?php echo get_the_date(); ?></span>
          </li>
          <?php endforeach; ?>
        </ul>
      </li>
      <?php endforeach; ?>
    </ul>
</div>
