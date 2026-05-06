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

