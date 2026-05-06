<?php
/**
 * Header template.
 *
 * @package Parmezani
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script>
		(function () {
			var stored = window.localStorage.getItem('parmezani-theme');
			var prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
			document.documentElement.dataset.theme = stored || (prefersDark ? 'dark' : 'light');
		})();
	</script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#work"><?php esc_html_e( 'Skip to work', 'parmezani' ); ?></a>
<header class="site-header" data-reveal>
	<a class="brand-mark" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Guilherme Parmezani home', 'parmezani' ); ?>">
		<span><?php esc_html_e( 'GP', 'parmezani' ); ?></span>
	</a>
	<nav class="primary-nav" aria-label="<?php esc_attr_e( 'Primary navigation', 'parmezani' ); ?>">
		<a href="#work"><?php esc_html_e( 'Work', 'parmezani' ); ?></a>
		<a href="#about"><?php esc_html_e( 'About', 'parmezani' ); ?></a>
		<a href="#contact"><?php esc_html_e( 'Contact', 'parmezani' ); ?></a>
	</nav>
	<button class="theme-toggle" type="button" aria-pressed="false">
		<span class="theme-toggle__icon" aria-hidden="true"></span>
		<span class="theme-toggle__text"><?php esc_html_e( 'Dark', 'parmezani' ); ?></span>
	</button>
</header>
<main id="top">
