<?php
/**
 * Template Name: Log In Page
 *
 */

if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'log-in' ) :

	global $error;
	$login = wp_login( $_POST['user-name'], $_POST['password'] );
	$login = wp_signon( array( 'user_login' => $_POST['user-name'], 'user_password' => $_POST['password'], 'remember' => $_POST['remember-me'] ), false );

endif;
 
    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();

?>

	<div id="container">
		<div id="content">

            <?php
        
            // calling the widget area 'page-top'
            get_sidebar('page-top');

            the_post();
        
            ?>
            
			<div id="post-<?php the_ID(); ?>" class="<?php thematic_post_class() ?>">
            
                <?php 
                
                // creating the post header
                thematic_postheader();
                
                ?>
                
				<div class="entry-content">

                    <?php
                    
                    the_content();
                    
                    wp_link_pages("\t\t\t\t\t<div class='page-link'>".__('Pages: ', 'thematic'), "</div>\n", 'number');
                    
                    edit_post_link(__('Edit', 'thematic'),'<span class="edit-link">','</span>') ?>

				</div>
			</div><!-- .post -->
		
<!-- LOGIN STARTS HERE -->

	<?php if ( is_user_logged_in() ) : // Already logged in ?>

		<?php global $user_ID; $login = get_userdata( $user_ID ); ?>

		<p class="alert">
			<?php printf( __('You are currently logged in as <a href="%1$s" title="%2$s">%2$s</a>.', 'frontendprofile'), get_author_posts_url( $login->ID ), $login->display_name ); ?> <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="<?php _e('Log out of this account', 'frontendprofile'); ?>"><?php _e('Log out &raquo;', 'frontendprofile'); ?></a>
		</p><!-- .alert -->

	<?php elseif ( $login->ID ) : // Successful login ?>

		<?php $login = get_userdata( $login->ID ); ?>

		<p class="alert">
			
				<?php printf( __('You have successfully logged in as <a href="%1$s" title="%2$s">%2$s</a>.', 'frontendprofile'), get_author_posts_url( $login->ID ), $login->display_name ); ?>
			
		</p><!-- .alert -->

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

<!-- LOGIN ENDS HERE -->

        <?php
        
        if ( get_post_custom_values('comments') ) 
            thematic_comments_template(); // Add a key/value of "comments" to enable comments on pages!
        
        // calling the widget area 'page-bottom'
        get_sidebar('page-bottom');
        
        ?>

		</div><!-- #content -->
	</div><!-- #container -->

<?php 

    // action hook for placing content below #container
    thematic_belowcontainer();

    // calling the standard sidebar 
    thematic_sidebar();
    
    // calling footer.php
    get_footer();
