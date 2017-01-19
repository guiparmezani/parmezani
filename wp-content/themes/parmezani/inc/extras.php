<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package understrap
 */

if ( ! function_exists( 'understrap_body_classes' ) ) {
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 *
	 * @return array
	 */
	function understrap_body_classes( $classes ) {
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		return $classes;
	}
}
add_filter( 'body_class', 'understrap_body_classes' );

// Removes tag class from the body_class array to avoid Bootstrap markup styling issues.
add_filter( 'body_class', 'adjust_body_class' );

if ( ! function_exists( 'adjust_body_class' ) ) {
	/**
	 * Setup body classes.
	 *
	 * @param string $classes CSS classes.
	 *
	 * @return mixed
	 */
	function adjust_body_class( $classes ) {

		foreach ( $classes as $key => $value ) {
			if ( $value == 'tag' ) {
				unset( $classes[ $key ] );
			}
		}

		return $classes;

	}
}

// Filter custom logo with correct classes.
add_filter( 'get_custom_logo', 'change_logo_class' );

if ( ! function_exists( 'change_logo_class' ) ) {
	/**
	 * Replaces logo CSS class.
	 *
	 * @param string $html Markup.
	 *
	 * @return mixed
	 */
	function change_logo_class( $html ) {
		$html = str_replace( 'class="custom-logo"', 'class="img-responsive"', $html );
		$html = str_replace( 'class="custom-logo-link"', 'class="navbar-brand custom-logo-link"', $html );

		return $html;
	}
}

if(function_exists('acf_add_options_page')) { 
  acf_add_options_page();
}



// Register Project Post Type
function project_post_type() {

  $labels = array(
    'name'                => _x( 'Projects', 'Post Type General Name', 'roots' ),
    'singular_name'       => _x( 'project', 'Post Type Singular Name', 'roots' ),
    'menu_name'           => __( 'Projects', 'roots' ),
    'name_admin_bar'      => __( 'project', 'roots' ),
    'parent_item_colon'   => __( 'Parent project:', 'roots' ),
    'all_items'           => __( 'All Projects', 'roots' ),
    'add_new_item'        => __( 'Add New project', 'roots' ),
    'add_new'             => __( 'Add New', 'roots' ),
    'new_item'            => __( 'New project', 'roots' ),
    'edit_item'           => __( 'Edit project', 'roots' ),
    'update_item'         => __( 'Update project', 'roots' ),
    'view_item'           => __( 'View project', 'roots' ),
    'search_items'        => __( 'Search Projects', 'roots' ),
    'not_found'           => __( 'Not found', 'roots' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'roots' ),
  );
  $args = array(
    'label'               => __( 'project', 'roots' ),
    'description'         => __( 'Person Project', 'roots' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'revisions', 'thumbnail'),
    'taxonomies'          => array( 'projects' ),
    'hierarchical'        => false,
    'public'              => false,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 4,
    'show_in_admin_bar'   => false,
    'show_in_nav_menus'   => false,
    'can_export'          => false,
    'has_archive'         => false,
    'exclude_from_search' => true,
    'publicly_queryable'  => false,
    'query_var'           => 'project',
    'rewrite'             => false,
    'capability_type'     => 'page',
  );

  register_post_type( 'project', $args );

}

add_action( 'init', 'project_post_type', 0 );