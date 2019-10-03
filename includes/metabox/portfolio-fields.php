<?php

//custom field for portfolios post type
function bs_portfolio_options_callback( $post ){   
    ?>

    <div class="form-group">
        <label for="portfolios-link">Project Link: </label>
        <input type="url" id="bs-portfolio-link" class="regular-text" name="bs_portfolio_link" placeholder="http://example.com" value="<?php echo get_post_meta( $post->ID, 'bs_portfolio_link', true ); ?>">
    </div>
    <div class="form-group">
        <label for="portfolios-skills">Project Skills: </label>
        <input type="text" id="bs-portfolio-skills" class="regular-text" name="bs_portfolio_skills" placeholder="HTML, CSS, PHP, WordPress" value="<?php echo get_post_meta( $post->ID, 'bs_portfolio_skills', true ); ?>">
    </div>
    

    <?php
}
