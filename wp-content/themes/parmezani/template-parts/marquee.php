<?php
/**
 * Marquee section.
 *
 * @package Parmezani
 */

$defaults      = parmezani_home_defaults();
$marquee_items = parmezani_rows_value( parmezani_home_field( 'home_marquee_items', $defaults['marquee_items'] ), $defaults['marquee_items'] );
?>
<section class="marquee" aria-label="<?php esc_attr_e( 'Project categories', 'parmezani' ); ?>">
	<div>
		<?php for ( $i = 0; $i < 2; $i++ ) : ?>
			<?php foreach ( $marquee_items as $item ) : ?>
				<span><?php echo esc_html( parmezani_text_value( $item['text'] ?? '' ) ); ?></span>
			<?php endforeach; ?>
		<?php endfor; ?>
	</div>
</section>
