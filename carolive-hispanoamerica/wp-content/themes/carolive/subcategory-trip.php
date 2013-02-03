<!DOCTYPE html>
<html lang="fr">
<head profile="http://gmpg.org/xfn/11">
<?php include 'head-commons.php'; ?>
<link rel="stylesheet"
	href="<?php bloginfo('template_directory'); ?>/css/trip.css"
	media="screen" type="text/css" />
<link rel="stylesheet"
	href="<?php bloginfo('template_directory'); ?>/css/sidebar.css"
	media="screen" type="text/css" />
</head>
<body class="no-customize-support">
	<?php wp_customize_support_script(); ?>

	<?php get_header(); ?>

	<div class="bodysite">
		<div class="container main">
			<!-- container : la grille -->

			<div class="span-24 left_column">
				<!-- Début de la boucle pour récupérer l'article de présentation du pays -->
				<?php
					global $wpdb;
					
					$current_cat = single_cat_title("", false);
					$main_post_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_title LIKE '%" . $current_cat . "%'" );
				?>

				<?php query_posts( 'post_type=carolive_country&p='.$main_post_id ); ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<div id="country" class="block">

					<div class="block_title">
						<h2>
							<?php the_title(); ?>
						</h2>
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

			<div class="span-16 left_column">
				<div id="post" class="block">

					<div class="block_title">
						<h2>
							<span>Suivez</span> nous !
						</h2>
					</div>
					<ul>
						<?php
						global $wp_query;

						// $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						// $args = array( 'post_type' => 'post', 'posts_per_page' => 3, 'paged' => $paged );
						// $wp_query = new WP_Query($args);
						while ( have_posts() ) : the_post(); ?>
						<li>
							<div class="block_content">
								<p class="news_country">
									<?php the_title(); ?>
								</p>
								<?php the_post_thumbnail('trip-thumbnail'); ?>
								<div class="extract">
									<?php the_excerpt(); ?>
									<a class="news_link" href="<?php the_permalink(); ?>">Lire la
										suite</a>
								</div>
							</div>
						</li>
						<!-- Fin de la boucle-->
						<?php endwhile; ?>
					</ul>
					<!-- pagination links -->
					<div class="pagination">
						<?php posts_nav_link(' &bull; ','&laquo; Articles précédents','Articles suivants &raquo;'); ?>
					</div>
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
