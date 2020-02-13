<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package educational
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <header class="header--fixed">
   <?php 
   if(get_theme_mod( 'educational_top_header_enable' ) == '1'){
    get_template_part( 'header-parts/header','top' );
  }

  get_template_part( 'header-parts/header','bottom' );
  ?>
</header>

<?php if( is_home() || (!is_front_page()) || !(is_page_template('template-home.php'))):?>
<!-- Breadcrumb -->
<div class="top-block">
  <div class="top-title" style="background: url(<?php if(has_header_image()):echo esc_url(get_header_image());endif;?>);">
   <?php if(is_home()): ?>
    <h2><?php bloginfo('name'); ?></h2>
    <?php else: ?>
      <h2><?php if ( is_archive() ) {
        the_archive_title( '<h2>', '</h2>' );
      }
      else{
        echo '<h2>';
        echo esc_html( get_the_title() );
        echo '</h2>';
      } ?></h2>
    <?php endif; ?>
  </div>
  <div class="breadcrumb-holder">
    <div class="container">

      <?php if(is_home()): ?>
        <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url());?>"><?php bloginfo('name'); ?></a></li>
        <?php else:?> 
          <?php breadcrumb_trail(); ?>
        <?php endif; ?>

      </div>
    </div>
  </div>
  <?php endif;?>