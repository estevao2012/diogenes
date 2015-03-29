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
  <link href='<?php echo get_template_directory_uri() . '/fonts/stylesheet.css' ?>' rel='stylesheet' type='text/css'>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">

		<header class="full-width "> 
			<div class="background-full-width"></div>
			<div class="content-header full-width">
				<nav class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary-left' ) ); ?>
				</nav><!-- #site-navigation -->
				<div class="logo"><?php echo get_img('logo.png','') ?></div>

				<nav class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary-right' ) ); ?>
				</nav><!-- #site-navigation -->
			</div>

		</header><!-- #masthead -->

		<main id="content" class="site-content">
