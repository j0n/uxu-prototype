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

include_once dirname( __FILE__ ) . '/fields/products.php';
include_once dirname( __FILE__ ) . '/fields/artists.php';

add_action('init', 'create_post_type');

function create_post_type() {
  register_post_type('curators',
    array(
      'labels' => array(
        'name' => __('Curators', 'uxu' ),
        'singular_name' => __( 'Curator' )
      ),
      'public' => true,
      'supports' => array( 'title', 'editor', 'comments', 'post-templates', 'thumbnail'),
      'has_archive' => true,
      'rewrite' => array('slug' =>__('curator')),
    )
  );
  register_post_type('products',
    array(
      'labels' => array(
        'name' => __('Products', 'uxu' ),
        'singular_name' => __( 'Product' )
      ),
      'public' => true,
      'supports' => array( 'title', 'editor', 'comments', 'post-templates', 'thumbnail'),
      'has_archive' => true,
      'rewrite' => array('slug' =>__('product')),
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
