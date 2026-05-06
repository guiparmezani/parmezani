<?php
/**
 * About section.
 *
 * @package Parmezani
 */

$defaults = parmezani_home_defaults();
$about    = parmezani_group_field( 'home_about', $defaults['about'] );
?>
<section class="about section-pad" id="about" aria-labelledby="about-title">
	<div class="about__statement" data-reveal>
		<p class="section-kicker"><?php echo esc_html( parmezani_text_value( $about['kicker'] ?? '', $defaults['about']['kicker'] ) ); ?></p>
		<h2 id="about-title">
			<?php echo esc_html( parmezani_text_value( $about['heading'] ?? '', $defaults['about']['heading'] ) ); ?>
		</h2>
	</div>
	<div class="about__grid">
		<div class="about__copy" data-reveal>
			<?php foreach ( parmezani_rows_value( $about['paragraphs'] ?? array(), $defaults['about']['paragraphs'] ) as $paragraph ) : ?>
				<p><?php echo esc_html( parmezani_text_value( $paragraph['text'] ?? '' ) ); ?></p>
			<?php endforeach; ?>
		</div>
		<div class="proof-stack" data-reveal>
			<?php foreach ( parmezani_rows_value( $about['stats'] ?? array(), $defaults['about']['stats'] ) as $stat ) : ?>
				<div>
					<span><?php echo esc_html( parmezani_text_value( $stat['value'] ?? '' ) ); ?></span>
					<p><?php echo esc_html( parmezani_text_value( $stat['label'] ?? '' ) ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
