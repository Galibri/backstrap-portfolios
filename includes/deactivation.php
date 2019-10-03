<?php
/**
 * Code to run after plugin deactivatio is requested
 */
function bs_portfolio_deactivate_plugin() {
	global $wpdb;

	$posts = get_posts(
		array(
			'numberposts' => -1,
			'post_type' => 'bs_portfolio',
			'post_status' => 'any',
		)
	);

	foreach ( $posts as $post ) {
		wp_delete_post( $post->ID, true );
	}
	
    flush_rewrite_rules();
}