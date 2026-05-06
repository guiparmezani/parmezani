<?php
/**
 * Theme functions.
 *
 * @package Parmezani
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_theme_file_path( 'inc/acf.php' );
require_once get_theme_file_path( 'inc/content.php' );
require_once get_theme_file_path( 'inc/project-data.php' );

function parmezani_setup(): void {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/main.css' );
}
add_action( 'after_setup_theme', 'parmezani_setup' );

function parmezani_asset_version( string $relative_path ): string {
	$file = get_theme_file_path( $relative_path );

	if ( file_exists( $file ) ) {
		return (string) filemtime( $file );
	}

	return wp_get_theme()->get( 'Version' );
}

function parmezani_enqueue_assets(): void {
	wp_enqueue_style(
		'parmezani-main',
		get_theme_file_uri( 'assets/css/main.css' ),
		array(),
		parmezani_asset_version( 'assets/css/main.css' )
	);

	wp_enqueue_script(
		'parmezani-main',
		get_theme_file_uri( 'assets/js/main.js' ),
		array(),
		parmezani_asset_version( 'assets/js/main.js' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'parmezani_enqueue_assets' );

function parmezani_favicon(): void {
	if ( has_site_icon() ) {
		return;
	}

	$favicon = get_theme_file_uri( 'assets/images/brand/favicon.svg' );
	?>
	<link rel="icon" href="<?php echo esc_url( $favicon ); ?>" type="image/svg+xml">
	<?php
}
add_action( 'wp_head', 'parmezani_favicon', 1 );
add_action( 'admin_head', 'parmezani_favicon', 1 );
add_action( 'login_head', 'parmezani_favicon', 1 );
