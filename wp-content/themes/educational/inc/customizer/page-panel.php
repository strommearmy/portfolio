<?php
/**
 * Educational Pages Settings panel at Theme Customizer
 *
 * @package Educational
 * @since 1.0.0
 */

add_action( 'customize_register', 'educational_page_settings_register' );

function educational_page_settings_register( $wp_customize ) {
  require get_template_directory() .'/inc/repeater/class-repeater-settings.php';
  require get_template_directory() .'/inc/repeater/class-control-repeater.php';

	/**
     * Add Page Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
     'educational_page_settings_panel',
     array(
         'priority'       => 40,
         'capability'     => 'edit_theme_options',
         'theme_supports' => '',
         'title'          => __( 'Page Template Settings', 'educational' ),
     )
 );

    /*----------------------------------------------------------------------------------------------------------------------------------------*/
	/**
     * Contact Page section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'educational_contact_page_section',
        array(
        	'priority'       => 5,
        	'panel'          => 'educational_page_settings_panel',
        	'capability'     => 'edit_theme_options',
        	'theme_supports' => '',
            'title'          => __( 'Contact Page', 'educational' ),
            'description'    => __( 'Managed the content display at contact page.', 'educational' ),
        )
    );

   
    /**Contact Page Phone Number */
    $wp_customize->add_setting( 'educational_contact_phone_number', array(
        'capability'            => 'edit_theme_options',
        'default'               => '',
        'sanitize_callback'     => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'educational_contact_phone_number', array(
        'label'                 =>  __( 'Type Phone Number', 'educational' ),
         'description'           =>__('Eg:-  (+123) 456 7890','educational'),
        'section'               => 'educational_contact_page_section',
        'type'                  => 'text',
        'settings'              => 'educational_contact_phone_number',
    ) );

    /**Contact Page Email Address */
    $wp_customize->add_setting( 'educational_contact_email_address', array(
        'capability'            => 'edit_theme_options',
        'default'               => '',
        'sanitize_callback'     => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'educational_contact_email_address', array(
        'label'                 =>  __( 'Type Email Address', 'educational' ),
        'description'           =>__('Eg:-  info.demo@example.com','educational'),
        'section'               => 'educational_contact_page_section',
        'type'                  => 'text',
        'settings'              => 'educational_contact_email_address',
    ) );

    /**Contact Page Main Address */
    $wp_customize->add_setting( 'educational_contact_main_address', array(
        'capability'            => 'edit_theme_options',
        'default'               => '',
        'sanitize_callback'     => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'educational_contact_main_address', array(
        'label'                 =>  __( 'Type Main Address', 'educational' ),
         'description'           =>__('Eg:-  40 Barla Street 133/2 New York City, US','educational'),
        'section'               => 'educational_contact_page_section',
        'type'                  => 'text',
        'settings'              => 'educational_contact_main_address',
    ) );

    /**Contact Page Social Link Heading */
    $wp_customize->add_setting( 'educational_contact_social_link_text', array(
        'capability'            => 'edit_theme_options',
        'default'               => '',
        'sanitize_callback'     => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'educational_contact_social_link_text', array(
        'label'                 =>  __( 'Type Social Link Heading', 'educational' ),
        'description'           =>__('Eg:- Social Links','educational'),
        'section'               => 'educational_contact_page_section',
        'type'                  => 'text',
        'settings'              => 'educational_contact_social_link_text',
    ) );

    // Contact form
    $wp_customize->add_setting( 'educational_frontpage_contact_form_option', array(
        'capability'            => 'edit_theme_options',
        'default'               => '',
        'sanitize_callback'     => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'educational_frontpage_contact_form_option', array(
        'label'                 =>  __( 'Contact Form Section Use Shortcode', 'educational' ),
        'description'           =>  __( 'eg [contact-form-7 id="108" title="Contact form 1"]', 'educational' ),
        'section'               => 'educational_contact_page_section',
        'type'                  => 'text',
        'settings' => 'educational_frontpage_contact_form_option',
    ) );


    /** Social Links */
    $wp_customize->add_setting( 
        new Educational_Repeater_Setting( 
          $wp_customize, 
          'educational_contact_social_links', 
          array(
            'default' => array(
              array(
                'font' => '',
                'link' => '',                        
            ),
              array(
                'font' => '',
                'link' => '',
            ),
              array(
                'font' => '',
                'link' => '',
            ),
              array(
                'font' => '',
                'link' => '',
            )
          ),
            'sanitize_callback' => array( 'Educational_Repeater_Setting', 'sanitize_repeater_setting' ),
        ) 
      ) 
    );

    $wp_customize->add_control(
        new Educational_Control_Repeater(
          $wp_customize,
          'educational_contact_social_links',
          array(
            'section' => 'educational_contact_page_section',              
            'label'   => __( 'Social Links', 'educational' ),
            'fields'  => array(
              'font' => array(
                'type'        => 'font',
                'label'       => __( 'Font Awesome Icon', 'educational' ),
                'description' => __( 'Example: fa-facebook', 'educational' ),
            ),
              'link' => array(
                'type'        => 'url',
                'label'       => __( 'Link', 'educational' ),
                'description' => __( 'Example: http://facebook.com', 'educational' ),
            )
          ),
            'row_label' => array(
              'type' => 'field',
              'value' => __( 'social', 'educational' ),
              'field' => 'link'
          )                        
        )
      )
    );

}