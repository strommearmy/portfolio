
<?php if(get_theme_mod('educational_counter_enable')):?>
  <section class="info-counter mgb-lg">
    <div class="container">
      <div class="counter-holder">
        <div class="row">

          <?php educational_counter_items();?>
          
        </div>
      </div>
    </div>
  </section>
  <?php endif;?>