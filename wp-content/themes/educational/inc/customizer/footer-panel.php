<?php
/**
 * Educational Footer Settings panel at Theme Customizer
 *
 * @package Educational
 * @since 1.0.0
 */

add_action( 'customize_register', 'educational_footer_settings_register' );

function educational_footer_settings_register( $wp_customize ) {
  require get_template_directory() .'/inc/repeater/class-repeater-settings.php';
  require get_template_directory() .'/inc/repeater/class-control-repeater.php';

	/**
     * Add Footer Settings Panel
     *
     * @since 1.0.0
     */
  $wp_customize->add_panel(
   'educational_footer_settings_panel',
   array(
     'priority'       => 30,
     'capability'     => 'edit_theme_options',
     'theme_supports' => '',
     'title'          => __( 'Footer Settings', 'educational' ),
   )
 );

  /*----------------------------------------------------------------------------------------------------------------------------------------*/
  /**
     * Footer Contact info
     *
     * @since 1.0.0
     */
  $wp_customize->add_section(
    'footer_contact_info_section',
    array(
      'priority'       => 1,
      'panel'          => 'educational_footer_settings_panel',
      'capability'     => 'edit_theme_options',
      'theme_supports' => '',
      'title'          => __( 'Footer Contact info Section', 'educational' ),
      'description'    => __( 'Managed the content display at Footer Contact info section.', 'educational' ),
    )
  );

  /**Foter Social medi  Enable/Disable  */
  $wp_customize->add_setting(
    'footer_contact_info_enable',
    array(
      'default'           => 0,
      'sanitize_callback' => 'educational_sanitize_checkbox',
    )
  );

  $wp_customize->add_control(
    'footer_contact_info_enable',
    array(
      'section'     => 'footer_contact_info_section',
      'label'       => __( 'Contact info', 'educational' ),
      'description' => __( 'Enable/Disable Contact info in Footer.', 'educational' ),
      'type'        => 'checkbox'
    )       
  );

  /** Social Links */
  $wp_customize->add_setting( 
    new Educational_Repeater_Setting( 
      $wp_customize, 
      'educational_contact_info_items', 
      array(
        'default' => array(
          array(
            'font' => '',
            'address' => '',                        
          ),
          array(
            'font' => '',
            'address' => '',
          ),
          array(
            'font' => '',
            'address' => '',
          )
        ),
        'sanitize_callback' => array( 'Educational_Repeater_Setting', 'sanitize_repeater_setting' ),
      ) 
    ) 
  );

  $wp_customize->add_control(
    new Educational_Control_Repeater(
      $wp_customize,
      'educational_contact_info_items',
      array(
        'section' => 'footer_contact_info_section',              
        'label'   => __( 'Contact info items', 'educational' ),
        'fields'  => array(
          'font' => array(
            'type'        => 'font',
            'label'       => __( 'Font Awesome Icon', 'educational' ),
            'description' => __( 'Example: fa-facebook', 'educational' ),
          ),
          'address' => array(
            'type'        => 'text',
            'label'       => __( 'Address', 'educational' )
          )
        ),
        'row_label' => array(
          'type' => 'field',
          'value' => __( 'address', 'educational' ),
          'field' => 'address'
        )                        
      )
    )
  );
  /*----------------------------------------------------------------------------------------------------------------------------------------*/
  /**
     * Footer Social section
     *
     * @since 1.0.0
     */
  $wp_customize->add_section(
    'footer_social_media_section',
    array(
      'priority'       => 2,
      'panel'          => 'educational_footer_settings_panel',
      'capability'     => 'edit_theme_options',
      'theme_supports' => '',
      'title'          => __( 'Footer Social Media Section', 'educational' ),
      'description'    => __( 'Managed the content display at Footer Social media section.', 'educational' ),
    )
  );

  /**Foter Social medi  Enable/Disable  */
  $wp_customize->add_setting(
    'footer_social_media_enable',
    array(
      'default'           => 0,
      'sanitize_callback' => 'educational_sanitize_checkbox',
    )
  );

  $wp_customize->add_control(
    'footer_social_media_enable',
    array(
      'section'     => 'footer_social_media_section',
      'label'       => __( 'Social Links', 'educational' ),
      'description' => __( 'Enable/Disable social links in Footer.', 'educational' ),
      'type'        => 'checkbox'
    )       
  );

  /**Social Links Text */
  $wp_customize->add_setting(
    'educational_social_links_text',
    array(
      'default'           => __( 'Social Links', 'educational' ),
      'sanitize_callback' => 'sanitize_text_field',
      'transport'         => 'postMessage'
    )
  );

  $wp_customize->add_control(
    'educational_social_links_text',
    array(
      'label'    => __( 'Footer Social text links', 'educational' ),
      'section'  => 'footer_social_media_section',
      'type'     => 'text',
    )
  );

  $wp_customize->selective_refresh->add_partial( 'educational_social_links_text', array(
    'selector' => '.footer .col-lg-4 col-md-6 .social h4.title',
    'render_callback' => 'educational_social_get_links_text',
  ) );

  /** Social Links */
  $wp_customize->add_setting( 
    new Educational_Repeater_Setting( 
      $wp_customize, 
      'educational_social_links', 
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
      'educational_social_links',
      array(
        'section' => 'footer_social_media_section',              
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