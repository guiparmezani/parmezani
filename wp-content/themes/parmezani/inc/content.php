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
			'heading'                => 'High-end websites for brands with places, stories,',
			'heading_emphasis'       => 'and guests to win over.',
			'intro'                  => 'I\'m Gui Parmezani, a front-end developer building polished WordPress and Next.js sites for hospitality, residential, lifestyle, entertainment, and service brands, with sharp execution, AI-accelerated workflows, faithful design translation, and clean systems behind the scenes.',
			'primary_button_label'   => 'View projects',
			'primary_button_url'     => '#work',
			'secondary_button_label' => 'Let\'s talk',
			'secondary_button_url'   => '#contact',
			'card_one_image'         => 'assets/images/projects/screenshots/camel-club-screenshot.jpg',
			'card_two_image'         => 'assets/images/projects/screenshots/manchester-screenshot.jpg',
			'card_three_image'       => 'assets/images/projects/screenshots/soap-screenshot.jpg',
			'stamp_number'           => '07',
			'stamp_label'            => 'sites',
		),
		'marquee_items'     => array(
			array( 'text' => 'WordPress' ),
			array( 'text' => 'Next.js' ),
			array( 'text' => 'GSAP Motion' ),
			array( 'text' => 'ACF Systems' ),
			array( 'text' => 'AI-Assisted Workflow' ),
			array( 'text' => 'Responsive UI' ),
			array( 'text' => 'Performance' ),
			array( 'text' => 'Design Fidelity' ),
		),
		'about'             => array(
			'kicker'     => 'How I Work',
			'heading'    => 'Design-led websites built with polish, motion, and systems that last beyond launch.',
			'paragraphs' => array(
				array( 'text' => 'I build marketing sites where the design matters: the kind that need to feel polished, move well, and still be easy to manage after launch.' ),
				array( 'text' => 'My strength is translating ambitious creative direction into reliable front-end systems: responsive layouts, WordPress templates, ACF architecture, motion details, and the small execution choices that make a site feel premium instead of merely finished.' ),
				array( 'text' => 'I use modern AI coding tools as part of my development workflow to move faster through implementation, review more options, and catch issues earlier, while keeping the final decisions grounded in senior front-end judgment.' ),
			),
			'stats'      => array(
				array(
					'value' => '10+',
					'label' => 'years building digital products and web systems',
				),
				array(
					'value' => '07',
					'label' => 'selected premium marketing sites',
				),
				array(
					'value' => 'AI + senior craft',
					'label' => 'faster builds with sharper review and stronger execution',
				),
			),
		),
		'capabilities'      => array(
			'kicker'  => 'Capabilities',
			'heading' => 'The front-end craft behind polished marketing sites.',
			'items'   => array(
				array( 'text' => 'Design-to-code implementation' ),
				array( 'text' => 'Theme development' ),
				array( 'text' => 'ACF content architecture' ),
				array( 'text' => 'AI-assisted development workflow' ),
				array( 'text' => 'GSAP motion systems' ),
				array( 'text' => 'Performance and maintainability' ),
			),
		),
		'contact'           => array(
			'image'     => 'assets/images/projects/screenshots/albatross-screenshot.jpg',
			'image_alt' => 'Hotel Albatross 1881 website screenshot',
			'kicker'    => 'Contact',
			'heading'   => 'Need a polished site built right? Let\'s talk about the next launch.',
			'links'     => array(
				array(
					'label'   => 'guilhermepzn@gmail.com',
					'url'     => 'mailto:guilhermepzn@gmail.com',
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
