<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package educational
 */

?>

<div class="col-md-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="card">
			<a href="#" class="img-holder">
				<?php if(has_post_thumbnail()): 
					the_post_thumbnail( 'medium', array( 'class' => 'img-responsive' ) );
				endif;?>
				<span class="tag"><?php educational_posted_on();?></span>
			</a>
			<div class="card-body">
				<a href="<?php the_permalink();?>"><h4 class="card-title"><?php the_title();?></h4></a>
				<?php the_content();?>
				<ul class="btm-info">
					<li><span class="fa fa-user" aria-hidden="true"></span><?php educational_posted_by();?></li>
					<li><span class="fa fa-comments" aria-hidden="true"></span> <?php echo esc_html(get_comments_number());?></li>
				</ul>
			</div>
		</div>
	</article>
</div>

</article><!-- #post-<?php the_ID(); ?> -->
