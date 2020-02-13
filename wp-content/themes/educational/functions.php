<?php
/**
 * educational functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package educational
 */

if ( ! function_exists( 'educational_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function educational_setup() {
	
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'educational-banner-1198x624', 1198, 624, true );
		add_image_size( 'educational-about-712x458', 712, 458, true );
		add_image_size( 'educational-courses-290x201', 290, 201, true );
		add_image_size( 'educational-teacher-50x50', 50, 50, true );
		add_image_size( 'educational-event-410x220', 410, 220, true );
		add_image_size( 'educational-testimonials-92x92', 92, 92, true );
		add_image_size( 'educational-blogs-290x201', 290, 201, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'educational' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'educational_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'educational_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function educational_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'educational_content_width', 640 );
}
add_action( 'after_setup_theme', 'educational_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function educational_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'educational' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'educational' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Footer widget 1', 'educational' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'educational' ),
		'before_widget' => '<div id="%1$s" class="info widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="title widget-title">',
		'after_title'   => '</h4>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Footer widget 2', 'educational' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'educational' ),
		'before_widget' => '<div id="%1$s" class="newsletter widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="title widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer widget 3', 'educational' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'educational' ),
		'before_widget' => '<div id="%1$s" class="e-images widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Google map iframe', 'educational' ),
		'id'            => 'google-map',
		'description'   => __( 'Add widgets here.', 'educational' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'educational_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
require get_template_directory(). '/inc/enqueue.php';


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';


/**
 * Bootstrap Navwalker
 */
require get_template_directory() . '/inc/wp-bootstrap-navwalker.php';


require get_template_directory() . '/inc/customizer/customizer-partials-function.php';


require_once get_template_directory() . '/inc/breadcrumbs.php';


/*Bootstrap Pagination Function*/

function educational_portfolio_bs_pagination($pages = '', $range = 4)
{  
	$showitems = ($range * 2) + 1;  
	$paged = get_query_var( 'paged');

	if(empty($paged)) $paged = 1;
	if($pages == '')
	{
		global $wp_query; 
		$pages = $wp_query->max_num_pages;
		if(!$pages)
		{
			$pages = 1;
		}
	}   

	if(1 != $pages)
	{
		echo '<ul class="pagination">';
		for ($i=1; $i <= $pages; $i++)
		{
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			{
				echo ($paged == $i)? "<li class=\"page-item active\"><a href='".esc_url(get_pagenum_link($i))."' class='page-link'>".esc_html($i)."</a></li>":"<li class='page-item'><a href='".esc_url(get_pagenum_link($i))."' class='page-link'>".esc_html($i)."</a></li>";
			}
		}

		if ($paged < $pages ) echo "<li class='page-item next'><a href=\"".esc_url(get_pagenum_link($paged + 1))."\" class='page-link'>".esc_html__('Next Page','educational')."</a></li>";  
		echo "</ul>";
	}
}


if ( is_admin() ) {
	// Load about.
	
	require_once trailingslashit( get_template_directory() ) . 'inc/theme-info/class-about.php';
	require_once trailingslashit( get_template_directory() ) . 'inc/theme-info/about.php';

	// Load demo.
	require_once trailingslashit( get_template_directory() ) . 'inc/demo/class-demo.php';
	require_once trailingslashit( get_template_directory() ) . 'inc/demo/demo.php';
}
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}