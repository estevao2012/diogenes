<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package diogenes
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">

		<header class="border-wrapper"> 
			<div class="background-menu-cont">
				<span class="border-out-graph-left"></span>
				<span class="border-background"></span>
			</div>
			<div class="content-header">
				<div class="search"></div>
				<nav class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary-left' ) ); ?>
				</nav><!-- #site-navigation -->
				<div class="logo"><?php echo get_img('logo.png','') ?></div>

				<nav class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary-right' ) ); ?>
				</nav><!-- #site-navigation -->
			</div>
			<div class="background-menu-cont">
				<span class="border-out-graph-right"></span>
				<span class="border-background"></span>
			</div>
		</header><!-- #masthead -->

		<main id="content" class="site-content">
