<!DOCTYPE html>
<html lang="fr">
<head profile="http://gmpg.org/xfn/11">
  <?php include 'head-commons.php'; ?>
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/sidebar.css" media="screen" type="text/css" />
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
			  <p class="post_infos"><p><?php the_category(); ?></p>, le <?php echo get_the_date(); ?> à <?php the_time(); ?> par <?php the_author(); ?></p>
              <p class="post_text"><?php the_content(); ?></p>
            </div>

          </div>
			    <?php comments_template(); ?> 
        <!-- Fin de la boucle-->
        <?php endwhile; ?>
		
		<div class="pagination">
		  <?php previous_post_link('&laquo; %link', '%title', TRUE); ?> &bull; <?php next_post_link('%link &raquo;', '%title', TRUE); ?>
        </div>
        
      </div>
      
      <div class="span-8 last right_column">
        <?php get_sidebar(); ?>
      </div>
    
    </div>
  </div>    
  
  <?php get_footer(); ?>
</body>
</html>