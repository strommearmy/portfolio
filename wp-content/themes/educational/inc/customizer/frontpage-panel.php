<?php

/**
 * Educational Frontpage Settings panel at Theme Customizer
 *
 * @package Educational
 * @since 1.0.0
 */
add_action( 'customize_register', 'educational_frontpage_settings_register' );

function educational_frontpage_settings_register( $wp_customize ) {
 require get_template_directory() .'/inc/repeater/class-repeater-settings.php';
 require get_template_directory() .'/inc/repeater/class-control-repeater.php';
/**
 * Add Frontpage Settings Panel
 *
 * @since 1.0.0
 */
$wp_customize->add_panel(
  'educational_frontpage_settings_panel',
  array(
    'priority'       => 15,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Frontpage Settings', 'educational' ),
  )
);

/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Front page slider section
 *
 * @since 1.0.0
 */

$wp_customize->add_section(
  'educational_frontpage_slider_section',
  array(
   'priority'       => 1,
   'panel'          => 'educational_frontpage_settings_panel',
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Slider Section', 'educational' ),
   'description'    => __( 'Managed the slider display at Frontpage section.', 'educational' ),
 )
);

/**
 * Enable/Disable for  Slider
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
  'educational_slider_enable',
  array(
    'default'           => 0,
    'sanitize_callback' => 'educational_sanitize_checkbox',
  )
);

$wp_customize->add_control(
  'educational_slider_enable',
  array(
    'section'     => 'educational_frontpage_slider_section',
    'label'       => __( 'Enable/Disable for  Slider', 'educational' ),
    'type'        => 'checkbox'
  )       
);

/*
* Banner slider section
*/
for ($i=1;$i<=6;$i++) {
// Select Page For Slider title with featured image.
  $wp_customize->add_setting( 'educational_slider_title_'.$i, array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'educational_sanitize_dropdown_pages'
  ) );

  $wp_customize->add_control('educational_slider_title_'.$i,
    array(
      /* translators: %s: Slider Number. */
      'label'                 =>  sprintf( __( 'Select Page for Slider %s title with featured image', 'educational' ), $i ),
      'section' => 'educational_frontpage_slider_section',
      'type'=> 'dropdown-pages',
      'settings' => 'educational_slider_title_'.$i
    )
  );

  $wp_customize->add_setting( 'educational_slider_button_1_title_'.$i, array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'sanitize_text_field'
  ) );

  $wp_customize->add_control( 'educational_slider_button_1_title_'.$i, array(
    /* translators: %s: Description */ 
    'label'                 =>  sprintf( __( 'First Button Title For Slider %s', 'educational' ), $i ),
    'description'           =>  __( 'View Courses', 'educational' ),
    'section'               => 'educational_frontpage_slider_section',
    'type'                  => 'text',
    'settings' => 'educational_slider_button_1_title_'.$i,
  ) );

  $wp_customize->add_setting( 'educational_slider_button_1_url_'.$i, array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'esc_url_raw'
  ) );

  $wp_customize->add_control( 'educational_slider_button_1_url_'.$i, array(
    /* translators: %s: Description */ 
    'label'                 =>  sprintf( __( 'Select URL For button Title 1 of slider  %s', 'educational' ), $i ),
    'description'           =>  __( '#', 'educational' ),
    'section'               => 'educational_frontpage_slider_section',
    'type'                  => 'url',
    'settings' => 'educational_slider_button_1_url_'.$i,
  ) );
}
/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Front page Service section
 *
 * @since 1.0.0
 */

$wp_customize->add_section(
  'educational_frontpage_service_section',
  array(
    'priority'       => 2,
    'panel'          => 'educational_frontpage_settings_panel',
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Service Section', 'educational' ),
    'description'    => __( 'Managed the Service display at Frontpage section.', 'educational' ),
  )
);

/**
 * Enable/Disable for service
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
  'educational_service_enable',
  array(
    'default'           => 0,
    'sanitize_callback' => 'educational_sanitize_checkbox',
  )
);

$wp_customize->add_control(
  'educational_service_enable',
  array(
    'section'     => 'educational_frontpage_service_section',
    'label'       => __( 'Enable/Disable for service', 'educational' ),
    'type'        => 'checkbox'
  )       
);


//Category selection for service
$wp_customize->add_setting('educational_service_category_id',array(
  'capability'        => 'edit_theme_options',
  'sanitize_callback' => 'educational_sanitize_category',
  'default' =>  '1',
)
);

$wp_customize->add_control(new Educational_Customize_Dropdown_Taxonomies_Control($wp_customize,'educational_service_category_id',
  array(
   'label' => __('Select Category for Service','educational'),
   'section' => 'educational_frontpage_service_section',
   'settings' => 'educational_service_category_id',
   'type'=> 'dropdown-taxonomies',
 )
));

$wp_customize->add_setting( 'educational_service_number', array(
  'capability'            => 'edit_theme_options',
  'default'               => '4',
  'sanitize_callback'     => 'absint'
));

$wp_customize->add_control( 'educational_service_number', array(
  'label'                 =>  __( 'Number of Service to display in Frontpage', 'educational' ),
  'description'           =>  __( 'input 3,4,5,6,7,8,9,10', 'educational' ),
  'section'               => 'educational_frontpage_service_section',
  'type'                  => 'number',
  'settings' => 'educational_service_number',
) );
/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Front page About section
 *
 * @since 1.0.0
 */

$wp_customize->add_section(
  'educational_frontpage_about_section',
  array(
   'priority'       => 3,
   'panel'          => 'educational_frontpage_settings_panel',
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'About Section', 'educational' ),
   'description'    => __( 'Managed the About display at Frontpage section.', 'educational' ),
 )
);

/**
 * Enable/Disable for About
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
  'educational_about_enable',
  array(
    'default'           => 0,
    'sanitize_callback' => 'educational_sanitize_checkbox',
  )
);

$wp_customize->add_control(
  'educational_about_enable',
  array(
    'section'     => 'educational_frontpage_about_section',
    'label'       => __( 'Enable/Disable for  About', 'educational' ),
    'type'        => 'checkbox'
  )       
);


/**
 * select page for about title, description with featured image
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
  'educational_frontpage_about_title_option',
  array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'sanitize_callback' => 'educational_sanitize_dropdown_pages',
  )
);

$wp_customize->add_control('educational_frontpage_about_title_option',array(
  'label'         => __( 'Select Page for About title, description with featured image', 'educational' ),
  'section'       => 'educational_frontpage_about_section',
  'settings'      => 'educational_frontpage_about_title_option',
  'type'          => 'dropdown-pages'
)
);

/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Front page Course section
 *
 * @since 1.0.0
 */

$wp_customize->add_section(
  'educational_frontpage_course_section',
  array(
    'priority'       => 4,
    'panel'          => 'educational_frontpage_settings_panel',
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Course Section', 'educational' ),
    'description'    => __( 'Managed the Course display at Frontpage section.', 'educational' ),
  )
);

/**
 * Enable/Disable for Courses
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
  'educational_course_enable',
  array(
    'default'           => 0,
    'sanitize_callback' => 'educational_sanitize_checkbox',
  )
);

$wp_customize->add_control(
  'educational_course_enable',
  array(
    'section'     => 'educational_frontpage_course_section',
    'label'       => __( 'Enable/Disable for  Courses', 'educational' ),
    'type'        => 'checkbox'
  )       
);

/** Popular Courses Text */
$wp_customize->add_setting(
  'educational_popular_courses',
  array(
    'default'           => __( 'Popular Courses', 'educational' ),
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage'
  )
);

$wp_customize->add_control(
  'educational_popular_courses',
  array(
    'label'    => __( 'Popular Courses Text', 'educational' ),
    'section'  => 'educational_frontpage_course_section',
    'type'     => 'text',
  )
);

$wp_customize->selective_refresh->add_partial( 'educational_popular_courses', array(
  'selector' => '.courses .main-title h2',
  'render_callback' => 'educational_popular_courses_text',
) );

// Popular Courses
for ($i=1;$i<=6;$i++) {
// Select Page For course title with featured image.
  $wp_customize->add_setting( 'educational_course_title_'.$i, array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'educational_sanitize_dropdown_pages'
  ) );

  $wp_customize->add_control('educational_course_title_'.$i,
    array(
      /* translators: %s: Slider Number. */
      'label'                 =>  sprintf( __( 'Select Page for Course %s title with featured image', 'educational' ), $i ),
      'section' => 'educational_frontpage_course_section',
      'type'=> 'dropdown-pages',
      'settings' => 'educational_course_title_'.$i
    )
  );
}


/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Frontpage Counter section
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
  'educational_counter_section',
  array(
    'priority'       => 5,
    'panel'          => 'educational_frontpage_settings_panel',
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Counter Section', 'educational' ),
    'description'    => __( 'Managed the content display at Counter section.', 'educational' ),
  )
);

/**
* Enable/Disable for Counter
*
* @since 1.0.0
*/
$wp_customize->add_setting(
  'educational_counter_enable',
  array(
    'default'           => 0,
    'sanitize_callback' => 'educational_sanitize_checkbox',
  )
);

$wp_customize->add_control(
  'educational_counter_enable',
  array(
    'section'     => 'educational_counter_section',
    'label'       => __( 'Enable/Disable for Counter', 'educational' ),
    'type'        => 'checkbox'
  )       
);


$wp_customize->add_setting( 
  new Educational_Repeater_Setting( 
    $wp_customize, 
    'educational_counter_items', 
    array(
      'default' => array(
        array(
          'icon' => '',
          'number'=> '',
          'title' => '',
        ),
        array(
          'icon' => '',
          'number'=> '',
          'title' => '',
        ),
        array(
         'icon' => '',
         'number'=> '',
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
    'educational_counter_items',
    array(
      'section' => 'educational_counter_section',              
      'label'   => __( 'Counter items', 'educational' ),
      'fields'  => array(
        'icon' => array(
          'type'        => 'font',
          'label'       => __( 'Font Awesome Icon', 'educational' ),
        ),
        'number' => array(
          'type'        => 'text',
          'label'       => __( 'Counter Number', 'educational' ),
        ),
        'title' => array(
          'type'        => 'text',
          'label'       => __( 'Counter Title', 'educational' ),
        )
      ),
      'row_label' => array(
        'type' => 'field',
        'value' => __( 'counter', 'educational' ),
        'field' => 'title'
      )                        
    )
  )
);
/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Front page Upcoming Events section
 *
 * @since 1.0.0
 */

$wp_customize->add_section(
  'educational_frontpage_events_section',
  array(
    'priority'       => 6,
    'panel'          => 'educational_frontpage_settings_panel',
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Events Section', 'educational' ),
    'description'    => __( 'Managed the  Events display at Frontpage section.', 'educational' ),
  )
);

/**
 * Enable/Disable for  Events
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
  'educational_events_enable',
  array(
    'default'           => 0,
    'sanitize_callback' => 'educational_sanitize_checkbox',
  )
);

$wp_customize->add_control(
  'educational_events_enable',
  array(
    'section'     => 'educational_frontpage_events_section',
    'label'       => __( 'Enable/Disable for Events', 'educational' ),
    'type'        => 'checkbox'
  )       
);


/** Latest Events Text */
$wp_customize->add_setting(
  'educational_events_text',
  array(
    'default'           => __( 'Latest Events', 'educational' ),
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage'
  )
);

$wp_customize->add_control(
  'educational_events_text',
  array(
    'label'    => __( 'Events Heading', 'educational' ),
    'section'  => 'educational_frontpage_events_section',
    'type'     => 'text',
  )
);

$wp_customize->selective_refresh->add_partial( 'educational_events_text', array(
  'selector' => '.event main-title h2',
  'render_callback' => 'educational_get_events_text',
) );


/** Events Details */
$wp_customize->add_setting(
  'educational_events_details_text',
  array(
    'default'           => __( 'View Details', 'educational' ),
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage'
  )
);

$wp_customize->add_control(
  'educational_events_details_text',
  array(
    'label'    => __( 'Events Details Text', 'educational' ),
    'section'  => 'educational_frontpage_events_section',
    'type'     => 'text',
  )
);

$wp_customize->selective_refresh->add_partial( 'educational_events_details_text', array(
  'selector' => 'event media-block .media-holder .media-body a.event-details',
  'render_callback' => 'educational_get_events_details_text',
) );


//Category select for Events
$wp_customize->add_setting('educational_events_category_id',array(
  'capability'        => 'edit_theme_options',
  'sanitize_callback' => 'educational_sanitize_category',
  'default' =>  '1',
)
);

$wp_customize->add_control(new Educational_Customize_Dropdown_Taxonomies_Control($wp_customize,'educational_events_category_id',
  array(
   'label' => __('Select Category for Events','educational'),
   'section' => 'educational_frontpage_events_section',
   'settings' => 'educational_events_category_id',
   'type'=> 'dropdown-taxonomies',
 )
));

$wp_customize->add_setting( 'educational_events_number', array(
  'capability'            => 'edit_theme_options',
  'default'               => '3',
  'sanitize_callback'     => 'absint'
));

$wp_customize->add_control( 'educational_events_number', array(
  'label'                 =>  __( 'Number of event to Show in Front Page', 'educational' ),
  'description'           =>  __( 'input 3,4,5,6,7,8,9,10', 'educational' ),
  'section'               => 'educational_frontpage_events_section',
  'type'                  => 'number',
  'settings' => 'educational_events_number',
) );
/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Front page Testimonials section
 *
 * @since 1.0.0
 */

$wp_customize->add_section(
  'educational_frontpage_testimonials_section',
  array(
    'priority'       => 7,
    'panel'          => 'educational_frontpage_settings_panel',
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Testimonials Section', 'educational' ),
    'description'    => __( 'Managed the  Testimonials display at Frontpage section.', 'educational' ),
  )
);

/**
 * Enable/Disable for Testimonials
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
  'educational_testimonials_enable',
  array(
    'default'           => 0,
    'sanitize_callback' => 'educational_sanitize_checkbox',
  )
);

$wp_customize->add_control(
  'educational_testimonials_enable',
  array(
    'section'     => 'educational_frontpage_testimonials_section',
    'label'       => __( 'Enable/Disable for Testimonials', 'educational' ),
    'type'        => 'checkbox'
  )       
);


/** Testimonials Text */
$wp_customize->add_setting(
  'educational_tetimonials_text',
  array(
    'default'           => __( 'Our Happy Clients', 'educational' ),
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage'
  )
);

$wp_customize->add_control(
  'educational_tetimonials_text',
  array(
    'label'    => __( 'Testimonials Heading', 'educational' ),
    'section'  => 'educational_frontpage_testimonials_section',
    'type'     => 'text',
  )
);

$wp_customize->selective_refresh->add_partial( 'educational_tetimonials_text', array(
  'selector' => '.clients main-title h2',
  'render_callback' => 'educational_get_testimonials_text',
) );


//Category select for Testimonials
$wp_customize->add_setting('educational_testimonials_category_id',array(
  'capability'        => 'edit_theme_options',
  'sanitize_callback' => 'educational_sanitize_category',
  'default' =>  '1',
)
);

$wp_customize->add_control(new Educational_Customize_Dropdown_Taxonomies_Control($wp_customize,'educational_testimonials_category_id',
  array(
   'label' => __('Select Category for testimonials','educational'),
   'section' => 'educational_frontpage_testimonials_section',
   'settings' => 'educational_testimonials_category_id',
   'type'=> 'dropdown-taxonomies',
 )
));

$wp_customize->add_setting( 'educational_testimonials_number', array(
  'capability'            => 'edit_theme_options',
  'default'               => '3',
  'sanitize_callback'     => 'absint'
));

$wp_customize->add_control( 'educational_testimonials_number', array(
  'label'                 =>  __( 'Number of Testimonials to Show in Front Page', 'educational' ),
  'description'           =>  __( 'input 3,4,5,6,7,8,9,10', 'educational' ),
  'section'               => 'educational_frontpage_testimonials_section',
  'type'                  => 'number',
  'settings' => 'educational_testimonials_number',
) );
/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Front page blog section
 *
 * @since 1.0.0
 */

$wp_customize->add_section(
  'educational_frontpage_blog_section',
  array(
    'priority'       => 11,
    'panel'          => 'educational_frontpage_settings_panel',
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Blog Section', 'educational' ),
    'description'    => __( 'Managed the  Blog display at Frontpage section.', 'educational' ),
  )
);

/**
 * Enable/Disable for Blog Section
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
  'educational_blog_enable',
  array(
    'default'           => 1,
    'sanitize_callback' => 'educational_sanitize_checkbox',
  )
);

$wp_customize->add_control(
  'educational_blog_enable',
  array(
    'section'     => 'educational_frontpage_blog_section',
    'label'       => __( 'Enable/Disable for Blog', 'educational' ),
    'type'        => 'checkbox'
  )       
);


/** Testimonials Text */
$wp_customize->add_setting(
  'educational_blog_text',
  array(
    'default'           => __( 'Latest Blog', 'educational' ),
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage'
  )
);

$wp_customize->add_control(
  'educational_blog_text',
  array(
    'label'    => __( 'Blog Heading', 'educational' ),
    'section'  => 'educational_frontpage_blog_section',
    'type'     => 'text',
  )
);

$wp_customize->selective_refresh->add_partial( 'educational_blog_text', array(
  'selector' => '.blog main-title h2',
  'render_callback' => 'educational_get_blog_text',
) );
//Category select for blogs
$wp_customize->add_setting('educational_blog_category_id',array(
  'capability'        => 'edit_theme_options',
  'sanitize_callback' => 'educational_sanitize_category',
  'default' =>  '1',
)
);

$wp_customize->add_control(new Educational_Customize_Dropdown_Taxonomies_Control($wp_customize,'educational_blog_category_id',
  array(
   'label' => __('Select Category for Blog','educational'),
   'section' => 'educational_frontpage_blog_section',
   'settings' => 'educational_blog_category_id',
   'type'=> 'dropdown-taxonomies',
 )
));

$wp_customize->add_setting( 'educational_blog_number', array(
  'capability'            => 'edit_theme_options',
  'default'               => '3',
  'sanitize_callback'     => 'absint'
));

$wp_customize->add_control( 'educational_blog_number', array(
  'label'                 =>  __( 'Number of Recent Blogs to Show in Front Page', 'educational' ),
  'description'           =>  __( 'input 3,4,5,6,7,8,9,10', 'educational' ),
  'section'               => 'educational_frontpage_blog_section',
  'type'                  => 'number',
  'settings' => 'educational_blog_number',
) );
}