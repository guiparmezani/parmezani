<?php
/**
 * SEO and social sharing metadata.
 *
 * @package Parmezani
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function parmezani_seo_site_name(): string {
	return 'Guilherme Parmezani';
}

function parmezani_seo_title(): string {
	return 'Guilherme Parmezani | Front-End & WordPress Developer';
}

function parmezani_seo_description(): string {
	return 'Senior front-end and WordPress developer building polished, maintainable marketing sites with AI-assisted workflows for faster delivery and sharper execution.';
}

function parmezani_seo_image_url(): string {
	$image_path = get_theme_file_path( 'assets/images/social/og-image.jpg' );
	$image_url  = get_theme_file_uri( 'assets/images/social/og-image.jpg' );

	if ( file_exists( $image_path ) ) {
		return add_query_arg( 'v', (string) filemtime( $image_path ), $image_url );
	}

	return $image_url;
}

function parmezani_seo_url(): string {
	if ( is_singular() ) {
		$permalink = get_permalink();

		if ( $permalink ) {
			return $permalink;
		}
	}

	return home_url( '/' );
}

function parmezani_filter_document_title( string $title ): string {
	if ( is_front_page() || is_page_template( 'template-home.php' ) ) {
		return parmezani_seo_title();
	}

	return $title;
}
add_filter( 'pre_get_document_title', 'parmezani_filter_document_title', 20 );

function parmezani_social_meta_tags(): void {
	$title       = parmezani_seo_title();
	$description = parmezani_seo_description();
	$url         = parmezani_seo_url();
	$image_url   = parmezani_seo_image_url();
	$image_alt   = 'Lime signature mark over a black-and-white architectural portfolio graphic.';
	$locale      = get_locale() ?: 'en_US';
	?>
	<meta name="description" content="<?php echo esc_attr( $description ); ?>">
	<meta name="theme-color" content="#10110f">
	<meta property="og:locale" content="<?php echo esc_attr( $locale ); ?>">
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="<?php echo esc_attr( parmezani_seo_site_name() ); ?>">
	<meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
	<meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
	<meta property="og:url" content="<?php echo esc_url( $url ); ?>">
	<meta property="og:image" content="<?php echo esc_url( $image_url ); ?>">
	<meta property="og:image:url" content="<?php echo esc_url( $image_url ); ?>">
	<meta property="og:image:secure_url" content="<?php echo esc_url( set_url_scheme( $image_url, 'https' ) ); ?>">
	<meta property="og:image:type" content="image/jpeg">
	<meta property="og:image:width" content="1200">
	<meta property="og:image:height" content="630">
	<meta property="og:image:alt" content="<?php echo esc_attr( $image_alt ); ?>">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="<?php echo esc_attr( $title ); ?>">
	<meta name="twitter:description" content="<?php echo esc_attr( $description ); ?>">
	<meta name="twitter:image" content="<?php echo esc_url( $image_url ); ?>">
	<meta name="twitter:image:alt" content="<?php echo esc_attr( $image_alt ); ?>">
	<?php
}
add_action( 'wp_head', 'parmezani_social_meta_tags', 2 );

function parmezani_filter_robots( array $robots ): array {
	$robots['max-image-preview'] = 'large';

	return $robots;
}
add_filter( 'wp_robots', 'parmezani_filter_robots' );
