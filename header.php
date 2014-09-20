<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Clarity
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'clarity' ); ?></a>

	<nav id="site-navigation" class="main-navigation" role="navigation">
		<div class="wrap">
			<button class="menu-toggle" data-target-id="site-navigation"><?php _e( 'Menu', 'clarity' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>			
		</div>
	</nav><!-- #site-navigation -->	

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding wrap">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<div class="site-content-wrap">