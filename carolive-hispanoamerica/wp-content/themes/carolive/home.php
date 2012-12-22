<!DOCTYPE html>
<html lang="fr">
<head profile="http://gmpg.org/xfn/11">
  <?php include 'head-commons.php'; ?>
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/homepage.css" media="screen" type="text/css" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/carolive-news.css" media="screen" type="text/css" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/carouselskin.css" media="screen" type="text/css" />
</head>
<body class="no-customize-support">
<?php wp_customize_support_script(); ?>

<?php get_header(); ?>
  
  <div class="bodysite">
    <div class="container main"> <!-- container : la grille -->
      
      <div class="span-16 left_column">
        <div id="project" class="block">
          <!-- Début de la boucle pour récupérer la présentation du projet -->
          <?php query_posts( 'cat=3&posts_per_page=1' ); ?>
          <?php while ( have_posts() ) : the_post(); ?>
            
            <div class="block_title">
              <h2><span>Présentation</span> du projet</h2>
            </div>
            <div class="block_content">
              <article id="pres_text">
                <?php the_content(); ?>
              </article>
            </div>

          <!-- Stop The Loop (but note the "else:" - see next line). -->
          <?php endwhile; ?>
          <!-- Reset Query -->
          <?php wp_reset_query(); ?>
        </div>
      </div>
      
      <div class="span-8 last right_column">
        <div id="caroliveposts" class="block">
          <div class="block_title">
            <h2><span>Posts</span> de Carolive !</h2>
          </div>
          <div class="block_content">
            <div class="post_content">
              <ul>
                <!-- Début de la boucle pour récupérer la présentation du projet -->
                <?php query_posts( 'cat=4&posts_per_page=4' ); ?>
                <?php while ( have_posts() ) : the_post(); ?>

                  <li class="post_user">
                    <div class="post_picture">
                      <?php echo get_avatar( get_the_author_meta('ID'), 54 ); ?>
                    </div>
                    <p class="post_date">Le <?php echo get_the_date(); ?> à <?php the_time(); ?> par <?php the_author(); ?></p>
                    <p class="post_text"><?php the_content(); ?></p>
                  </li>
      
                <!-- Stop The Loop (but note the "else:" - see next line). -->
                <?php endwhile; ?>
                <!-- Reset Query -->
                <?php wp_reset_query(); ?>
              </ul>
            </div>
          </div>
          <div class="seemore">
            <a href="<?php echo get_category_link( 4 ); ?>">Lire tous les posts</a>
          </div>
        </div>
      </div>
    
    </div>
  </div>    
  
  <?php get_footer(); ?>
</body>
</html>