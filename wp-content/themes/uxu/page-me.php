<?php
/*
 * Template Name: My Page
 * */
?>
<?php if ( !is_user_logged_in() ): ?>
  <?php wp_redirect( home_url('/login') ); ?>
<?php else: ?>
  <?php get_header(); ?>
  <?php if ( is_user_logged_in() ): ?>
    <?php global $current_user; ?>
    <?php get_currentuserinfo(); ?>
    <div class="uxu-user-page">
      <div class="uxu-user-festival-pass">
        <div class="uxu-user-festival-pass-info">
          <h2><?php _e('Mitt Festivalpass'); ?></h2>
          <h3><?php _e('Pris: ', 'uxu'); ?>650 kr</h3>
          <a href="#">› Skriv ut festivalpass</a>
        </div>
        <div class="uxu-share-pass-info">
          <h2>Nullam id dolor id nibh ultricies vehicula ut id elit.</h2>
          <a href="#" class="uxu-share-pass-info-btn">
            Dela på facebook
          </a>
        </div>
      </div>
      <div class="uxu-user-other-products">
        <?php if ( is_active_sidebar('uxu_other_user_info') ): ?>
          <?php dynamic_sidebar('uxu_other_user_info'); ?>
         <?php endif; ?>
      </div>
    </div>
    <div class="uxu-user-below">
      <?php if ( dynamic_sidebar('uxu_below_user_page') ) : ?> <?php endif; ?>
    </div>
  <?php get_footer(); ?>
<?php endif; ?>
