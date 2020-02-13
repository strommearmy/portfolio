<?php
/**
 * Educational Header Settings panel at Theme Customizer
 *
 * @package Educational
 * @since 1.0.0
 */

add_action( 'customize_register', 'educational_header_settings_register' );

function educational_header_settings_register( $wp_customize ) {
  require get_template_directory() .'/inc/repeater/class-repeater-settings.php';
  require get_template_directory() .'/inc/repeater/class-control-repeater.php';
  $wp_customize->get_section( 'header_image' )->priority = '20';
  $wp_customize->get_section( 'header_image' )->title    = __( 'Header Image', 'educational' );
  $wp_customize->get_section( 'header_image' )->panel    = 'educational_header_settings_panel';

	/**
     * Add Header Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
     'educational_header_settings_panel',
     array(
         'priority'       => 10,
         'capability'     => 'edit_theme_options',
         'theme_supports' => '',
         'title'          => __( 'Header Settings', 'educational' ),
     )
 );

    /*----------------------------------------------------------------------------------------------------------------------------------------*/
	/**
     * Top Header section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'educational_top_header_section',
        array(
        	'priority'       => 5,
        	'panel'          => 'educational_header_settings_panel',
        	'capability'     => 'edit_theme_options',
        	'theme_supports' => '',
            'title'          => __( 'Top Header Section', 'educational' ),
            'description'    => __( 'Managed the content display at top header section.', 'educational' ),
        )
    );

    /*----------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     *Enable/Disable Top Header section
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'educational_top_header_enable',
        array(
            'default'           => 0,
            'sanitize_callback' => 'educational_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'educational_top_header_enable',
        array(
            'section'     => 'educational_top_header_section',
            'label'       => __( 'Enable/Disable top header', 'educational' ),
            'type'        => 'checkbox'
        )       
    );

    /*----------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     *Login Page Link in Top Header section
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'educational_login_page',
        array(
            'default'           => 0,
            'sanitize_callback' => 'educational_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'educational_top_header_enable',
        array(
            'section'     => 'educational_top_header_section',
            'label'       => __( 'Enable/Disable top header', 'educational' ),
            'type'        => 'checkbox'
        )       
    );

    /** Top Header Contact info */
    $wp_customize->add_setting( 
        new Educational_Repeater_Setting( 
            $wp_customize, 
            'top_header_contact_info_items', 
            array(
                'default' => array(
                    array(
                        'icon' => '',
                        'title' => '',
                    ),
                    array(
                        'icon' => '',
                        'title' => '',
                    )
                ),
                'sanitize_callback' => array( 'Educational_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );

    $wp_customize->add_control(
        new Educational_Control_Repeater(
            $wp_customize,
            'top_header_contact_info_items',
            array(
                'section' => 'educational_top_header_section',              
                'label'   => __( 'Top Header Contact items', 'educational' ),
                'fields'  => array(
                    'icon' => array(
                        'type'        => 'font',
                        'label'       => __( 'Font Awesome Icon', 'educational' ),
                    ),
                    'title' => array(
                        'type'        => 'text',
                        'label'       => __( 'Location Title', 'educational' ),
                    )
                ),
                'row_label' => array(
                    'type' => 'field',
                    'value' => __( 'contact', 'educational' ),
                    'field' => 'title'
                )                        
            )
        )
    );

}