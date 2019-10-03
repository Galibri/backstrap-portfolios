<?php
/**
 * Register bs_portfolio post type
 * @return [type]
 */
function bs_create_portfolio_post_type() {
	$labels = array(
		'name'               => __( 'BS Portfolios', 'backstrap-portfolios' ),
		'singular_name'      => __( 'Bs Portfolio', 'backstrap-portfolios' ),
		'menu_name'          => __( 'Portfolio', 'backstrap-portfolios' ),
		'name_admin_bar'     => __( 'Portfolio', 'backstrap-portfolios' ),
		'add_new'            => __( 'Add New', 'backstrap-portfolios' ),
		'add_new_item'       => __( 'Add New Portfolio', 'backstrap-portfolios' ),
		'new_item'           => __( 'New Portfolio', 'backstrap-portfolios' ),
		'edit_item'          => __( 'Edit Portfolio', 'backstrap-portfolios' ),
		'view_item'          => __( 'View Portfolio', 'backstrap-portfolios' ),
		'all_items'          => __( 'All Portfolios', 'backstrap-portfolios' ),
		'search_items'       => __( 'Search Portfolios', 'backstrap-portfolios' ),
		'parent_item_colon'  => __( 'Parent Portfolios:', 'backstrap-portfolios' ),
		'not_found'          => __( 'No portfolios found.', 'backstrap-portfolios' ),
		'not_found_in_trash' => __( 'No portfolios found in Trash.', 'backstrap-portfolios' )
	);
	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'backstrap-portfolios' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'bs_portfolio' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
		'menu_icon'			 => 'dashicons-portfolio'
	);
	register_post_type( 'bs_portfolio', $args );
}


/**
 * Register bs_portfolio_type taxonomy
 * @return [type]
 */
function bs_create_bs_portfolio_type_taxonomy() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Portfolio Types', 'taxonomy general name', 'backstrap-portfolios' ),
		'singular_name'     => _x( 'Portfolio Type', 'taxonomy singular name', 'backstrap-portfolios' ),
		'search_items'      => __( 'Search Portfolio Types', 'backstrap-portfolios' ),
		'all_items'         => __( 'All Portfolio Types', 'backstrap-portfolios' ),
		'parent_item'       => __( 'Parent Portfolio Type', 'backstrap-portfolios' ),
		'parent_item_colon' => __( 'Parent Portfolio Type:', 'backstrap-portfolios' ),
		'edit_item'         => __( 'Edit Portfolio Type', 'backstrap-portfolios' ),
		'update_item'       => __( 'Update Portfolio Type', 'backstrap-portfolios' ),
		'add_new_item'      => __( 'Add New Portfolio Type', 'backstrap-portfolios' ),
		'new_item_name'     => __( 'New Portfolio Type Name', 'backstrap-portfolios' ),
		'menu_name'         => __( 'Portfolio Type', 'backstrap-portfolios' ),
	);
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_rest' 		=> true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'bs-portfolio-type' ),
	);
	register_taxonomy( 'bs_portfolio_type', array( 'bs_portfolio' ), $args );
}