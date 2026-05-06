<?php
/**
 * Homepage content defaults and helpers.
 *
 * @package Parmezani
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function parmezani_home_defaults(): array {
	return array(
		'hero'              => array(
			'heading'                => 'Digital work for places people',
			'heading_emphasis'       => 'remember.',
			'intro'                  => 'A mobile-first portfolio for hospitality, residential, entertainment, and lifestyle websites built with WordPress, animation, and sharp front-end execution.',
			'primary_button_label'   => 'View projects',
			'primary_button_url'     => '#work',
			'secondary_button_label' => 'Start a conversation',
			'secondary_button_url'   => 'mailto:gui@bodedigital.com',
			'card_one_image'         => 'assets/images/projects/screenshots/camel-club-screenshot.jpg',
			'card_two_image'         => 'assets/images/projects/screenshots/manchester-screenshot.jpg',
			'card_three_image'       => 'assets/images/projects/screenshots/soap-screenshot.jpg',
			'stamp_number'           => '07',
			'stamp_label'            => 'sites',
		),
		'marquee_items'     => array(
			array( 'text' => 'Hospitality' ),
			array( 'text' => 'Membership' ),
			array( 'text' => 'Entertainment' ),
			array( 'text' => 'Residential' ),
			array( 'text' => 'Brand Systems' ),
			array( 'text' => 'WordPress' ),
		),
		'about'             => array(
			'kicker'     => 'Point Of View',
			'heading'    => 'Websites with atmosphere, structure, and enough restraint to let the work breathe.',
			'paragraphs' => array(
				array( 'text' => 'The portfolio should feel made by a builder who understands front-end craft, brand systems, and the operational realities of WordPress. The direction is visual and tactile, but the page still behaves like a practical sales tool.' ),
				array( 'text' => 'Instead of a generic agency grid, the work is framed as a run of destinations: places to stay, gather, watch, wash, lease, and remember.' ),
			),
			'stats'      => array(
				array(
					'value' => '10+',
					'label' => 'years shaping web systems',
				),
				array(
					'value' => '07',
					'label' => 'featured projects in this first pass',
				),
				array(
					'value' => 'WP',
					'label' => 'designed to translate into template parts',
				),
			),
		),
		'capabilities'      => array(
			'kicker'  => 'Capabilities',
			'heading' => 'A compact build system for polished marketing sites.',
			'items'   => array(
				array( 'text' => 'Design systems' ),
				array( 'text' => 'WordPress themes' ),
				array( 'text' => 'GSAP motion' ),
				array( 'text' => 'Responsive UI' ),
				array( 'text' => 'ACF architecture' ),
				array( 'text' => 'Performance passes' ),
			),
		),
		'contact'           => array(
			'image'     => 'assets/images/projects/screenshots/albatross-screenshot.jpg',
			'image_alt' => 'Hotel Albatross 1881 website screenshot',
			'kicker'    => 'Contact',
			'heading'   => 'Ready for the next build.',
			'links'     => array(
				array(
					'label'   => 'gui@bodedigital.com',
					'url'     => 'mailto:gui@bodedigital.com',
					'new_tab' => false,
				),
				array(
					'label'   => 'github.com/guiparmezani',
					'url'     => 'https://github.com/guiparmezani',
					'new_tab' => true,
				),
				array(
					'label'   => 'LinkedIn',
					'url'     => 'https://www.linkedin.com/',
					'new_tab' => true,
				),
			),
		),
		'footer'            => array(
			'left_text'  => 'Guilherme Parmezani',
			'right_text' => 'Portfolio / 2026',
		),
	);
}

function parmezani_is_empty_acf_value( mixed $value ): bool {
	return null === $value || false === $value || '' === $value || array() === $value;
}

function parmezani_home_field( string $field_name, mixed $fallback = null, ?int $post_id = null ): mixed {
	if ( function_exists( 'get_field' ) ) {
		$value = get_field( $field_name, $post_id ?: get_queried_object_id() );

		if ( ! parmezani_is_empty_acf_value( $value ) ) {
			return $value;
		}
	}

	return $fallback;
}

function parmezani_group_field( string $field_name, array $fallback = array() ): array {
	$value = parmezani_home_field( $field_name, $fallback );

	if ( ! is_array( $value ) ) {
		return $fallback;
	}

	$group = $fallback;

	foreach ( $value as $key => $field_value ) {
		if ( ! parmezani_is_empty_acf_value( $field_value ) ) {
			$group[ $key ] = $field_value;
		}
	}

	return $group;
}

function parmezani_text_value( mixed $value, string $fallback = '' ): string {
	return is_scalar( $value ) && '' !== trim( (string) $value ) ? (string) $value : $fallback;
}

function parmezani_rows_value( mixed $value, array $fallback = array() ): array {
	return is_array( $value ) && array() !== $value ? $value : $fallback;
}

function parmezani_image_data( mixed $image, string $fallback_path = '', string $fallback_alt = '' ): array {
	$src = $fallback_path ? get_theme_file_uri( $fallback_path ) : '';
	$alt = $fallback_alt;

	if ( is_array( $image ) ) {
		$src = ! empty( $image['url'] ) ? $image['url'] : $src;
		$alt = ! empty( $image['alt'] ) ? $image['alt'] : $alt;
	} elseif ( is_numeric( $image ) ) {
		$attachment_src = wp_get_attachment_image_url( (int) $image, 'full' );
		$attachment_alt = get_post_meta( (int) $image, '_wp_attachment_image_alt', true );
		$src            = $attachment_src ?: $src;
		$alt            = $attachment_alt ?: $alt;
	} elseif ( is_string( $image ) && '' !== $image ) {
		$src = str_starts_with( $image, 'http' ) ? $image : get_theme_file_uri( $image );
	}

	return array(
		'src' => $src,
		'alt' => $alt,
	);
}
