<?php
/*
 * Template Name: My Page
 * */
?>
<?php get_header(); ?>
<?php if ( is_user_logged_in() ): ?>
  <?php global $current_user; ?>
  <?php get_currentuserinfo(); ?>
  <?php var_dump($current_user); ?>
   <?php site_url(); ?>
<?php else: ?>
  <?php wp_redirect( home_url('/wp-admin/') ); ?>
<?php endif; ?>
<?php get_footer(); ?>
