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
include_once dirname( __FILE__ ) . '/uxu-userhangling-register.php';
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


function uxu_update_user($user) {
  $error = array();
  /* Update user password. */
  if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
    if ( $_POST['pass1'] == $_POST['pass2'] )
      wp_update_user( array( 'ID' => $user->id, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
    else
      array_push($error, __('The passwords you entered do not match.  Your password was not updated.'));
  }

  update_usermeta( $user->id, 'first_name', esc_attr( $_POST['first_name'] ) );
  update_usermeta( $user->id, 'last_name', esc_attr( $_POST['last_name'] ) );
  if ( !empty( $_POST['nickname'] ) ) {
    update_usermeta( $user->id, 'nickname', esc_attr( $_POST['nickname'] ) );
  }

  if (!empty($_POST['email'])){
    if(filter_var(esc_attr( $_POST['email'] ), FILTER_VALIDATE_EMAIL)) {
      wp_update_user( array ('ID' => $user->id, 'user_email' => esc_attr( $_POST['email'] )) ) ;
    }
    else {
      array_push($error, __('You have to enter a valid email.'));
    }
  }
  if (!empty( $_POST['website'])) {
    if(strpos($_POST['website'], 'ttp://')) {
      update_usermeta( $user->id, 'user_url', esc_attr( $_POST['website'] ) );
    }
    else {
      update_usermeta( $user->id, 'user_url', 'http://' . esc_attr( $_POST['website'] ) );
    }
  }
  uxu_user_update_extra_fields($user->id);
  return $error;
}
