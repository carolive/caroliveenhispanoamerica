<!DOCTYPE html>
<html lang="fr">
<head profile="http://gmpg.org/xfn/11">
  <?php include 'head-commons.php'; ?>
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/sidebar.css" media="screen" type="text/css" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/comments.css" media="screen" type="text/css" />
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/comments.js"></script>
</head>
<body class="no-customize-support">
<?php wp_customize_support_script(); ?>

<?php get_header(); ?>
  
  <div class="bodysite">
    <div class="container main"> <!-- container : la grille -->
      
      <div class="span-16 left_column">

        <?php while ( have_posts() ) : the_post(); ?>
          <div id="post" class="block">
            
            <div class="block_title">
              <h2><?php the_title(); ?></h2>
            </div>
            <div class="block_content">
              <?php 
              $categories = get_the_category();
              $category = $categories[0];
              ?>
              <p class="post_infos"><a href="<?php echo get_category_link($category->term_id ); ?>"><?php echo $category->cat_name; ?></a>, <span>le <?php echo get_the_date(); ?> à <?php the_time(); ?> par <?php the_author(); ?></span></p>
              <div class="post_text"><?php the_content(); ?></div>
            </div>
            
            <div class="pagination">
              <?php previous_post_link('&laquo; %link', '%title', TRUE); ?> &bull; <?php next_post_link('%link &raquo;', '%title', TRUE); ?>
            </div>

          </div>
			    <?php comments_template(); ?> 
        <!-- Fin de la boucle-->
        <?php endwhile; ?>
        
      </div>
      
      <div class="span-8 last right_column">
        <?php get_sidebar(); ?>
      </div>
    
    </div>
  </div>    
  
  <?php get_footer(); ?>
</body>
</html>