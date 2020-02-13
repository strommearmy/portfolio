<?php if(get_theme_mod( 'educational_about_enable' )):
  $about[1] = get_theme_mod('educational_frontpage_about_title_option');
  $args = array (
    'post_type' => 'page',
    'post_per_page' => 1,
    'post__in'         => $about,
    'orderby'           =>'post__in',
  );
  $aboutloop = new WP_Query($args);
  if($aboutloop->have_posts()) :  while ($aboutloop->have_posts()) : $aboutloop->the_post(); 
    ?>
    <section class="about mgb-lg">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="main-title">
              <h2><?php the_title();?></h2>
            </div>
            <?php the_content();?>
          </div>
          <div class="col-lg-5">
            <div class="img-holder">
              <?php if(has_post_thumbnail()):
               the_post_thumbnail( 'educational-about-712x458' ); 
             endif;?>
           </div>
         </div>
       </div>
     </div>
   </section>
   <?php 
 endwhile;
 wp_reset_postdata();  
endif; 
endif;?>