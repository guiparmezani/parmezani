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
			'image'             => 'assets/images/projects/albatross.jpg',
			'alt'               => 'Hotel Albatross 1881 website imagery',
			'summary'           => 'Historic hotel presence with a coastal editorial feel.',
			'meta'              => 'Hospitality / WordPress',
			'creative_director' => 'Rob Bode',
			'studio'            => 'Bode Digital',
			'layout'            => 'default',
		),
		array(
			'number'            => '02',
			'title'             => 'Camel Club',
			'url'               => 'https://camel.club/',
			'image'             => 'assets/images/projects/camel-club-detail.jpg',
			'alt'               => 'Camel Club interior website imagery',
			'summary'           => 'Private-club storytelling for layered rooms, amenities, and membership interest.',
			'meta'              => 'Membership / Lifestyle',
			'creative_director' => 'Rob Bode',
			'studio'            => 'Bode Digital',
			'layout'            => 'wide',
		),
		array(
			'number'            => '03',
			'title'             => 'The Manchester',
			'url'               => 'https://themanchesterky.com/',
			'image'             => 'assets/images/projects/manchester-detail.jpg',
			'alt'               => 'The Manchester website imagery',
			'summary'           => 'Hotel and culinary ecosystem with a refined southern point of view.',
			'meta'              => 'Hotel / Dining / Events',
			'creative_director' => 'Rob Bode',
			'studio'            => 'Bode Digital',
			'layout'            => 'default',
		),
		array(
			'number'            => '04',
			'title'             => 'Revelator',
			'url'               => 'https://revelator.tv/',
			'image'             => 'assets/images/projects/newrevelator.jpg',
			'alt'               => 'Revelator video production website imagery',
			'summary'           => 'Director-led production portfolio with fast visual scanning.',
			'meta'              => 'Film / Portfolio',
			'creative_director' => 'Rob Bode',
			'studio'            => 'Bode Digital',
			'layout'            => 'default',
		),
		array(
			'number'            => '05',
			'title'             => 'Troubadour',
			'url'               => 'https://livetroubadour.com/',
			'image'             => 'assets/images/projects/troubadour.jpg',
			'alt'               => 'Troubadour website imagery',
			'summary'           => 'Live destination site balancing place, programming, and conversion paths.',
			'meta'              => 'Venue / Residential / Culture',
			'creative_director' => 'Rob Bode',
			'studio'            => 'Bode Digital',
			'layout'            => 'wide',
		),
		array(
			'number'            => '06',
			'title'             => 'SOAP Laundry Lounge',
			'url'               => 'https://soaplaundrylounge.com/',
			'image'             => 'assets/images/projects/soap-detail.png',
			'alt'               => 'SOAP Laundry Lounge brand imagery',
			'summary'           => 'Brand-forward utility site for a cleaner, friendlier local service.',
			'meta'              => 'Service / Brand Site',
			'creative_director' => 'Rob Bode',
			'studio'            => 'Bode Digital',
			'layout'            => 'contain',
		),
		array(
			'number'            => '07',
			'title'             => 'Rambler Tempe',
			'url'               => 'https://ramblertempe.com/',
			'image'             => 'assets/images/projects/lv-tempe.jpeg',
			'alt'               => 'Rambler Tempe website imagery',
			'summary'           => 'High-energy student-housing leasing experience with fast information access.',
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
