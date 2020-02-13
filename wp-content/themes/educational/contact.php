<?php
/*
* Template Name: Contact page
*/	
get_header();
?>	
<section class="inner-wrapper inner-contact">

  <div class="map">
    <?php if ( is_active_sidebar( 'google-map' ) ) { ?>
      <?php dynamic_sidebar( 'google-map' );?>
    <?php } ?>
  </div>

  <div class="contact-block">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="main-title">
            <h3><?php the_title();?></h3>
          </div>

          <div class="contact-info">
            <?php
            $contact_no =  get_theme_mod( 'educational_contact_phone_number', __('(+123) 456 7890','educational') );
            $contact_email =  get_theme_mod( 'educational_contact_email_address', __('info.demo@example.com','educational') );
            $contact_address =  get_theme_mod( 'educational_contact_main_address', __('40 Barla Street 133/2 New York City, US','educational') );
            $contact_social =  get_theme_mod( 'educational_contact_social_link_text', __('Social Links','educational') );
            ?>
            <div class="block">
              <h5 class="title"><?php echo esc_html__('Phone','educational');?></h5>
              <a href="tel:<?php echo esc_attr($contact_no);?>"><span class="fa fa-phone" aria-hidden="true"></span><?php echo esc_html($contact_no);?></a>
            </div>
            <div class="block">
              <h5 class="title"><?php echo esc_html__('Email','educational');?></h5>
              <a href="mailto:<?php echo esc_attr($contact_email);?>"><span class="fa fa-envelope" aria-hidden="true"></span><?php echo esc_html ($contact_email);?></a>
            </div>
            <div class="block">
              <h5 class="title"><?php echo esc_html__('Address','educational');?></h5>
              <span class="fa fa-map-marker" aria-hidden="true"></span><?php echo esc_html($contact_address);?>
            </div>
            <div class="block">
              <h5 class="title"><?php echo esc_html( $contact_social );?></h5>
              <div class="social">
               <?php educational_contact_page_social_items();?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="main-title">
            <h3><?php echo esc_html__('Send a Message','educational');?></h3>
          </div>
          <?php if (get_theme_mod('educational_frontpage_contact_form_option')):
            echo do_shortcode(get_theme_mod('educational_frontpage_contact_form_option'));
          endif; ?> 
        </div>
      </div>
    </div>
  </div>
</section>

<?php 
get_footer(); 
?>