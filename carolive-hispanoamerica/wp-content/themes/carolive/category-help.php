<!DOCTYPE html>
<html lang="fr">
<head profile="http://gmpg.org/xfn/11">
  <?php include 'head-commons.php'; ?>
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/trip.css" media="screen" type="text/css" />
</head>
<body class="no-customize-support">
<?php wp_customize_support_script(); ?>

<?php get_header(); ?>
  
  <div class="bodysite">
    <div class="container main"> <!-- container : la grille -->
      
      <div class="span-24 last left_column">
                
        <!-- Début de la boucle pour récupérer l'article sur le s encouragements -->
        <?php while ( have_posts() ) : the_post(); ?>
            
          <div id="encouragment" class="block">
            <div class="block_title">
              <h2><span>Un petit mot</span> de votre part</h2>
            </div>
            <div class="block_content">
              <?php the_content(); ?>
              <?php
              global $withcomments;
              $withcomments = true;
              ?>
              <?php comments_template(); ?>
              <?php $withcomments = false; ?>
            </div>
          </div>
        <!-- Fin de la boucle-->
        <?php endwhile; ?>
        
      </div>
    
    </div>
  </div>    
  
  <?php get_footer(); ?>
</body>
</html>