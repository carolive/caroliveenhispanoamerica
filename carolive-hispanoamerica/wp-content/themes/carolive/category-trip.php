<!DOCTYPE html>
<html lang="fr">
<head profile="http://gmpg.org/xfn/11">
  <?php include 'head-commons.php'; ?>
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/trip.css" media="screen" type="text/css" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/sidebar.css" media="screen" type="text/css" />
</head>
<body class="no-customize-support">
<?php wp_customize_support_script(); ?>

<?php get_header(); ?>
  
  <div class="bodysite">
    <div class="container main"> <!-- container : la grille -->
      
      <div class="span-16 left_column">
                
        <!-- Début de la boucle pour récupérer l'article sur le voyage -->
        <?php query_posts( 'post_type=carolive_map' ); ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <div id="trip_map" class="block">
            
            <div class="block_title">
              <h2><span>Suivez</span> nous !</h2>
            </div>
            <div class="block_content">
                <?php the_content(); ?>
            </div>

          </div>
        <!-- Fin de la boucle-->
        <?php endwhile; ?>
        <!-- Reset Query -->
        <?php wp_reset_query(); ?>
        
      </div>
      
      <div class="span-8 last right_column">
        <?php get_sidebar(); ?>
      </div>
    
    </div>
  </div>    
  
  <?php get_footer(); ?>
</body>
</html>