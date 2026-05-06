<?php
/**
 * Hero section.
 *
 * @package Parmezani
 */
?>
<section class="hero section-pad" aria-labelledby="hero-title">
	<div class="hero__copy" data-reveal>
		<h1 id="hero-title">
			<?php esc_html_e( 'Digital work for places people', 'parmezani' ); ?>
			<em><?php esc_html_e( 'remember.', 'parmezani' ); ?></em>
		</h1>
		<p class="hero__intro">
			<?php esc_html_e( 'A mobile-first portfolio for hospitality, residential, entertainment, and lifestyle websites built with WordPress, animation, and sharp front-end execution.', 'parmezani' ); ?>
		</p>
		<div class="hero__actions">
			<a class="button button--primary" href="#work"><?php esc_html_e( 'View projects', 'parmezani' ); ?></a>
			<a class="button button--ghost" href="mailto:gui@bodedigital.com"><?php esc_html_e( 'Start a conversation', 'parmezani' ); ?></a>
		</div>
	</div>

	<div class="hero__stage" aria-hidden="true" data-reveal>
		<figure class="hero-card hero-card--one">
			<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/projects/camel-club.jpg' ) ); ?>" alt="">
		</figure>
		<figure class="hero-card hero-card--two">
			<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/projects/manchester.jpg' ) ); ?>" alt="">
		</figure>
		<figure class="hero-card hero-card--three">
			<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/projects/soap.png' ) ); ?>" alt="">
		</figure>
		<div class="hero__stamp">
			<span><?php esc_html_e( '07', 'parmezani' ); ?></span>
			<small><?php esc_html_e( 'sites', 'parmezani' ); ?></small>
		</div>
	</div>
</section>
