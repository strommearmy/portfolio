<?php
/**
 * Demo configuration
 *
 * @package Educational
 */

$config = array(
	'static_page'    => 'home',
	'menu_locations' => array(
		'primary' 	=> 'primary'
	),
	'ocdi'           => array(
		array(
			'import_file_name'             => esc_html__( 'Import Educational Demo', 'educational' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/contents.xml',
      		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/widgets.wie',
      		'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/customizer.dat',
      		'import_notice'                => __( 'It will overwrite your settings', 'educational' ),
      		'preview_url'                  => 'https://wpcodethemes.com/educational/',
		),
		
	),
);

Educational_Demo::init( apply_filters( 'educational_demo_filter', $config ) );