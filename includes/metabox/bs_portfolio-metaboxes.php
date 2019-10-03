<?php
/**
 * Add metabox
 * @return [type]
 */

function bs_portfolio_add_metaboxes() {
	
	add_meta_box(
		'bs_portfolio_options',
		__('Portfolio Options', 'backstrap-portfolios'),
		'bs_portfolio_options_callback',
		'bs_portfolio',
		'normal',
		'high'
	);
}