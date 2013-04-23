<?php
/**
 * @package UxU
 */
/*
Plugin Name: UxU Tickets
Plugin URI: http://j0n.se
Description: Plugin used for prototype of UxU site
Version: 0.0.1
Author: Jon
*/


class UxU_Tickets_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'uxu_tickets_widget', // Base ID
			'UxU Tickets Widget', // Name
			array( 'description' => __( 'Displays current ticket status', 'uxu' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
    $js_url = plugins_url( 'uxu-tickets/js/', __DIR__);
    wp_enqueue_script( 'uxu.ticket.js', $js_url . 'uxu-tickets.js', array('jquery'));
    $data = uxu_tickets_info();
    wp_localize_script('uxu.ticket.js', 'info', $data);
		echo $before_widget;
    $values = uxu_tickets_info();
    include_once dirname( __FILE__ ) . '/view.php';
		echo $after_widget;
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
	}

} // class Foo_Widget

// register Foo_Widget widget
add_action( 'widgets_init', create_function( '', 'register_widget( "uxu_tickets_widget" );' ) );




