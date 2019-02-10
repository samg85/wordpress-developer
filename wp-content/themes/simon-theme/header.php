<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/bootstrap/css/bootstrap.min.css">
	<?php wp_head(); ?>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/jquery/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="site-inner">

		<header id="masthead" class="site-header" role="banner">
		<?php
		if(!is_home()){

			wp_nav_menu( array( 
				'menu' => 'primary', 
				'theme_location' => 'primary', 
				'container' => 'nav', 
				'container_class' => 'navbar navbar-expand-lg navbar-bg-dark bg-dark', 
				'container_id' => 'bs-example-navbar-collapse-1', 
				'menu_class' => 'nav navbar-nav', 
				'fallback_cb' => 'wp_bootstrap_navwalker::fallback', 
				'walker' => new wp_bootstrap_navwalker()) ); 
		}
		?>
		</header><!-- .site-header -->

		<div id="content" class="site-content">
