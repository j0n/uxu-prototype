<?php
/**
 * @package UxU
 */
/*
Plugin Name: UxU Userhandling
Plugin URI: http://j0n.se
Description: Plugin used for prototype of UxU site
Version: 0.0.1
Author: Jon
*/

include_once dirname( __FILE__ ) . '/uxu-userhandling-my-products-widget.php';
function uxu_get_extra_user_fields() {
  $fields = array(
    array(
      'title' => 'Address',
      'id' => 'address',
      'type' => 'text',
      'description' => 'Din address',
    ),
    array(
      'title' => 'Stad',
      'id' => 'city',
      'type' => 'text',
      'description' => 'Din address',
    ),
    array(
      'title' => 'Postnummer',
      'id' => 'zip',
      'type' => 'text',
      'description' => 'Din address',
    ),
    array(
      'title' => 'Land',
      'id' => 'country',
      'type' => 'text',
      'description' => 'Din address',
    ),
  );
  return $fields;
}
add_action( 'show_user_profile', 'show_extra_profile_fields', 10 );
add_action( 'edit_user_profile', 'show_extra_profile_fields', 10 );

function show_extra_profile_fields( $user ) { 
  $fields = uxu_get_extra_user_fields();
?>

	<table class="form-table">
    <?php foreach ($fields as $field) : ?>
      <tr>
        <th><label for="<?php echo $field['id']; ?>"><?php _e($field['title']); ?></label></th>
        <td>
          <input type="text" name="<?php echo $field['id']; ?>" id="uxu-<?php echo $field['id']; ?>" value="<?php echo esc_attr( get_the_author_meta( $field['id'], $user->ID ) ); ?>" class="regular-text" /><br />
          <span class="description"><?php _e($field['description']); ?></span>
        </td>
      </tr>
    <?php endforeach; ?>
	</table>
<?php }

add_action( 'personal_options_update', 'save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_profile_fields' );

function save_extra_profile_fields( $user_id ) {
	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;
  uxu_user_update_extra_fields($user_id);
}
function uxu_user_update_extra_fields($user_id){
  $fields = uxu_get_extra_user_fields();
  foreach ($fields as $field) {
    update_usermeta( $user_id, $field['id'], $_POST[$field['id']] );
}
  }


