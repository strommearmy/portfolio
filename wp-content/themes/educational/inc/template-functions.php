<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package educational
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function educational_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'educational_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function educational_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'educational_pingback_header' );


// Top Header Contact Info
if( ! function_exists('educational_top_header_contact_info_items')):
	function educational_top_header_contact_info_items(){
		$defaults =  array(
			array(
				'icon' => '',
				'title' => '',
			),
			array(
				'icon' => '',
				'title' => '',
			)
		);
		$contact_items = get_theme_mod( 'top_header_contact_info_items', $defaults );
		if( $contact_items  ){ 
			foreach( $contact_items as $contact ){ ?>
				<li>
					<a href="#"><span class="<?php echo esc_attr($contact['icon']);?>" aria-hidden="true"></span><?php echo esc_html($contact['title']);?></a>
				</li>
				<?php
			}
		}
	}
endif;	

// Frontpage Counter items
if( ! function_exists( 'educational_counter_items')):
	function educational_counter_items(){
		$defaults =  array(
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
		);
		$counter_items = get_theme_mod( 'educational_counter_items', $defaults );
		if( $counter_items  ){ 
			foreach( $counter_items as $counter ){ ?>
				<div class="col-lg-4 col-md-4">
					<div class="img">
						<i class="<?php echo esc_attr( $counter['icon'] );?>" aria-hidden="true"></i>
					</div>
					<p><span><?php echo absint( $counter['number'] );?></span> <?php echo esc_html( $counter['title'] );?></p>
				</div>
				<?php
			}
		}
	}
endif;	


// Footer contact info
if( ! function_exists( 'educational_footer_contact_items')):
	function educational_footer_contact_items(){
		$defaults =  array(
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
		);
		$contact_items = get_theme_mod( 'educational_contact_info_items', $defaults );
		$contact_enable = get_theme_mod('footer_contact_info_enable');
		if( $contact_enable  ){ ?>
			<ul class="contact-info">
				<?php	foreach( $contact_items as $contact ){ ?>
					<li><a href="#"><span class="<?php echo esc_attr($contact['font']);?>" aria-hidden="true"></span><?php echo esc_html($contact['address']);?></a></li>
					<?php
				}?>
			</ul>
			<?php 
		}
	}
endif;	



// Footer Social items
if( ! function_exists( 'educational_footer_social_items')):
	function educational_footer_social_items(){
		$defaults =  array(
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
		);
		$social_items = get_theme_mod( 'educational_social_links', $defaults );
		$social_enable = get_theme_mod('footer_social_media_enable');
		if( $social_enable  ){ ?>
			<div class="social">
				<?php $social_text = get_theme_mod( 'educational_social_links_text', __( 'Social Links', 'educational' ) );?>
				<h4 class="title"><?php echo esc_html($social_text);?></h4>
				<ul class="social-links">
					<?php foreach( $social_items as $social ){ ?>

						<li><a href="<?php echo esc_url($social['link']);?>"><span class="<?php echo esc_attr($social['font']);?>" aria-hidden="true"></span></a></li>

						<?php
					}?>
				</ul>
			</div>	
			<?php
		}
	}
endif;	


// Contact Page Social items
if( ! function_exists( 'educational_contact_page_social_items')):
	function educational_contact_page_social_items(){
		$defaults =  array(
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
		);
		$social_items = get_theme_mod( 'educational_contact_social_links', $defaults );
		
		if( $social_items  ){ ?>
			
			<ul class="social-links">
				<?php foreach( $social_items as $social ){ ?>

					<li><a href="<?php echo esc_url($social['link']);?>"><span class="<?php echo esc_attr($social['font']);?>" aria-hidden="true"></span></a></li>

					<?php
				}?>
			</ul>
			<?php
		}
	}
endif;	