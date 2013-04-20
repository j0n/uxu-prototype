<?php
/*
 * Template Name: Login Page
 * */
?>
<?php get_header(); ?>
<?php if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'log-in' ) :
	global $error;
	$login = wp_login( $_POST['user-name'], $_POST['password'] );
	$login = wp_signon( array( 'user_login' => $_POST['user-name'], 'user_password' => $_POST['password'], 'remember' => $_POST['remember-me'] ), false );

  endif; ?>
<?php get_header(); ?>

			<div id="post-<?php the_ID(); ?>">
				<div class="entry-content">
          <?php the_content(); ?>
				</div>
      </div>
      <?php if ( is_user_logged_in() ) : // Already logged in ?>
        <?php global $user_ID; $login = get_userdata( $user_ID ); ?>
        <p class="alert">
          <?php printf( __('You are currently logged in as <a href="%1$s" title="%2$s">%2$s</a>.', 'frontendprofile'), get_author_posts_url( $login->ID ), $login->display_name ); ?> <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="<?php _e('Log out of this account', 'frontendprofile'); ?>"><?php _e('Log out &raquo;', 'frontendprofile'); ?></a>
        </p>
      <?php elseif ( $login->ID ) : // Successful login ?>
        <?php $login = get_userdata( $login->ID ); ?>
        <p class="alert">
          <?php printf( __('You have successfully logged in as <a href="%1$s" title="%2$s">%2$s</a>.', 'frontendprofile'), get_author_posts_url( $login->ID ), $login->display_name ); ?>
        </p>
      <?php else : // Not logged in ?>
        <?php if ( $error ) : ?>
          <p class="error">
            <?php echo $error; ?>
          </p><!-- .error -->
        <?php endif; ?>
        <form action="<?php the_permalink(); ?>" method="post" class="sign-in">
          <p class="login-form-username">
            <label for="user-name"><?php _e('Username', 'frontendprofile'); ?></label>
            <input type="text" name="user-name" id="user-name" class="text-input" value="<?php echo wp_specialchars( $_POST['user-name'], 1 ); ?>" />
          </p><!-- .form-username -->

          <p class="login-form-password">
            <label for="password"><?php _e('Password', 'frontendprofile'); ?></label>
            <input type="password" name="password" id="password" class="text-input" />
          </p><!-- .form-password -->

          <p class="login-form-submit">
            <input type="submit" name="submit" class="submit button" value="<?php _e('Log in', 'frontendprofile'); ?>" />
            <input class="remember-me checkbox" name="remember-me" id="remember-me" type="checkbox" checked="checked" value="forever" />
            <label for="remember-me"><?php _e('Remember me', 'frontendprofile'); ?></label>
            <input type="hidden" name="action" value="log-in" />
          </p><!-- .form-submit -->
          <p>
            <a href="<?php echo get_option('siteurl');  ?>/wp-login.php?action=lostpassword"><?php _e('Lost password?', 'frontendprofile'); ?></a>
          </p>
        </form><!-- .sign-in -->
    <?php endif; ?>
<?php get_footer(); ?>
