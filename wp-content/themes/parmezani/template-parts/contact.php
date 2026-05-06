<?php
/**
 * Contact section.
 *
 * @package Parmezani
 */

$defaults      = parmezani_home_defaults();
$contact       = parmezani_group_field( 'home_contact', $defaults['contact'] );
$contact_image = parmezani_image_data( $contact['image'] ?? '', $defaults['contact']['image'], parmezani_text_value( $contact['image_alt'] ?? '', $defaults['contact']['image_alt'] ) );
?>
<section class="contact section-pad" id="contact" aria-labelledby="contact-title">
	<div class="contact__media" data-reveal>
		<img src="<?php echo esc_url( $contact_image['src'] ); ?>" alt="<?php echo esc_attr( $contact_image['alt'] ); ?>">
	</div>
	<div class="contact__copy" data-reveal>
		<p class="section-kicker"><?php echo esc_html( parmezani_text_value( $contact['kicker'] ?? '', $defaults['contact']['kicker'] ) ); ?></p>
		<h2 id="contact-title"><?php echo esc_html( parmezani_text_value( $contact['heading'] ?? '', $defaults['contact']['heading'] ) ); ?></h2>
		<?php foreach ( parmezani_rows_value( $contact['links'] ?? array(), $defaults['contact']['links'] ) as $link ) : ?>
			<?php
			$link_url   = parmezani_text_value( $link['url'] ?? '' );
			$link_label = parmezani_text_value( $link['label'] ?? '', $link_url );
			$is_new_tab = ! empty( $link['new_tab'] );
			?>
			<a class="contact-link" href="<?php echo esc_url( $link_url ); ?>"<?php echo $is_new_tab ? ' target="_blank" rel="noreferrer"' : ''; ?>><?php echo esc_html( $link_label ); ?></a>
		<?php endforeach; ?>
	</div>
</section>
