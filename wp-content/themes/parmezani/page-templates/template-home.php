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

		$projects = new WP_Query(array(
	    "post_type" => "project"
	  ));
	?>
	<div class="page-wrapper">
		<main class="site-main"  role="main">

			<div class="screen-center hidden"></div>
			
			<div class="hero-area" style="background-image: linear-gradient(rgba(250,250,241,0.95), rgba(250,250,241,0.95)), url(<?php echo $home_background; ?>);">
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
								<a href="<?php the_field('huge_nav_url_1') ?>" class="anchor-link">
									<div class="huge-nav-content">
										<div class="huge-nav-mask">
										</div>
										<h2 class="huge-nav-text"><?php the_field('huge_nav_text_1') ?></h2>
									</div>
								</a>
							</div>

							<div class="col-sm-4" style="background-image: url(<?php the_field('huge_nav_image_2'); ?>);">
								<a href="<?php the_field('huge_nav_url_2') ?>" class="anchor-link">
									<div class="huge-nav-content">
										<div class="huge-nav-mask">
										</div>
										<h2 class="huge-nav-text"><?php the_field('huge_nav_text_2') ?></h2>
									</div>
								</a>
							</div>

							<div class="col-sm-4" style="background-image: url(<?php the_field('huge_nav_image_3'); ?>);">
								<a href="<?php the_field('huge_nav_url_3') ?>" class="anchor-link">
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

			<section class="page-section my-work-section" id="my-work">
				<div class="container">
					<div class="page-heading">
						<h2>MY WORK</h2>
					</div>
					<div class="portfolio-nav">
						<?php if($projects->have_posts()): ?>
						<div class="row">
							<?php while($projects->have_posts()): $projects->the_post(); ?>
							<?php if (has_post_thumbnail()) {
								$background_image = get_the_post_thumbnail_url();
							} ?>
								<div class="col-sm-4">
									<div class="portfolio-item-wrapper" style="background-image: url('<?php echo $background_image; ?>');">
										<div class="portfolio-item-mask"></div>
										<h2><?php the_title(); ?></h2>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- Wrapper end -->
<?php endwhile; ?>

<?php get_footer(); ?>
