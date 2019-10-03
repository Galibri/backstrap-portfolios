<?php
/**
 * First code to run after the plugin installation
 */
function bs_activate_plugin(){
    if( version_compare( get_bloginfo( 'version' ), '5.0', '<' ) ){
        wp_die( __('This plugin requires WordPress min version 5.0 to run smoothly.') );
    }
    bs_create_portfolio_post_type();
    flush_rewrite_rules();
}