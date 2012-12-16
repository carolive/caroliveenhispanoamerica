<!DOCTYPE html>
<html lang="fr">

  <?php include 'head-commons.php'; ?>

<body class="no-customize-support">
<?php wp_customize_support_script(); ?>

<?php get_header(); ?>
  
  <div class="bodysite">
    <div class="container main"> <!-- container : la grille -->
      
      <div class="span-24 left_column">
        <div id="working" class="block">
          <div class="block_title">
            <h2><span>En</span> travaux</h2>
          </div>
          <div class="block_content">
            <img src="<?php bloginfo('template_directory'); ?>/images/404/barbecue-tux-chef-de-chantier-1819.png" alt="Tux Chef de chantier" />
          </div>
        </div>
      </div>
    
    </div>
  </div>    
  
  <?php get_footer(); ?>
</body>
</html>