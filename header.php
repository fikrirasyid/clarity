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
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<button class="search-toggle toggle-button" data-target-id="search-expand-wrap"><?php _e( 'Search', 'clarity' ); ?></button>
			<button class="menu-toggle toggle-button" data-target-id="site-navigation"><?php _e( 'Menu', 'clarity' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>			
		</div>
	</nav><!-- #site-navigation -->	

	<div id="search-expand-wrap">
		<form role="search" method="get" id="header-search" class="searchform" action="<?php echo home_url('/'); ?>">
			<label class="screen-reader-text" for="s">Search for:</label>
			<input type="text" value="" name="s" id="s" placeholder="<?php _e( 'Type keyword and press enter...', 'clarity' ); ?>">
			<input type="submit" id="searchsubmit" value="<?php _e( 'Search', 'clarity' ); ?>">					
			<button class="toggle-button close-search-toggle" data-target-id="search-expand-wrap"><?php _e( 'Cancel', 'clarity' ); ?></button>
		</form>	
		<div class="search-modal toggle-button" data-target-id="search-expand-wrap"></div>
	</div>	

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding wrap">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<div class="site-content-wrap">