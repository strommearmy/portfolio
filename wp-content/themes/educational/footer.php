<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package educational
 */

?>

<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="f-about">
					<?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
						<?php dynamic_sidebar( 'footer-1' );?>
					<?php } ?>
					<?php educational_footer_contact_items();?>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<?php if ( is_active_sidebar( 'footer-2' ) ) { ?>
					<?php dynamic_sidebar( 'footer-2' );?>
				<?php } ?>
				
				<?php educational_footer_social_items();?>	
			</div>
			<div class="col-lg-4">
				<?php if ( is_active_sidebar( 'footer-3' ) ) { ?>
					<?php dynamic_sidebar( 'footer-3' );?>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="copyright">
		<div class="container">
			<p><?php esc_html_e('&copy; All Right Reserved ','educational');  echo  esc_html(date('Y'));?> <a href="<?php echo esc_url(home_url());?>"></a></p>
			<p><?php esc_html_e('Powered By ','educational');?> <?php esc_html(bloginfo('name')); ?></p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>