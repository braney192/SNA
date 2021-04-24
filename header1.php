<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TheFour
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'thefour-lite' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="navbar">

			<nav >
				<?php
				wp_nav_menu( array(
					'container_class' => 'main-menu',
					'menu_class'      => 'main-menu clearfix',
					'theme_location'  => 'menu-1',
					'items_wrap'      => '<ul>%3$s</ul>',
				) );
				?>
			</nav>
		</div>
		<div class="header-inner container">
			<?php get_template_part( 'template-parts/hero' ); ?>
		</div>
	</header>

	<main class="main container clearfix" id="main" role="main">
