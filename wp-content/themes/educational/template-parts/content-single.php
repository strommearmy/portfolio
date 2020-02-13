<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package educational
 */

?>

<div class="detail-holder">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="img-holder">
			<?php if(has_post_thumbnail()): 
				the_post_thumbnail( 'medium',array('class'=>'img-responsive') );
			endif;?>
			<span class="tag"><?php educational_posted_on();?></span>
		</div>
		<h3 class="title"><?php the_title();?></h3>
		<?php the_content();?>

		<div class="author">
			<div class="media">
				<div class="img">
					<?php echo get_avatar(get_the_author_meta( 'ID' ),'','','',array('width'=>100,'height'=>100));?>
				</div>
				<div class="media-body">
					<h6 class="mt-0"><?php echo esc_html(get_the_author());?></h6>
					<span class="author-info"><?php echo esc_html__('Author','educational');?></span>
				</div>
			</div>
			<div class="text">
				<p><?php echo esc_html(get_the_author_meta('description'));?></p>
			</div>
		</div>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages: ', 'educational' ),
			'after'  => '</div>',
		) );
		?>
	</article>
</div>