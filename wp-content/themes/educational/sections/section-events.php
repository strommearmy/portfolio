 <?php 
 $event_title = get_theme_mod( 'educational_events_text', __( 'Latest Events', 'educational' ) );
 $event_details_text = get_theme_mod( 'educational_events_details_text', __( 'View Details', 'educational' ) );
 if(get_theme_mod('educational_events_enable')):
   ?>
   <section class="event event-slider mgb-lg">
    <div class="container">
      <div class="main-title">
        <h2><?php echo esc_html($event_title);?></h2>
      </div>
      <div class="media-block">
        <?php  
        $event_category_id =  get_theme_mod('educational_events_category_id');
        $event_number =  get_theme_mod('educational_events_number');
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => $event_number,
          'post_status' => 'publish',
          'paged' => 1,
          'cat' => $event_category_id,

        );
        $blogsloop = new WP_Query($args);
        if ( $blogsloop->have_posts() ) :
          while ($blogsloop->have_posts()) : $blogsloop->the_post(); 
            ?>
            <div class="media-holder">
              <div class="media">
                <?php if(has_post_thumbnail('')):?>
                  <a href="<?php the_permalink();?>" class="img-holder">
                    <?php the_post_thumbnail( 'educational-event-410x220' );?>
                  </a>
                <?php endif;?>
                <div class="media-body">
                  <a href="<?php the_permalink();?>"><h4 class="mt-0"><?php the_title();?></h4></a>
                  <div class="date"><span class="fa fa-calendar" aria-hidden="true"></span>&nbsp; <?php educational_posted_on();?></div>
                  <?php the_excerpt();?>
                  <a href="<?php the_permalink();?>" class="event-details"><?php echo esc_html( $event_details_text );?> &nbsp;<span class="fa fa-angle-double-right" aria-hidden="true"></span></a>
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