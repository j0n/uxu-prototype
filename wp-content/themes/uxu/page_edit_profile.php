<?php
/**
 * Template Name: Edit Profile Page
 *
 */
 
	/* Get user info. */
	global $current_user, $wp_roles;
	get_currentuserinfo();
  $fields = uxu_get_extra_user_fields();
  $updated = FALSE;

	/* Load the registration file. */
	require_once( ABSPATH . WPINC . '/registration.php' );
	require_once( ABSPATH . 'wp-admin/includes' . '/template.php' ); // this is only for the selected() function
  if (!function_exists('uxu_update_user')) {
    echo 'this is the prototype of UxU-site. please active uxu_userhandler plugin';
  }

	/* If profile was saved, update profile. */
	if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {
    $error = uxu_update_user($current_user);
    $updated = TRUE;
	}
?>
	
<?php   get_header(); ?>
	<div id="container">
		<div id="content">
			<div id="post-<?php the_ID(); ?>">
				<div class="entry-content">
              <?php the_content(); ?>
				</div>
			</div><!-- .post -->
			<?php if ( !is_user_logged_in() ) : ?>
				<p class="warning">
					<?php _e('You must be logged in to edit your profile.', 'frontendprofile'); ?>
				</p><!-- .warning -->
			<?php else : ?>
        <?php if ( $error ) : ?>
          <?php foreach ($error as $err): ?>
            <p class="error"><?php echo $err; ?></p>
          <?php endforeach; ?>
        <?php elseif ($updated) : ?>
           <p class="ok"><?php _e('Your profile is updated'); ?></p>
        <?php endif; ?>
				<form method="post" id="edituser" class="user-forms" action="<?php the_permalink(); ?>">
          <p class="first_name">
            <label for="first_name"><?php _e('First Name', 'frontendprofile'); ?></label>
            <input class="text-input" name="first_name" type="text" id="first_name" value="<?php the_author_meta( 'first_name', $current_user->id ); ?>" />
          </p><!-- .first_name -->
          
          <p class="last_name">
            <label for="last_name"><?php _e('Last Name', 'frontendprofile'); ?></label>
            <input class="text-input" name="last_name" type="text" id="last_name" value="<?php the_author_meta( 'last_name', $current_user->id ); ?>" />
          </p><!-- .last_name -->
          <p class="nickname">
            <label for="nickname"><?php _e('Nickname (required)', 'frontendprofile'); ?></label>
            <input class="text-input" name="nickname" type="text" id="nickname" value="<?php the_author_meta( 'nickname', $current_user->id ); ?>" />
          </p><!-- .nickname -->
          <p class="form-email">
            <label for="email"><?php _e('E-mail (requireded)', 'frontendprofile'); ?></label>
            <input class="text-input" name="email" type="text" id="email" value="<?php the_author_meta( 'user_email', $current_user->id ); ?>" />
          </p><!-- .form-email -->
          <?php foreach ($fields as $field) : ?>
            <p class="form-password">
              <label for="<?php echo $field['id']; ?>"><?php _e($field['title']); ?></label>
              <input class="text-input" name="<?php echo $field['id']; ?>" type="<?php echo $field['type']; ?>" id="uxu-user-<?php echo $field['id']; ?>" value="<?php the_author_meta( $field['id'], $current_user->id ); ?>" />
            </p>
          <?php endforeach; ?>
          <p class="form-password">
            <label for="pass1"><?php _e('New Password', 'frontendprofile'); ?> </label>
            <input class="text-input" name="pass1" type="password" id="pass1" />
          </p><!-- .form-password -->
          <p class="form-password">
            <label for="pass2"><?php _e('Repeat Password', 'frontendprofile'); ?></label>
            <input class="text-input" name="pass2" type="password" id="pass2" />
          </p>
          <p class="form-submit">
            <input name="updateuser" type="submit" id="updateuser" class="submit button" value="<?php _e('Update', 'frontendprofile'); ?>" />
            <?php wp_nonce_field( 'update-user' ) ?>
            <input name="action" type="hidden" id="action" value="update-user" />
          </p>
        </form>
			<?php endif; ?>

<?php get_footer(); ?>
