<?php
/**
 * Capabilities section.
 *
 * @package Parmezani
 */

$defaults     = parmezani_home_defaults();
$capabilities = parmezani_group_field( 'home_capabilities', $defaults['capabilities'] );
$capability_details = array(
	'design-to-code implementation'       => array(
		'tag'         => 'Interface',
		'description' => 'Faithful translation of ambitious creative direction into responsive, production-ready UI.',
	),
	'theme development'                   => array(
		'tag'         => 'WordPress',
		'description' => 'Custom templates, structured components, and durable front-end systems for brand sites.',
	),
	'wordpress theme development'         => array(
		'tag'         => 'WordPress',
		'description' => 'Custom templates, structured components, and durable front-end systems for brand sites.',
	),
	'acf content architecture'            => array(
		'tag'         => 'CMS',
		'description' => 'Flexible editing models that keep polished pages manageable after launch.',
	),
	'ai-assisted development workflow'    => array(
		'tag'         => 'Velocity',
		'description' => 'Modern coding tools used with senior review to speed builds and sharpen execution.',
	),
	'gsap motion systems'                 => array(
		'tag'         => 'Motion',
		'description' => 'Purposeful reveal, scroll, and interaction details that make pages feel premium.',
	),
	'gsap motion'                         => array(
		'tag'         => 'Motion',
		'description' => 'Purposeful reveal, scroll, and interaction details that make pages feel premium.',
	),
	'performance and maintainability'     => array(
		'tag'         => 'QA',
		'description' => 'Responsive testing, tuning passes, and handoff details built for real content teams.',
	),
	'performance tuning'                  => array(
		'tag'         => 'QA',
		'description' => 'Responsive testing, tuning passes, and handoff details built for real content teams.',
	),
	'cms handoff and maintainability'     => array(
		'tag'         => 'QA',
		'description' => 'Responsive testing, tuning passes, and handoff details built for real content teams.',
	),
);
?>
<section class="capabilities section-pad" aria-labelledby="capabilities-title">
	<div class="section-head" data-reveal>
		<p class="section-kicker"><?php echo esc_html( parmezani_text_value( $capabilities['kicker'] ?? '', $defaults['capabilities']['kicker'] ) ); ?></p>
		<h2 id="capabilities-title"><?php echo esc_html( parmezani_text_value( $capabilities['heading'] ?? '', $defaults['capabilities']['heading'] ) ); ?></h2>
	</div>
	<div class="capability-list" data-reveal>
		<?php foreach ( parmezani_rows_value( $capabilities['items'] ?? array(), $defaults['capabilities']['items'] ) as $index => $item ) : ?>
			<?php
			$title       = parmezani_text_value( $item['text'] ?? '' );
			$details_key = strtolower( $title );
			$details     = $capability_details[ $details_key ] ?? array(
				'tag'         => __( 'Capability', 'parmezani' ),
				'description' => '',
			);
			$description = parmezani_text_value( $item['description'] ?? '', $details['description'] );
			?>
			<article class="capability-card">
				<div class="capability-card__top">
					<span class="capability-card__index"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
					<span class="capability-card__tag"><?php echo esc_html( $details['tag'] ); ?></span>
				</div>
				<h3><?php echo esc_html( $title ); ?></h3>
				<?php if ( '' !== $description ) : ?>
					<p><?php echo esc_html( $description ); ?></p>
				<?php endif; ?>
			</article>
		<?php endforeach; ?>
	</div>
</section>
