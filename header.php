<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till #main div
 *
 * @package Odin
 * @since 2.2.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
	<?php wp_head(); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body <?php body_class(); ?>>
<header id="header">
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
		<div class="container">
			<a class="navbar-brand logo" href="<?php echo esc_url(home_url('/')); ?>"
			   title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
				<img class="lazy-load" src="//via.placeholder.com/150x40" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'main-menu',
						'depth' => 2,
						'container' => false,
						'menu_class' => 'navbar-nav mr-auto',
						'fallback_cb' => 'Odin_Bootstrap_Nav_Walker::fallback',
						'walker' => new Odin_Bootstrap_Nav_Walker()
					)
				);
				?>
				<form method="get" class="form-inline my-2 my-lg-0" action="<?php echo esc_url(home_url('/')); ?>"
					  role="search">
					<input class="form-control mr-sm-2" name="s" type="search" placeholder="<?php _e('Search:', 'odin'); ?>"
						   value="<?php echo get_search_query(); ?>" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0"
							type="submit"><?php _e('Search', 'odin'); ?></button>
				</form>
			</div>
		</div>
	</nav>
</header>
<!-- #header -->
<?php if (!is_home() || !is_front_page()): ?>
	<section class="breadcrumb">
		<div class="container">
			<?php get_template_part('core/mestre/breadcrumb'); ?>
		</div>
	</section>
<?php endif; ?>
