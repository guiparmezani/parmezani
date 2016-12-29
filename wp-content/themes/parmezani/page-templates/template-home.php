<?php
/**
 * Template Name: Home Page Template
 *
 */

get_header();

?>

<?php while ( have_posts() ) : the_post(); ?>
	<?php 
		if (has_post_thumbnail()) {
			$home_background = get_the_post_thumbnail_url();
		}
	?>
	<div class="page-wrapper" style="background-image: linear-gradient(to right, rgba(0,0,0,0.85), rgba(0,0,0,0.55)), url(<?php echo $home_background; ?>);">

		<div class="container" >

			<div class="row">

				<div class="col-md-12 content-area" >

					<main class="site-main"  role="main">

						<div class="screen-center hidden"></div>

						<div class="hero-content-wrapper">
							<div class="hero-text-wrapper">
								<div class="hero-title">
									<h1><?php the_field('hero_title'); ?></h1>
								</div>
								<hr>
								<div class="hero-text">
									<p><?php the_field('hero_text'); ?></p>
								</div>
							</div>	
						</div>

					</main><!-- #main -->

				</div><!-- #primary -->

			</div><!-- .row end -->

		</div><!-- Container end -->

	</div><!-- Wrapper end -->
<?php endwhile; ?>

<?php get_footer(); ?>
