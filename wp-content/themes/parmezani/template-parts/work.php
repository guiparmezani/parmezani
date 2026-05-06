<?php
/**
 * Work section.
 *
 * @package Parmezani
 */

$projects = parmezani_projects();
?>
<section class="work section-pad" id="work" aria-labelledby="work-title">
	<div class="section-head" data-reveal>
		<p class="section-kicker"><?php esc_html_e( 'Selected Work', 'parmezani' ); ?></p>
		<h2 id="work-title"><?php esc_html_e( 'Seven projects, one portfolio rhythm.', 'parmezani' ); ?></h2>
	</div>

	<div class="project-list">
		<?php foreach ( $projects as $project ) : ?>
			<article class="project<?php echo esc_attr( $project['modifier'] ); ?>" data-reveal>
				<a href="<?php echo esc_url( $project['url'] ); ?>" target="_blank" rel="noreferrer">
					<div class="project__media">
						<div class="project__media-inner">
							<img src="<?php echo esc_url( get_theme_file_uri( $project['image'] ) ); ?>" alt="<?php echo esc_attr( $project['alt'] ); ?>">
						</div>
					</div>
					<div class="project__body">
						<p class="project__number"><?php echo esc_html( $project['number'] ); ?></p>
						<h3><?php echo esc_html( $project['title'] ); ?></h3>
						<p><?php echo esc_html( $project['summary'] ); ?></p>
						<span class="project__meta"><?php echo esc_html( $project['meta'] ); ?></span>
						<dl class="project__credits" aria-label="<?php echo esc_attr( sprintf( __( '%s credits', 'parmezani' ), $project['title'] ) ); ?>">
							<div>
								<dt><?php esc_html_e( 'Creative Director', 'parmezani' ); ?></dt>
								<dd><?php echo esc_html( $project['creative_director'] ); ?></dd>
							</div>
							<div>
								<dt><?php esc_html_e( 'Studio', 'parmezani' ); ?></dt>
								<dd><?php echo esc_html( $project['studio'] ); ?></dd>
							</div>
						</dl>
					</div>
				</a>
			</article>
		<?php endforeach; ?>
	</div>
</section>
