<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package educational
 */

get_header();
?>
<section class="inner-wrapper inner-blog">
	<div class="blog-block blog">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="row blog-holder">
						<?php if ( have_posts() ) : ?>

							<header class="page-header">
								<h1 class="page-title">
									<?php
									/* translators: %s: search query. */
									printf( esc_html__( 'Search Results for: %s', 'educational' ), '<span>' . get_search_query() . '</span>' );
									?>
								</h1>
							</header><!-- .page-header -->

							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'search' );

							endwhile;

							the_posts_navigation();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>
					</div>
					<nav class="pagination-holder">
						<?php educational_portfolio_bs_pagination();?>
					</nav>
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