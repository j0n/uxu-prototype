<div class="uxu-login-register-box uxu-login-box" id="theme-my-login<?php $template->the_instance(); ?>">
  <h3><?php _e('Login'); ?></h3>
	<?php $template->the_action_template_message( 'login' ); ?>
	<?php $template->the_errors(); ?>
	<form name="loginform" id="loginform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'login' ); ?>" method="post">
		<p>
			<label for="user_login<?php $template->the_instance(); ?>"><?php _e( 'Username' ); ?></label>
			<input type="text" name="log" id="user_login<?php $template->the_instance(); ?>" class="input" value="<?php $template->the_posted_value( 'log' ); ?>" size="20" />
		</p>
		<p>
			<label for="user_pass<?php $template->the_instance(); ?>"><?php _e( 'Password' ); ?></label>
			<input type="password" name="pwd" id="user_pass<?php $template->the_instance(); ?>" class="input" value="" size="20" />
		</p>

		<?php do_action( 'login_form' ); ?>

		<p class="forgetmenot">
			<input name="rememberme" type="checkbox" id="rememberme<?php $template->the_instance(); ?>" value="forever" />
			<label for="rememberme<?php $template->the_instance(); ?>"><?php esc_attr_e( 'Remember Me' ); ?></label>
		</p>
    <?php $template->the_action_links( array( 'login' => false ) ); ?>
		<p class="submit">
			<input type="submit" name="wp-submit" class="button" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( 'Log In' ); ?>" />
			<input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'login' ); ?>" />
			<input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
			<input type="hidden" name="action" value="login" />
		</p>
    <a class="button uxu-facebook-button">Logga in med facebook</a>
	</form>
</div>

