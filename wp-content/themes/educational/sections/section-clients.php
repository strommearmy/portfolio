 <?php 
 $t_title = get_theme_mod( 'educational_tetimonials_text', __( 'Our Happy Clients', 'educational' ) );
 if(get_theme_mod('educational_testimonials_enable')):
   ?>
   <section class="clients mgb-lg">
    <div class="container">
      <div class="main-title">
        <h2><?php echo esc_html( $t_title);?></h2>
      </div>
      <div class="client-block">
       <?php  
       $t_category_id =  get_theme_mod('educational_testimonials_category_id');
       $t_number =  get_theme_mod('educational_testimonials_number');
       $args = array(
        'post_type' => 'post',
        'posts_per_page' => $t_number,
        'post_status' => 'publish',
        'paged' => 1,
        'cat' => $t_category_id,

      );
       $tloop = new WP_Query($args);
       if ( $tloop->have_posts() ) :
        while ($tloop->have_posts()) : $tloop->the_post(); 
          ?>
          <div class="client-holder">
            <div class="info">
              <?php the_content();?>
            </div>
            <h5><?php the_title();?></h5>
            <?php if(has_post_thumbnail()):?>
              <div class="img">
                <?php the_post_thumbnail( 'educational-testimonials-92x92' );?>
              </div>
            <?php endif;?>
          </div>
        <?php endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </div>
  </div>
</section>
<?php endif;?>