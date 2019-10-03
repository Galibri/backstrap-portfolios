<?php

//check post type for bs_portfolio and save or update post
function bsp_save_portfolio_meta( $post_id, $post, $update ){
    
    if ( isset( $_POST['bs_portfolio_link'] ) ) {
        update_post_meta( $post_id, 'bs_portfolio_link', esc_url( $_POST['bs_portfolio_link'] ) );
    }
    if ( isset( $_POST['bs_portfolio_skills'] ) ) {
        update_post_meta( $post_id, 'bs_portfolio_skills', sanitize_text_field( $_POST['bs_portfolio_skills'] ) );
    }
}
add_action( 'save_post_bs_portfolio', 'bsp_save_portfolio_meta', 10, 3 );