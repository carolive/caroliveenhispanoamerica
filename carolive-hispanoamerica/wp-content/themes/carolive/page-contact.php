<!DOCTYPE html>
<html lang="fr">
<head profile="http://gmpg.org/xfn/11">
  <?php include 'head-commons.php'; ?>
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/contact.css" media="screen" type="text/css" />
</head>
<body class="no-customize-support">
<?php wp_customize_support_script(); ?>

<?php get_header(); ?>
  
  <div class="bodysite">
    <div class="container main"> <!-- container : la grille -->
      
      <div class="span-24 last left_column">
        <div id="contact" class="block">
          <div class="block_title">
            <h2><span>Contactez</span>-nous</h2>
          </div>
          <div class="block_content">
            <?php while ( have_posts() ) : the_post(); ?>

              <?php the_content(); ?>

            <?php endwhile; // end of the loop. ?>
          </div>
        </div>
      </div>
    
    </div>
  </div>    
  
  <?php get_footer(); ?>
</body>
</html>