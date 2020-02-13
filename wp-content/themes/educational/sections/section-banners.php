 <?php if(get_theme_mod('educational_slider_enable')) : ?>
  <section class="banner mgb-lg">
    <?php $k=1; 
    for($i=1;$i<7;$i++){
      $slider_page[$k]=get_theme_mod('educational_slider_title_'.$i);
      $slider_button_1_title[$k]=get_theme_mod('educational_slider_button_1_title_'.$i);
      $slider_button_1_url[$k]=get_theme_mod('educational_slider_button_1_url_'.$i);
      $k=$k+1;
    }

    $args = array (
      'post_type' => 'page',
      'post_per_page' => $k,
      'posts_per_page'=>7,
      'post__in'         => $slider_page,
      'orderby'           =>'post__in',
    );
    $sliderloop = new WP_Query($args);
    $j=1;
    if ($sliderloop->have_posts()) :  while ($sliderloop->have_posts()) : $sliderloop->the_post();?>
      <div class="item">
        <div class="img-holder">
          <?php 
          if(has_post_thumbnail()):
            the_post_thumbnail( 'educational-banner-1198x624' );
          endif;
          ?>  
          <div class="caption">
            <h1><?php the_title();?></h1>
            <?php if($slider_button_1_title[$j]): ?>
              <a href="<?php echo esc_url($slider_button_1_url[$j]); ?>" class="btn btn-lg">
                <?php echo esc_html($slider_button_1_title[$j]); ?><span class="fa fa-angle-right" aria-hidden="true"></span>
              </a>
            <?php endif;?>
          </div>
        </div>
      </div>
      <?php $j=$j+1; endwhile;
      wp_reset_postdata();  
    endif; ?>
  </section>
<?php endif;?>
