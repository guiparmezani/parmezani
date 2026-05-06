<?php
/**
 * ACF integration.
 *
 * @package Parmezani
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function parmezani_acf_json_path(): string {
	return get_stylesheet_directory() . '/acf-json';
}

function parmezani_acf_json_save_path( string $path ): string {
	unset( $path );

	return parmezani_acf_json_path();
}
add_filter( 'acf/settings/save_json', 'parmezani_acf_json_save_path' );

function parmezani_acf_json_load_paths( array $paths ): array {
	$paths[] = parmezani_acf_json_path();

	return array_values( array_unique( $paths ) );
}
add_filter( 'acf/settings/load_json', 'parmezani_acf_json_load_paths' );

function parmezani_default_theme(): string {
	$default_theme = 'system';

	if ( function_exists( 'get_field' ) ) {
		$acf_default_theme = get_field( 'parmezani_default_theme', 'option' );

		if ( is_string( $acf_default_theme ) && '' !== $acf_default_theme ) {
			$default_theme = $acf_default_theme;
		}
	}

	return in_array( $default_theme, array( 'light', 'dark', 'system' ), true ) ? $default_theme : 'system';
}
