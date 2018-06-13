<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<meta name="google-site-verification" content="a_h5cdtwkg_MbW3uarkoZxQ7qRa47kgtxwmCWEBg0GU" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="https://fonts.googleapis.com/css?family=Oswald|PT+Sans|PT+Sans+Narrow|Roboto|Roboto+Condensed" rel="stylesheet">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120792589-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-120792589-1');
	</script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<header class="wrapper-fluid wrapper-navbar sticky-header" id="wrapper-navbar">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php _e( 'Skip to content',
		'understrap' ); ?></a>

		<nav class="navbar site-navigation" itemscope="itemscope"
		     itemtype="http://schema.org/SiteNavigationElement">

			<div class="<?php echo esc_html( $container ); ?>" >

				<div class="navbar-header">

					<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
					<button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse"
					        data-target=".exCollapsingNavbar" aria-controls="exCollapsingNavbar" aria-expanded="false"
					        aria-label="Toggle navigation">
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>

					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>
					<a class="navbar-brand anchor-link" rel="home" href="#top"
					   title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
						<?php bloginfo( 'name' ); ?>
					</a>
					
					<?php } else {
						the_custom_logo();
} ?><!-- end custom logo -->

				</div>

				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-toggleable-xs exCollapsingNavbar menu-container',
						'container_id'    => 'exCollapsingNavbar',
						'menu_class'      => 'nav navbar-nav',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'walker'          => new WP_Bootstrap_Navwalker(),
					)
				); ?>

			</div> <!-- .container -->

		</nav><!-- .site-navigation -->

	</header><!-- .wrapper-navbar end -->
