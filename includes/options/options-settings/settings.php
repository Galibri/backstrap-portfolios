<?php
/**
 * Settings for portfolios plugin
 */
if ( !class_exists('BS_Settings_API_Options' ) ):
class BS_Settings_API_Options {

    private $settings_api;

    function __construct() {
        $this->settings_api = new BS_Settings_API;

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
        add_submenu_page(
        'edit.php?post_type=bs_portfolio',
        __( 'Portfolio Options', 'backstrap-portfolios' ),
        __( 'Portfolio Options', 'backstrap-portfolios' ),
        'manage_options',
        'bs-portfolio-options',
        array($this, 'plugin_page')
    );
    }
    
    function get_settings_sections() {
        $sections = array(
            array(
                'id'    => 'bs_basics',
                'title' => __( 'Portfolio Settings', 'backstrap-portfolios' )
            ),
            array(
                'id'    => 'bs_advanced',
                'title' => __( 'Portfolio Single Page Settings', 'backstrap-portfolios' )
            )
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            'bs_basics' => array(
                array(
                    'name'              => 'screen_border_width',
                    'label'             => __( 'Portfolio border width', 'backstrap-portfolios' ),
                    'desc'              => __( 'Border of each portfolios', 'backstrap-portfolios' ),
                    'placeholder'       => __( '0', 'backstrap-portfolios' ),
                    'min'               => 0,
                    'max'               => 100,
                    'step'              => '1',
                    'type'              => 'number',
                    'default'           => '2'
                ),
                array(
                    'name'              => 'screen_border_type',
                    'label'             => __( 'Portfolio border type', 'backstrap-portfolios' ),
                    'desc'              => __( 'Select the border type', 'backstrap-portfolios' ),
                    'type'              => 'select',
                    'default'           => 'solid',
                    'options'           => array(
                        'solid'           => 'Solid',
                        'dotted'          => 'Dotted',
                        'dashed'          => 'Dashed',
                        'double'          => 'Double',
                        'groove'          => 'Groove',
                        'ridge'           => 'Ridge',
                        'inset'           => 'Inset',
                        'outset'          => 'Outset',
                        'none'            => 'None'
                    )
                ),
            ),
            'bs_advanced' => array(
                array(
                    'name'    => 'px_single_title_color',
                    'label'   => __( 'Portfolio Single page title color', 'backstrap-portfolios' ),
                    'desc'    => __( 'Portfolio Single page title color', 'backstrap-portfolios' ),
                    'type'    => 'color',
                    'default' => '#1c2b4f'
                ),
            )
        );

        return $settings_fields;
    }

    function plugin_page() {
        echo '<div class="wrap">';

        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}
endif;

function bs_get_option( $option, $section, $default = '' ) {
 
    $options = get_option( $section );
 
    if ( isset( $options[$option] ) ) {
    return $options[$option];
    }
 
    return $default;
}
