<?php
/**
 * Static project data for the first theme pass.
 *
 * @package Parmezani
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function parmezani_project_defaults(): array {
	return array(
		array(
			'number'            => '01',
			'title'             => 'Hotel Albatross 1881',
			'url'               => 'https://hotelalbatross1881.com/',
			'image'             => 'assets/images/projects/screenshots/albatross-screenshot.jpg',
			'alt'               => 'Hotel Albatross 1881 website screenshot',
			'summary'           => 'Developed a refined WordPress experience for a historic coastal hotel, translating an editorial design system into responsive templates and smooth content flows.',
			'meta'              => 'Hospitality / WordPress',
			'creative_director' => 'Rob Bode',
			'studio'            => 'Bode Digital',
			'layout'            => 'default',
		),
		array(
			'number'            => '02',
			'title'             => 'Camel Club',
			'url'               => 'https://camel.club/',
			'image'             => 'assets/images/projects/screenshots/camel-club-screenshot.jpg',
			'alt'               => 'Camel Club website screenshot',
			'summary'           => 'Built a layered private-club site with rich storytelling, flexible content sections, and clear paths for membership interest.',
			'meta'              => 'Membership / Lifestyle',
			'creative_director' => 'Rob Bode',
			'studio'            => 'Bode Digital',
			'layout'            => 'wide',
		),
		array(
			'number'            => '03',
			'title'             => 'The Manchester',
			'url'               => 'https://themanchesterky.com/',
			'image'             => 'assets/images/projects/screenshots/manchester-screenshot.jpg',
			'alt'               => 'The Manchester website screenshot',
			'summary'           => 'Developed a polished hotel and dining ecosystem with distinct content areas for rooms, restaurants, events, and brand storytelling.',
			'meta'              => 'Hotel / Dining / Events',
			'creative_director' => 'Rob Bode',
			'studio'            => 'Bode Digital',
			'layout'            => 'default',
		),
		array(
			'number'            => '04',
			'title'             => 'Revelator',
			'url'               => 'https://revelator.tv/',
			'image'             => 'assets/images/projects/screenshots/newrevelator-screenshot.jpg',
			'alt'               => 'Revelator website screenshot',
			'summary'           => 'Built a fast-scanning production portfolio designed to put directors, reels, and visual work at the center.',
			'meta'              => 'Film / Portfolio',
			'creative_director' => 'Rob Bode',
			'studio'            => 'Bode Digital',
			'layout'            => 'default',
		),
		array(
			'number'            => '05',
			'title'             => 'Troubadour',
			'url'               => 'https://livetroubadour.com/',
			'image'             => 'assets/images/projects/screenshots/troubadour-screenshot.jpg',
			'alt'               => 'Troubadour website screenshot',
			'summary'           => 'Developed a destination site balancing residential leasing, hospitality, programming, and conversion-focused user paths.',
			'meta'              => 'Venue / Residential / Culture',
			'creative_director' => 'Rob Bode',
			'studio'            => 'Bode Digital',
			'layout'            => 'wide',
		),
		array(
			'number'            => '06',
			'title'             => 'SOAP Laundry Lounge',
			'url'               => 'https://soaplaundrylounge.com/',
			'image'             => 'assets/images/projects/screenshots/soap-screenshot.jpg',
			'alt'               => 'SOAP Laundry Lounge website screenshot',
			'summary'           => 'Built a brand-forward service site that makes a local utility business feel polished, clear, and approachable.',
			'meta'              => 'Service / Brand Site',
			'creative_director' => 'Rob Bode',
			'studio'            => 'Bode Digital',
			'layout'            => 'default',
		),
		array(
			'number'            => '07',
			'title'             => 'Rambler Tempe',
			'url'               => 'https://ramblertempe.com/',
			'image'             => 'assets/images/projects/screenshots/lv-tempe-screenshot.jpg',
			'alt'               => 'Rambler Tempe website screenshot',
			'summary'           => 'Developed a high-energy student housing site with fast access to floor plans, amenities, location details, and leasing actions.',
			'meta'              => 'Residential / Leasing',
			'creative_director' => 'Rob Bode',
			'studio'            => 'Bode Digital',
			'layout'            => 'default',
		),
	);
}

function parmezani_project_modifier( string $layout ): string {
	return match ( $layout ) {
		'wide'    => ' project--wide',
		'contain' => ' project--contain',
		default   => '',
	};
}

function parmezani_projects(): array {
	$defaults = parmezani_project_defaults();
	$projects = parmezani_home_field( 'home_projects', $defaults );

	if ( ! is_array( $projects ) || array() === $projects ) {
		$projects = $defaults;
	}

	return array_values(
		array_map(
			static function ( array $project, int $index ) use ( $defaults ): array {
				$fallback = $defaults[ $index ] ?? array(
					'number'            => '',
					'title'             => '',
					'url'               => '',
					'image'             => '',
					'alt'               => '',
					'summary'           => '',
					'meta'              => '',
					'creative_director' => '',
					'studio'            => '',
					'layout'            => 'default',
				);
				foreach ( $project as $key => $value ) {
					if ( ! parmezani_is_empty_acf_value( $value ) ) {
						$fallback[ $key ] = $value;
					}
				}

				$project  = $fallback;
				$layout   = parmezani_text_value( $project['layout'] ?? '', $fallback['layout'] ?? 'default' );

				$project['modifier'] = parmezani_project_modifier( $layout );

				return $project;
			},
			$projects,
			array_keys( $projects )
		)
	);
}
