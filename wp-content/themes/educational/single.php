<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package educational
 */

get_header();
?>

<section class="inner-wrapper">
	<div class="bdetail-block">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'single' );

						the_post_navigation();

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
					endif;

					endwhile; // End of the loop.
					?>

				</div>
				<div class="col-lg-4">
					<div class="sidebar">
						<?php get_sidebar();?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
?>