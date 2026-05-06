<?php
/**
 * Hero section.
 *
 * @package Parmezani
 */

$defaults         = parmezani_home_defaults();
$hero             = parmezani_group_field( 'home_hero', $defaults['hero'] );
$card_one_image   = parmezani_image_data( $hero['card_one_image'] ?? '', $defaults['hero']['card_one_image'] );
$card_two_image   = parmezani_image_data( $hero['card_two_image'] ?? '', $defaults['hero']['card_two_image'] );
$card_three_image = parmezani_image_data( $hero['card_three_image'] ?? '', $defaults['hero']['card_three_image'] );
?>
<section class="hero section-pad" aria-labelledby="hero-title">
	<div class="hero__copy" data-reveal>
		<h1 id="hero-title">
			<?php echo esc_html( parmezani_text_value( $hero['heading'] ?? '', $defaults['hero']['heading'] ) ); ?>
			<em><?php echo esc_html( parmezani_text_value( $hero['heading_emphasis'] ?? '', $defaults['hero']['heading_emphasis'] ) ); ?></em>
		</h1>
		<p class="hero__intro">
			<?php echo esc_html( parmezani_text_value( $hero['intro'] ?? '', $defaults['hero']['intro'] ) ); ?>
		</p>
		<div class="hero__actions">
			<a class="button button--primary" href="<?php echo esc_url( parmezani_text_value( $hero['primary_button_url'] ?? '', $defaults['hero']['primary_button_url'] ) ); ?>"><?php echo esc_html( parmezani_text_value( $hero['primary_button_label'] ?? '', $defaults['hero']['primary_button_label'] ) ); ?></a>
			<a class="button button--ghost" href="<?php echo esc_url( parmezani_text_value( $hero['secondary_button_url'] ?? '', $defaults['hero']['secondary_button_url'] ) ); ?>"><?php echo esc_html( parmezani_text_value( $hero['secondary_button_label'] ?? '', $defaults['hero']['secondary_button_label'] ) ); ?></a>
		</div>
	</div>

	<div class="hero__stage" aria-hidden="true" data-reveal>
		<figure class="hero-card hero-card--one">
			<img src="<?php echo esc_url( $card_one_image['src'] ); ?>" alt="">
		</figure>
		<figure class="hero-card hero-card--two">
			<img src="<?php echo esc_url( $card_two_image['src'] ); ?>" alt="">
		</figure>
		<figure class="hero-card hero-card--three">
			<img src="<?php echo esc_url( $card_three_image['src'] ); ?>" alt="">
		</figure>
		<div class="hero__stamp">
			<span><?php echo esc_html( parmezani_text_value( $hero['stamp_number'] ?? '', $defaults['hero']['stamp_number'] ) ); ?></span>
			<small><?php echo esc_html( parmezani_text_value( $hero['stamp_label'] ?? '', $defaults['hero']['stamp_label'] ) ); ?></small>
		</div>
	</div>
</section>
