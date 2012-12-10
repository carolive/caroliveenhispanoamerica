<!DOCTYPE html>
<html lang="fr">
<head profile="http://gmpg.org/xfn/11">
 
	<title>Carolive en HispanoAmerica<?php if ( is_404() ) : ?> &raquo; <?php _e('Not Found') ?><?php endif ?></title>
 
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
	
  <!-- leave this for stats -->
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
  <link rel="stylesheet" href="css/template.css" media="all" type="text/css" />
  <link rel="stylesheet" href="css/homepage.css" media="all" type="text/css" />
  <link rel="stylesheet" href="css/carouselskin.css" media="all" type="text/css" />
  <link rel="stylesheet" href="css/grid.css" media="all" type="text/css" /> <!-- CSS qui gere la grille pour placer les elements -->
  
  <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
  <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
  <script type="text/javascript" src="js/header.js"></script>
	
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" /><?php wp_head(); ?>
 
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
 
</head>
<body>
  <?php get_header(); ?>
  <?php get_footer(); ?>
</body>
</html>