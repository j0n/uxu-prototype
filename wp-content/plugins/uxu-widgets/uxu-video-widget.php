<?php
/**
 * Adds UxU_Video_Widget widget.
 */
class UxU_Video_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'uxu_video_widget', // Base ID
			'UxU Video Widget', // Name
			array( 'description' => __( 'Display a video with oembed', 'uxu' ), ) // Args
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

		$video_url = $instance['video_url'];
		$video_title = $instance['video_title'];
		echo $before_widget;
		echo $before_title;
      echo $video_title;
		echo $after_title;
		if (!empty($video_url)) {
			echo wp_oembed_get($video_url, array('width'=>1100));
		}
		else { ?>
			<img src="http://placehold.it/1200x560&text=Video" alt="prototype-image" />
		<?php 
		}
		
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
		$instance['video_url'] = strip_tags( $new_instance['video_url'] );
		$instance['video_title'] = strip_tags( $new_instance['video_title'] );
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
		if ( isset( $instance[ 'video_url' ] ) ) {
			$video_url = $instance[ 'video_url' ];
		}
		else {
			$video_url = __( 'Video url', 'uxu' );
		}
		if ( isset( $instance[ 'video_title' ] ) ) {
			$video_title = $instance[ 'video_title' ];
		}
		else {
			$video_title = __( 'Title', 'uxu' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'video_url' ); ?>"><?php _e( 'Video Url:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'video_url' ); ?>" name="<?php echo $this->get_field_name( 'video_url' ); ?>" type="text" value="<?php echo esc_attr( $video_url ); ?>" />

		</p>
    <p>
		<label for="<?php echo $this->get_field_id( 'video_title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'video_title' ); ?>" name="<?php echo $this->get_field_name( 'video_title' ); ?>" type="text" value="<?php echo esc_attr( $video_title ); ?>" />
    </p>
		<?php 
	}

} // class Foo_Widget

// register Foo_Widget widget
add_action( 'widgets_init', create_function( '', 'register_widget( "uxu_video_widget" );' ) );
