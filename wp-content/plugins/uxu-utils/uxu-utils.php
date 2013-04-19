<?php
/**
 * @package UxU
 */
/*
Plugin Name: UxU Utils
Plugin URI: http://jonandersson.se
Description: Plugin used UxU utilis for the prototype
Version: 0.0.1
Author: Jon
*/
add_action('init', 'create_post_type');

function create_post_type() {
  register_post_type('curators',
    array(
      'labels' => array(
        'name' => __('Curators', 'ux' ),
        'singular_name' => __( 'Curator' )
      ),
      'public' => true,
      'supports' => array( 'title', 'editor', 'comments', 'post-templates', 'thumbnail'),
      'has_archive' => true,
      'rewrite' => array('slug' =>__('curator')),
    )
  );
  register_post_type('artists',
    array(
      'labels' => array(
        'name' => __('Artists', 'uxu' ),
        'singular_name' => __( 'Artist' )
      ),
      'public' => true,
      'supports' => array( 'title', 'editor', 'comments', 'post-templates', 'thumbnail'),
      'has_archive' => true,
      'rewrite' => array('slug' =>'artist'),
    )
  );
}
