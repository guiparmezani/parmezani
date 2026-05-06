<?php
/**
 * Contact section.
 *
 * @package Parmezani
 */
?>
<section class="contact section-pad" id="contact" aria-labelledby="contact-title">
	<div class="contact__media" data-reveal>
		<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/projects/albatross-detail.jpg' ) ); ?>" alt="<?php esc_attr_e( 'Portfolio detail imagery', 'parmezani' ); ?>">
	</div>
	<div class="contact__copy" data-reveal>
		<p class="section-kicker"><?php esc_html_e( 'Contact', 'parmezani' ); ?></p>
		<h2 id="contact-title"><?php esc_html_e( 'Ready for the next build.', 'parmezani' ); ?></h2>
		<a class="contact-link" href="mailto:gui@bodedigital.com">gui@bodedigital.com</a>
		<a class="contact-link" href="https://github.com/guiparmezani" target="_blank" rel="noreferrer">github.com/guiparmezani</a>
		<a class="contact-link" href="https://www.linkedin.com/" target="_blank" rel="noreferrer"><?php esc_html_e( 'LinkedIn', 'parmezani' ); ?></a>
	</div>
</section>
