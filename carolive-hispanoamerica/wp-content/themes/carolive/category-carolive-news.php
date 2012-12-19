<!DOCTYPE html>
<html lang="fr">
<head profile="http://gmpg.org/xfn/11">
  <?php include 'head-commons.php'; ?>
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/carolive-news.css" media="screen" type="text/css" />
</head>
<body class="no-customize-support">
<?php wp_customize_support_script(); ?>

<?php get_header(); ?>
  
  <div class="bodysite">
    <div class="container main"> <!-- container : la grille -->
      
      <div class="span-24 last left_column">
        <div id="caroliveposts" class="block">
          <div class="block_title">
            <h2><span>Posts</span> de Carolive !</h2>
          </div>
          <div class="block_content">
            <div class="post_content">
              <ul>
                <!-- Début de la boucle pour récupérer la présentation du projet -->
                <?php while ( have_posts() ) : the_post(); ?>

                  <li class="post_user">
                    <div class="post_picture">
                      <?php echo get_avatar( get_the_author_meta('ID'), 54 ); ?>
                    </div>
                    <p class="post_date">Le <?php echo get_the_date(); ?> à <?php the_time(); ?></p>
                    <p class="post_text"><?php the_content(); ?></p>
                    <p class="post_author"><?php the_author(); ?></p>
                  </li>
      
                <!-- Stop The Loop (but note the "else:" - see next line). -->
                <?php endwhile; ?>
              </ul>
            </div>
          </div>
        <div class="pagination">
          <?php posts_nav_link(' &bull; ','&laquo; Articles précédents','Articles suivants &raquo;'); ?>
        </div>
        </div>
      </div>
    
    </div>
  </div>    
  
  <?php get_footer(); ?>
</body>
</html>