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
	<div class="page-wrapper">
		<main class="site-main"  role="main">

			<div class="screen-center hidden"></div>
			
			<div class="hero-area" style="background-image: linear-gradient(rgba(255,255,255,0.95), rgba(255,255,255,0.95)), url(<?php echo $home_background; ?>);">
				<div class="container">
					<div class="hero-content-wrapper">
						<div class="hero-text-wrapper">
							<div class="hero-title">
								<!-- <h1><?php the_field('hero_title'); ?></h1> -->
								<h1 class="type" data-text="<?php the_field('hero_title'); ?>"><strong id="caption"></strong></h1>
							</div>
						</div>	
					</div>
					<div class="hero-text">
						<p class="text-center"><?php the_field('hero_text'); ?></p>
					</div>
				  <span class="scroll-btn">
						<a href="#huge-navs" class="anchor-link">
							<span class="mouse">
								<span>
								</span>
							</span>
						</a>
					</span>
				</div>

			</div>


			<section class="huge-navs" id="huge-navs">
				<div class="huge-navs-wrapper">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-4" style="background-image: url(<?php the_field('huge_nav_image_1'); ?>);">
								<a href="<?php the_field('huge_nav_url_1') ?>">
									<div class="huge-nav-content">
										<div class="huge-nav-mask">
										</div>
										<h2 class="huge-nav-text"><?php the_field('huge_nav_text_1') ?></h2>
									</div>
								</a>
							</div>

							<div class="col-sm-4" style="background-image: url(<?php the_field('huge_nav_image_2'); ?>);">
								<a href="<?php the_field('huge_nav_url_2') ?>">
									<div class="huge-nav-content">
										<div class="huge-nav-mask">
										</div>
										<h2 class="huge-nav-text"><?php the_field('huge_nav_text_2') ?></h2>
									</div>
								</a>
							</div>

							<div class="col-sm-4" style="background-image: url(<?php the_field('huge_nav_image_3'); ?>);">
								<a href="<?php the_field('huge_nav_url_3') ?>">
									<div class="huge-nav-content">
										<div class="huge-nav-mask">
										</div>
										<h2 class="huge-nav-text"><?php the_field('huge_nav_text_3') ?></h2>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- Wrapper end -->
<?php endwhile; ?>

<?php get_footer(); ?>
