<?php
/**
 * Adds UxU_Video_Widget widget.
 */
class UxU_Users_Products_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'uxu_users_products_widget', // Base ID
			'UxU Users Products', // Name
			array( 'description' => __( 'Display a list of products that this users purchased', 'uxu' ), ) // Args
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
		$uxu_title = $instance['uxu_title'];
		echo $before_widget;
		echo $before_title;
      echo $uxu_title;
		echo $after_title;
    query_posts( 'post_type=products');
    include_once dirname( __FILE__ ) . '/templates/my-products-list.php';
    wp_reset_query(); 
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
		$instance['uxu_title'] = strip_tags( $new_instance['uxu_title'] );
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
		
		if ( isset( $instance[ 'uxu_title' ] ) ) {
			$uxu_title = $instance[ 'uxu_title' ];
		}
		else {
			$uxu_title = __( 'Title', 'uxu' );
		}
		?>
    <p>
      <label for="<?php echo $this->get_field_id( 'uxu_title' ); ?>"><?php _e( 'Title:' ); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'uxu_title' ); ?>" name="<?php echo $this->get_field_name( 'uxu_title' ); ?>" type="text" value="<?php echo esc_attr( $uxu_title ); ?>" />
    </p>
		<?php 
	}

} // class Foo_Widget

// register Foo_Widget widget
add_action( 'widgets_init', create_function( '', 'register_widget( "uxu_users_products_widget" );' ) );
