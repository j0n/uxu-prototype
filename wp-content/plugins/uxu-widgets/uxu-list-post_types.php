<?php
/**
 * Adds UxU_Video_Widget widget.
 */
class UxU_Posttype_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'uxu_posttype_widget', // Base ID
			'UxU List Posts', // Name
			array( 'description' => __( 'Display a list of post that is of a certant type', 'uxu' ), ) // Args
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
    $post_types=get_post_types(array(
      'public' => true,
      '_builtin' => false,
    )); 

		$uxu_post_type = $instance['uxu_post_type'];
		$uxu_post_type_loop = $instance['uxu_post_type_loop'];
    if (empty($uxu_post_type_loop)) {
      $uxu_post_type_loop = 'index';
    }
		$uxu_posttype_amount = $instance['uxu_posttype_amount'];
		$uxu_title = $instance['uxu_title'];
		echo $before_widget;
		echo $before_title;
      echo $uxu_title;
		echo $after_title;
		if (!empty($uxu_post_type)) { 
      query_posts( 'post_type='.$uxu_post_type.'&posts_per_page='.$uxu_posttype_amount );
      get_template_part( 'loop', $uxu_post_type_loop);
      wp_reset_query(); 
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
		$instance['uxu_post_type'] = strip_tags( $new_instance['uxu_post_type'] );
		$instance['uxu_post_type_loop'] = strip_tags( $new_instance['uxu_post_type_loop'] );
		$instance['uxu_title'] = strip_tags( $new_instance['uxu_title'] );
    $amount = strip_tags( $new_instance['uxu_postype_amount'] );
    if (!is_numeric($amount)) {
      $amount = 4;
    }
		$instance['uxu_posttype_amount'] = $amount;
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
		if ( isset( $instance[ 'uxu_post_type' ] ) ) {
			$uxu_post_type = $instance[ 'uxu_post_type' ];
		}
		else {
			$uxu_post_type = __( 'Enter post type', 'uxu' );
		}
		if ( isset( $instance[ 'uxu_title' ] ) ) {
			$uxu_title = $instance[ 'uxu_title' ];
		}
		else {
			$uxu_title = __( 'Title', 'uxu' );
		}
		if ( isset( $instance[ 'uxu_posttype_amount' ] ) ) {
			$uxu_posttype_amount = $instance[ 'uxu_posttype_amount' ];
		}
		else {
      $uxu_posttype_amount = 4;
		}
		if ( isset( $instance[ 'uxu_post_type_loop' ] ) ) {
			$uxu_post_type_loop = $instance[ 'uxu_post_type_loop' ];
		}
		else {
      $uxu_post_type_loop = 'loop type';
		}

    $post_types = get_post_types(array(
      'public' => true,
      '_builtin' => false,
    )); 
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'uxu_post_type' ); ?>"><?php _e( 'Video Url:' ); ?></label> 
    <select id="<?php echo $this->get_field_id( 'uxu_post_type' ); ?>" name="<?php echo $this->get_field_name( 'uxu_post_type' ); ?>">
      <?php foreach($post_types as $type) : ?>
        <?php if($type == $uxu_post_type): ?>
          <option value="<?php echo $type; ?>" selected>
        <?php else: ?>
          <option value="<?php echo $type; ?>">
        <?php endif ?>
          <?php echo $type; ?>
        </option>
      <?php endforeach; ?>
    </select>
		</p>
    <p>
      <label for="<?php echo $this->get_field_id( 'uxu_title' ); ?>"><?php _e( 'Title:' ); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'uxu_title' ); ?>" name="<?php echo $this->get_field_name( 'uxu_title' ); ?>" type="text" value="<?php echo esc_attr( $uxu_title ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'uxu_postype_amount' ); ?>"><?php _e( 'Amount:' ); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'uxu_postype_amount' ); ?>" name="<?php echo $this->get_field_name( 'uxu_postype_amount' ); ?>" type="text" value="<?php echo esc_attr($uxu_posttype_amount); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'uxu_post_type_loop' ); ?>"><?php _e( 'Loop type (advance dont touch if dont know what you are doing) :' ); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'uxu_post_type_loop' ); ?>" name="<?php echo $this->get_field_name( 'uxu_post_type_loop' ); ?>" type="text" value="<?php echo esc_attr($uxu_post_type_loop); ?>" />
    </p>
		<?php 
	}

} // class Foo_Widget

// register Foo_Widget widget
add_action( 'widgets_init', create_function( '', 'register_widget( "uxu_posttype_widget" );' ) );
