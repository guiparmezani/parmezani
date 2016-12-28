<?php
/**
 * Template Name: Home Page Template
 *
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
	<div class="page-wrapper">

		<div class="container" >

			<div class="row">

				<div class="col-md-12 content-area" >

					<main class="site-main"  role="main">

						<p>macaco</p>

					</main><!-- #main -->

				</div><!-- #primary -->

			</div><!-- .row end -->

		</div><!-- Container end -->

	</div><!-- Wrapper end -->
<?php endwhile; ?>

<?php get_footer(); ?>
