 <?php if(get_theme_mod('educational_service_enable')):?>
 <section class="services mgb-lg">
  <div class="container">
    <div class="row">
      <?php
      $service_catId = esc_attr(get_theme_mod( 'educational_service_category_id'));
      $service_number = get_theme_mod('educational_service_number');
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => $service_number,
        'post_status' => 'publish',
        'cat' => $service_catId,

      );
      $serviceloop = new WP_Query($args);
      if ( $serviceloop->have_posts() ) :
        while ($serviceloop->have_posts()) : 
          $serviceloop->the_post(); 
          ?>
          <div class="col-lg-3 col-md-6">
            <div class="icon-holder">
              <?php if(has_post_thumbnail(  )):
                the_post_thumbnail();
              endif;?>
            </div>
            <h4><?php the_title();?></h4>
            <?php the_excerpt();?>
          </div>
        <?php endwhile;
      endif;
      wp_reset_postdata();
      ?>      
    </div>
  </div>
</section>
<?php endif;?>