<?php

	/*
		
	This is the template for the header

	@package purnatur

	*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset '); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>" >
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if(is_singular() && pings_open(get_queried_object())): ?>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php endif; ?>
	<title><?php bloginfo('name')." ".wp_title(); ?></title>
	<?php wp_head();  ?>
</head>

<body <?php body_class(); ?>>

	<header class="master-header">

		<div class="nav-container">
			
			<nav class="navbar navbar-expand-lg navbar-light">

			  <div class="collapse navbar-collapse justify-content-end px-lg-3 topNavbar">
			  	<?php
				wp_nav_menu( array(
					'theme_location'	=> 'primary-left',
					'container' 		=> false,
					'menu_class' 		=> 'navbar-nav',
					'walker'     		=> new wp_bootstrap_navwalker()
				)) 
				?>
			   
			  </div>


			  <a class="navbar-brand" href="#">
			  	<img src="<?php echo get_template_directory_uri().'/img/logo_purnatur.svg'; ?>" alt="">
			  </a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".topNavbar" aria-controls="topNavbar" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse topNavbar">
			  	<?php
				wp_nav_menu( array(
					'theme_location'	=> 'primary-right',
					'container' 		=> false,
					'menu_class' 		=> 'navbar-nav',
					'walker'     		=> new wp_bootstrap_navwalker()
				)) 
				?>
			   
			  </div>
			</nav>

		</div><!-- .nav-container -->
