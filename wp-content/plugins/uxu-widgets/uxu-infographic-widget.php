<?php
class UxU_Infographic_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'uxu_infographic_widget', // Base ID
			'UxU Infographic', // Name
			array( 'description' => __( 'Displays the infographic for UxU', 'uxu' ), ) // Args
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
    $js_url = plugins_url( 'uxu-widgets/js/', __DIR__);
    $img_path = plugins_url( 'uxu-widgets/img/', __DIR__);
    $data = uxu_tickets_info();
    $data['imgPath'] = $img_path;
    wp_register_style( 'infographic-style', plugins_url('css/style.css', __FILE__) );
    wp_enqueue_style( 'infographic-style' );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'jquery_knob', $js_url . 'jquery.knob.js', array('jquery'));
    wp_enqueue_script( 'moment.js', $js_url . 'moment.min.js');
    wp_enqueue_script( 'uxu_infographic', $js_url . 'infographic.js', array('jquery'));
    wp_localize_script('uxu_infographic', 'info', $data);
		echo $before_widget;
    include_once dirname( __FILE__ ) . '/views/infographic.php';
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
		?>
		<p>
      This widget shows the infographic for the site
		</p>
		<?php 
	}

} // class Foo_Widget

// register Foo_Widget widget
add_action( 'widgets_init', create_function( '', 'register_widget( "uxu_infographic_widget" );' ) );
