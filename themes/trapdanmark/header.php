<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package TrapDanmark
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
<?php $titan = TitanFramework::getInstance( 'trapdanmark' ); ?>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'trapdanmark' ); ?></a>

	<!-- Navigation -->
	<nav id="site-navigation" class="main-navigation navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header page-scroll">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#trapdanmark-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand page-scroll" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img class="logo" src="<?php echo $titan->getOption( 'site_logo' ); ?>" style="max-width: <?php echo $titan->getOption( 'site_logo_width' ); ?>px;">
				</a>
			</div>

			<?php wp_nav_menu( array( 
				'theme_location'	=> 'primary',
				'container'			=> 'div',
				'container_class'	=> 'collapse navbar-collapse',
				'container_id'		=> 'trapdanmark-navbar-collapse-1',
				'menu_class'		=> 'nav navbar-nav navbar-right',
			) ); ?>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>

	<div id="content" class="site-content">
