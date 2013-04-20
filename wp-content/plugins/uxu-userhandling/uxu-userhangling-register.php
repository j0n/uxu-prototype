<?php
/* Load registration file. */
require_once( ABSPATH . WPINC . '/registration.php' );

function uxu_register_user() {
  if (is_user_logged_in() ) {
      wp_redirect( home_url().'/your-settings' ); exit;
  }
  $new_user = FALSE;
  $error = FALSE;
  if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'adduser' ) {
    $userdata = array(
      'user_pass' => esc_attr( $_POST['pass1'] ),
      'user_login' => esc_attr( $_POST['user_name'] ),
      'role' => get_option( 'default_role' ),
      'user_email' => esc_attr( $_POST['email'] ),
    );

    if ( !$userdata['user_login'] )
      $error = __('A username is required for registration.', 'frontendprofile');
    elseif ( username_exists($userdata['user_login']) )
      $error = __('Sorry, that username already exists!', 'frontendprofile');

    elseif ( !is_email($userdata['user_email'], true) )
      $error = __('You must enter a valid email address.', 'frontendprofile');
    elseif ( email_exists($userdata['user_email']) )
      $error = __('Sorry, that email address is already used!', 'frontendprofile');

    elseif (empty($_POST['pass1'])) {
      $error = __('You have to enter a password', 'frontendprofile');
    }
    else if ($_POST['pass1'] != $_POST['pass2'] ){
      $error = __('The passwords you entered do not match.  Your password was not updated.');
    }

    else{
      $new_user = wp_insert_user( $userdata );
      wp_new_user_notification($new_user, $user_pass);
      $creds = array();
      $creds['user_login'] = $userdata['user_login'];
      $creds['user_password'] = $userdata['user_pass'];
      $creds['remember'] = true;
      $user = wp_signon( $creds, false );
      if ( is_wp_error($user) ) {
        echo $user->get_error_message();
      }
      else {
        wp_redirect( home_url().'/your-settings' ); exit;
      }
    }
  }
  return array(
    'user' => $new_user,
    'error' => $error,
  );
}
?>
