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

function uxu_utils_scripts() {
  $js_url = plugins_url( 'uxu-utils/js/', __DIR__);
  wp_enqueue_script( 'moment.js', $js_url . 'moment.min.js');
  wp_enqueue_script( 'uxu.utils.js', $js_url . 'uxu.utils.js');
}
add_action( 'wp_enqueue_scripts', 'uxu_utils_scripts' );

function uxu_tickets_info(){
  $values = array(
    'current_ticket_url' => 'julius',
    'current_ticket_price' => '586',
    'current_ticket_left' => 30,
    'next_ticket_price' => '250',
    'tickets_sold' => 3000
  );
  return $values;
}
