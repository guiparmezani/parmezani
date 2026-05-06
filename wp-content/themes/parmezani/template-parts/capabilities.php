<?php
/**
 * Capabilities section.
 *
 * @package Parmezani
 */

$defaults     = parmezani_home_defaults();
$capabilities = parmezani_group_field( 'home_capabilities', $defaults['capabilities'] );
?>
<section class="capabilities section-pad" aria-labelledby="capabilities-title">
	<div class="section-head" data-reveal>
		<p class="section-kicker"><?php echo esc_html( parmezani_text_value( $capabilities['kicker'] ?? '', $defaults['capabilities']['kicker'] ) ); ?></p>
		<h2 id="capabilities-title"><?php echo esc_html( parmezani_text_value( $capabilities['heading'] ?? '', $defaults['capabilities']['heading'] ) ); ?></h2>
	</div>
	<div class="capability-list" data-reveal>
		<?php foreach ( parmezani_rows_value( $capabilities['items'] ?? array(), $defaults['capabilities']['items'] ) as $item ) : ?>
			<p><?php echo esc_html( parmezani_text_value( $item['text'] ?? '' ) ); ?></p>
		<?php endforeach; ?>
	</div>
</section>
