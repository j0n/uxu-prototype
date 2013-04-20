<?php
/**
 * The Template for displaying all single posts.
 *
 */
get_header(); ?>
  <?php get_template_part( 'loop', get_post_type() ); ?>
<?php get_footer(); ?>
