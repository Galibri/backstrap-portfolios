<?php
/*
Plugin Name:  BackStrap Portfolios
Plugin URI:   https://galibweb.com/plugins/backstrap-portfolios
Description:  An image sliding portfolios plugin that will add a portfolios section to your WordPress website
Version:      1.0
Author:       Asadullah Al Galib
Author URI:   https://galibweb.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  backstrap-portfolios
*/

if( !function_exists( 'add_action' ) ){
    die( 'Hello there! I am just a plugin and I can\'t do anything without WordPress installation.' );
}

/**
 * Setup
 */
define( 'BS_PORTFOLIO_PLUGIN_URL', __FILE__ );
define( 'BS_PORTFOLIO_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Require files
 */
require_once BS_PORTFOLIO_PLUGIN_PATH . 'includes/activation.php';
require_once BS_PORTFOLIO_PLUGIN_PATH . 'includes/init.php';
require_once BS_PORTFOLIO_PLUGIN_PATH . 'includes/deactivation.php';
require_once BS_PORTFOLIO_PLUGIN_PATH . 'includes/options/src/class.settings-api.php';
require_once BS_PORTFOLIO_PLUGIN_PATH . 'includes/options/options-settings/settings.php';
require_once BS_PORTFOLIO_PLUGIN_PATH . 'includes/metabox/bs_portfolio-metaboxes.php';
require_once BS_PORTFOLIO_PLUGIN_PATH . 'includes/metabox/portfolio-fields.php';
require_once BS_PORTFOLIO_PLUGIN_PATH . 'includes/metabox/save-portfolio-meta.php';

/**
 * Hooks
 */
register_activation_hook( __FILE__, 'bs_activate_plugin' );
register_deactivation_hook( __FILE__, 'bs_portfolio_deactivate_plugin' );
add_action( 'init', 'bs_create_portfolio_post_type' );
add_action( 'init', 'bs_create_bs_portfolio_type_taxonomy', 0 );
add_action( 'add_meta_boxes_bs_portfolio', 'bs_portfolio_add_metaboxes' );

/**
 * Initialize Plugin Settings
 */
new BS_Settings_API_Options();

// bs_get_option('screen_border_type', 'bs_basics');