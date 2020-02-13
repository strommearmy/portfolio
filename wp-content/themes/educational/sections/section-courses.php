<?php
$p_enable = get_theme_mod( 'educational_course_enable' );
$p_text = get_theme_mod( 'educational_popular_courses', __( 'Popular Courses', 'educational' ) );
if($p_enable):
  ?>
  <section class="courses courses-slider mgb-lg">
    <div class="container">
      <div class="main-title">
        <h2><?php echo esc_html($p_text);?></h2>
      </div>
      <div class="row">
       <?php $k=1; 
       for($i=1;$i<7;$i++){
        $course_page[$k]=get_theme_mod('educational_course_title_'.$i);
        $k=$k+1;
      }

      $args = array (
        'post_type' => 'page',
        'post_per_page' => $k,
        'posts_per_page'=>7,
        'post__in'         => $course_page,
        'orderby'           =>'post__in',
      );

      $courseloop = new WP_Query($args);
      $j=1;

      if ($courseloop->have_posts()) :  while ($courseloop->have_posts()) : $courseloop->the_post();?>
        <div class="col-lg-4">
          <div class="card">
            <?php if(has_post_thumbnail()):?>
              <a href="<?php the_permalink();?>" class="img-holder">
                <?php the_post_thumbnail( 'educational-courses-290x201' );?>
              </a>
            <?php endif;?>
            <div class="card-body">
              <a href="<?php the_permalink();?>"><h4 class="card-title"><?php the_title();?></h4></a>
              <?php the_excerpt();?>
            </div>
          </div>
        </div>
        <?php $j=$j+1; endwhile;
        wp_reset_postdata();  
      endif; ?>
    </div>
  </div>
</section>
<?php endif;?>  