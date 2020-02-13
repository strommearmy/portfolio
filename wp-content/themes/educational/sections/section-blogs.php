 <?php 
 $t_title = get_theme_mod( 'educational_blog_text', __( 'Latest Blog', 'educational' ) );
 if(get_theme_mod('educational_blog_enable')):
   ?>
   <section class="blog blog-slider mgb-lg">
    <div class="container">
      <div class="main-title">
        <h2><?php echo esc_html($t_title);?></h2>
      </div>
      <div class="row">
       <?php  
       $blog_Category_id =  get_theme_mod('educational_blog_category_id');
       $blog_number =  get_theme_mod('educational_blog_number');
       $args = array(
        'post_type' => 'post',
        'posts_per_page' => $blog_number,
        'post_status' => 'publish',
        'paged' => 1,
        'cat' => $blog_Category_id,

      );
       $blogloop = new WP_Query($args);
       if ( $blogloop->have_posts() ) :
        while ($blogloop->have_posts()) : $blogloop->the_post(); 
          ?>
          <div class="col-lg-4">
            <div class="card">
              <a href="<?php the_permalink();?>" class="img-holder">
                <?php if(has_post_thumbnail()){
                  the_post_thumbnail( 'educational-blogs-290x201' );
                }?>
                <span class="tag"><?php educational_posted_on();?></span>
              </a>
              <div class="card-body">
                <a href="<?php the_permalink();?>"><h4 class="card-title"><?php the_title();?></h4></a>
                <?php the_excerpt();?>
                <ul class="btm-info">
                  <li><span class="fa fa-user" aria-hidden="true"></span><?php educational_posted_by();?></li>
                  <li><span class="fa fa-comments" aria-hidden="true"></span> <?php echo esc_html(get_comments_number());?></li>
                </ul>
              </div>
            </div>
          </div>
        <?php endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </div>
  </div>
</section>
<?php endif;?>  
