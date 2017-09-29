<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_html( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info">
						<!-- content goes here -->
						<div class="page-heading">
							<div class="avatar">
								<img src="<?php echo bloginfo('template_url') . '/img/avatar.jpg'; ?>">
							</div>
							<h2>
								<span class="main">G</span><span class="secondary">UILHERME </span><span class="main">P</span><span class="secondary">ARME</span><span class="main">Z</span><span class="secondary">A</span><span class="main">N</span><span class="secondary">I</span>
							</h2>
						</div>
						<div class="contact-methods-wrapper">
							<div class="row">
								<div class="col-sm-6">
									<i class="fa fa-envelope" aria-hidden="true"></i>
									<p>
										<a href="mailto:contact@parmezani.com">contact@parmezani.com</a>
									</p>
								</div>
								<div class="col-sm-6">
									<i class="fa fa-skype" aria-hidden="true"></i>
									<p>
										<a href="skype:g.parmezani@gmail.com?call">g.parmezani@gmail.com</a>
									</p>
								</div>
							</div>
						</div>
					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
