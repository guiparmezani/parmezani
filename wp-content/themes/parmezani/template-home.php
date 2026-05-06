<?php
/**
 * Template Name: Template Home
 * Template Post Type: page
 *
 * @package Parmezani
 */

get_header();
get_template_part( 'template-parts/hero' );
get_template_part( 'template-parts/marquee' );
get_template_part( 'template-parts/work' );
get_template_part( 'template-parts/about' );
get_template_part( 'template-parts/capabilities' );
get_template_part( 'template-parts/contact' );
get_footer();
