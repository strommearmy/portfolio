<?php
/**
 * About configuration
 *
 * @package Educational
 */

$config = array(
	'menu_name' => esc_html__( 'Educational Setup', 'educational' ),
	'page_name' => esc_html__( 'Educational Setup', 'educational' ),

	/* translators: theme version */
	'welcome_title' => sprintf( esc_html__( 'Welcome to %s - ', 'educational' ), 'Educational' ),

	/* translators: 1: theme name */
	'welcome_content' => sprintf( esc_html__( 'We hope this page will help you to setup %1$s with few clicks. We believe you will find it easy to use and perfect for your website development.', 'educational' ), 'Educational' ),

	// Quick links.
	'quick_links' => array(
		'theme_url' => array(
			'text' => esc_html__( 'Theme Details','educational' ),
			'url'  => 'https://wpcodethemes.com/downloads/educational/',
		),
		'demo_url' => array(
			'text' => esc_html__( 'View Demo','educational' ),
			'url'  => 'https://wpcodethemes.com/educational/',
		),
		'documentation_url' => array(
			'text'   => esc_html__( 'Documentation','educational' ),
			'url'    => 'https://wpcodethemes.com/educational/wp-content/uploads/2019/04/Educational.pdf',
		),
		'upgrade_url' => array(
			'text'   => esc_html__( 'Upgrade to Pro','educational' ),
			'url'    => 'https://wpfactory.com/item/educational-wordpress-theme/',
			'button' => 'primary'
		),
	),

	// Tabs.
	'tabs' => array(
		'getting_started'     => esc_html__( 'Getting Started', 'educational' ),
		'recommended_actions' => esc_html__( 'Recommended Actions', 'educational' ),
		'support'             => esc_html__( 'Support', 'educational' ),
	),

	// Getting started.
	'getting_started' => array(
		array(
			'title'               => esc_html__( 'Theme Documentation', 'educational' ),
			'text'                => esc_html__( 'Find step by step instructions to setup theme easily.', 'educational' ),
			'button_label'        => esc_html__( 'View documentation', 'educational' ),
			'button_link'         => 'https://wpcodethemes.com/educational/wp-content/uploads/2019/04/Educational.pdf',
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		array(
			'title'               => esc_html__( 'Recommended Actions', 'educational' ),
			'text'                => esc_html__( 'We recommend few steps to take so that you can get complete site like shown in demo.', 'educational' ),
			'button_label'        => esc_html__( 'Check recommended actions', 'educational' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=educational-about&tab=recommended_actions' ) ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
		array(
			'title'               => esc_html__( 'Customize Everything', 'educational' ),
			'text'                => esc_html__( 'Start customizing every aspect of the website with customizer.', 'educational' ),
			'button_label'        => esc_html__( 'Go to Customizer', 'educational' ),
			'button_link'         => esc_url( wp_customize_url() ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
	),

	// Recommended actions.
	'recommended_actions' => array(
		'content' => array(
			'front-page' => array(
				'title'       => esc_html__( 'Setting Static Front Page','educational' ),
				'description' => esc_html__( 'Create a new page to display on front page ( Ex: Home ) and assign "Frontpage" template. Select a static page then Front page and Posts page to display front page specific sections. Note: Static page will be set automatically when you import demo content.', 'educational' ),
				'id'          => 'front-page',
				'check'       => ( 'page' === get_option( 'show_on_front' ) ) ? true : false,
				'help'        => '<a href="' . esc_url( wp_customize_url() ) . '?autofocus[section]=static_front_page" class="button button-secondary">' . esc_html__( 'Static Front Page', 'educational' ) . '</a>',
			),
			'contact-form-7' => array(
				'title'       => esc_html__( 'Contact Form 7', 'educational' ),
				'description' => esc_html__( 'Please install the Contact Form 7 plugin Before Importing Demo.', 'educational' ),
				'check'       => class_exists( 'OCDI_Plugin' ),
				'plugin_slug' => 'contact-form-7',
				'id'          => 'contact-form-7',
			),
			'newsletter' => array(
				'title'       => esc_html__( 'NewsLetter Plugin', 'educational' ),
				'description' => esc_html__( 'Please install the Newsletter Plugin Before Importing Demo.', 'educational' ),
				'check'       => class_exists( 'OCDI_Plugin' ),
				'plugin_slug' => 'newsletter',
				'id'          => 'newsletter',
			),

			'one-click-demo-import' => array(
				'title'       => esc_html__( 'One Click Demo Import', 'educational' ),
				'description' => esc_html__( 'Please install the One Click Demo Import plugin to import the demo content. After activation go to Appearance >> Import Demo Data and import it.', 'educational' ),
				'check'       => class_exists( 'OCDI_Plugin' ),
				'plugin_slug' => 'one-click-demo-import',
				'id'          => 'one-click-demo-import',
			),
		),
	),

	// Support.
	'support_content' => array(
		'first' => array(
			'title'        => esc_html__( 'Contact Support', 'educational' ),
			'icon'         => 'dashicons dashicons-sos',
			'text'         => esc_html__( 'If you have any problem, feel free to create ticket on our dedicated Support forum.', 'educational' ),
			'button_label' => esc_html__( 'Contact Support', 'educational' ),
			'button_link'  => esc_url( 'https://wpcodethemes.com/downloads/educational' ),
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'second' => array(
			'title'        => esc_html__( 'Theme Documentation', 'educational' ),
			'icon'         => 'dashicons dashicons-book-alt',
			'text'         => esc_html__( 'Kindly check our theme documentation for detailed information and video instructions.', 'educational' ),
			'button_label' => esc_html__( 'View Documentation', 'educational' ),
			'button_link'  => 'https://wpcodethemes.com/educational/wp-content/uploads/2019/04/Educational.pdf',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'third' => array(
			'title'        => esc_html__( 'Customization Request', 'educational' ),
			'icon'         => 'dashicons dashicons-admin-tools',
			'text'         => esc_html__( 'This is 100% free theme and has premium version.Either Upgrade to Pro or  Feel free to contact us any time if you need any customization service.', 'educational' ),
			'button_label' => esc_html__( 'Upgrade to Pro', 'educational' ),
			'button_link'  => '',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
	),


);
Educational_About::init( apply_filters( 'educational_about_filter', $config ) );