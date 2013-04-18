<?php
/**
 * Template Name: Register Page
 *
 */

/* Load registration file. */
require_once( ABSPATH . WPINC . '/registration.php' );

/* Check if users can register. */
$registration = get_option( 'users_can_register' );

/* If user registered, input info. */
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'adduser' ) {
	$user_pass = wp_generate_password();
	$userdata = array(
		'user_pass' => $user_pass,
		'user_login' => esc_attr( $_POST['user_name'] ),
		'first_name' => esc_attr( $_POST['first_name'] ),
		'last_name' => esc_attr( $_POST['last_name'] ),
		'nickname' => esc_attr( $_POST['nickname'] ),
		'user_email' => esc_attr( $_POST['email'] ),
		'user_url' => esc_attr( $_POST['website'] ),
		'aim' => esc_attr( $_POST['aim'] ),
		'yim' => esc_attr( $_POST['yim'] ),
		'jabber' => esc_attr( $_POST['jabber'] ),
		'description' => esc_attr( $_POST['description'] ),
		'role' => get_option( 'default_role' ),
	);
	
	if ( !$userdata['user_login'] )
		$error = __('A username is required for registration.', 'frontendprofile');
	elseif ( username_exists($userdata['user_login']) )
		$error = __('Sorry, that username already exists!', 'frontendprofile');
	
	elseif ( !is_email($userdata['user_email'], true) )
		$error = __('You must enter a valid email address.', 'frontendprofile');
	elseif ( email_exists($userdata['user_email']) )
		$error = __('Sorry, that email address is already used!', 'frontendprofile');
	
	else{
		$new_user = wp_insert_user( $userdata );
		wp_new_user_notification($new_user, $user_pass);
		
		update_usermeta( $new_user, 'twitter', esc_attr( $_POST['twitter']  ) );
		update_usermeta( $new_user, 'birth',   esc_attr( $_POST['birth']    ) );
		update_usermeta( $new_user, 'hobbies',           $_POST['hobbies']    );
		update_usermeta( $new_user, 'agree',   esc_attr( $_POST['agree']    ) );
	}

}
 

 
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

<!-- REGISTER FORM STARTS HERE -->
			
		<?php if ( is_user_logged_in() && !current_user_can( 'create_users' ) ) : ?>

			<p class="log-in-out alert">
			<?php printf( __('You are logged in as <a href="%1$s" title="%2$s">%2$s</a>.  You don\'t need another account.', 'frontendprofile'), get_author_posts_url( $curauth->ID ), $user_identity ); ?> <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="<?php _e('Log out of this account', 'frontendprofile'); ?>"><?php _e('Logout &raquo;', 'frontendprofile'); ?></a>
			</p><!-- .log-in-out .alert -->

		<?php elseif ( $new_user ) : ?>

			<p class="alert">
			<?php
				if ( current_user_can( 'create_users' ) )
					printf( __('A user account for %1$s has been created.', 'frontendprofile'), $_POST['user-name'] );
				else 
					printf( __('Thank you for registering, %1$s.', 'frontendprofile'), $_POST['user-name'] );
					printf( __('<br/>Please check your email address. That\'s where you\'ll recieve your login password.<br/> (It might go into your spam folder)', 'frontendprofile') );
			?>
			</p><!-- .alert -->

		<?php else : ?>

			<?php if ( $error ) : ?>
				<p class="error">
					<?php echo $error; ?>
				</p><!-- .error -->
			<?php endif; ?>

			<?php if ( current_user_can( 'create_users' ) && $registration ) : ?>
				<p class="alert">
					<?php _e('Users can register themselves or you can manually create users here.', 'frontendprofile'); ?>
				</p><!-- .alert -->
			<?php elseif ( current_user_can( 'create_users' ) ) : ?>
				<p class="alert">
					<?php _e('Users cannot currently register themselves, but you can manually create users here.', 'frontendprofile'); ?>
				</p><!-- .alert -->
			<?php endif; ?>

			<?php if ( $registration || current_user_can( 'create_users' ) ) : ?>

			<form method="post" id="adduser" class="user-forms" action="http://<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
			
			
				<strong>Name</strong>
				
				<p class="form-username">
					<label for="user_name"><?php _e('Username (required)', 'frontendprofile'); ?></label>
					<input class="text-input" name="user_name" type="text" id="user_name" value="<?php if ( $error ) echo wp_specialchars( $_POST['user_name'], 1 ); ?>" />
				</p><!-- .form-username -->
				
				<p class="first_name">
					<label for="first_name"><?php _e('First Name', 'frontendprofile'); ?></label>
					<input class="text-input" name="first_name" type="text" id="first_name" value="<?php if ( $error ) echo wp_specialchars( $_POST['first_name'], 1 ); ?>" />
				</p><!-- .first_name -->
				
				<p class="last_name">
					<label for="last_name"><?php _e('Last Name', 'frontendprofile'); ?></label>
					<input class="text-input" name="last_name" type="text" id="last_name" value="<?php if ( $error ) echo wp_specialchars( $_POST['last_name'], 1 ); ?>" />
				</p><!-- .last_name -->
				
				<p class="nickname">
					<label for="nickname"><?php _e('Nickname', 'frontendprofile'); ?></label>
					<input class="text-input" name="nickname" type="text" id="nickname" value="<?php if ( $error ) echo wp_specialchars( $_POST['nickname'], 1 ); ?>" />
				</p><!-- .nickname -->
				
				<strong>Contact Info</strong>
				
				<p class="form-email">
					<label for="email"><?php _e('E-mail (required)', 'frontendprofile'); ?></label>
					<input class="text-input" name="email" type="text" id="email" value="<?php if ( $error ) echo wp_specialchars( $_POST['email'], 1 ); ?>" />
				</p><!-- .form-email -->
				
				<p class="form-website">
					<label for="website"><?php _e('Website', 'frontendprofile'); ?></label>
					<input class="text-input" name="website" type="text" id="website" value="<?php if ( $error ) echo wp_specialchars( $_POST['website'], 1 ); ?>" />
				</p><!-- .form-website -->
				
				<p class="form-aim">
					<label for="aim"><?php _e('AIM', 'frontendprofile'); ?></label>
					<input class="text-input" name="aim" type="text" id="aim" value="<?php if ( $error ) echo wp_specialchars( $_POST['aim'], 1 ); ?>" />
				</p><!-- .form-aim -->
				
				<p class="form-yim">
					<label for="yim"><?php _e('Yahoo IM', 'frontendprofile'); ?></label>
					<input class="text-input" name="yim" type="text" id="yim" value="<?php if ( $error ) echo wp_specialchars( $_POST['yim'], 1 ); ?>" />
				</p><!-- .form-yim -->
				
				<p class="form-jabber">
					<label for="jabber"><?php _e('Jabber / Google Talk', 'frontendprofile'); ?></label>
					<input class="text-input" name="jabber" type="text" id="jabber" value="<?php if ( $error ) echo wp_specialchars( $_POST['jabber'], 1 ); ?>" />
				</p><!-- .form-jabber -->
				
				<strong>About Yourself</strong>
				
				<p class="form-description">
					<label for="description"><?php _e('Biographical Info', 'frontendprofile'); ?></label>
					<textarea class="text-input" name="description" id="description" rows="5" cols="30"><?php if ( $error ) echo wp_specialchars( $_POST['description'], 1 ); ?></textarea>
				</p><!-- .form-description -->
				
				<strong>Extra Profile Information</strong>
				
				<p class="form-twitter">
					<label for="twitter"><?php _e('Twitter', 'frontendprofile'); ?></label>
					<input class="text-input" name="twitter" type="text" id="twitter" value="<?php if ( $error ) echo wp_specialchars( $_POST['twitter'], 1 ); ?>" />
				</p><!-- .form-twitter -->
				
				<p class="form-birth">
					<label for="birth"><?php _e('Year of birth', 'frontendprofile'); ?></label>
					<?php
						for($i=1900; $i<=2000; $i++)
							$years[]=$i;
						
						echo '<select name="birth">';
							echo '<option value="">' . __("Select Year", 'frontendprofile' ) . '</option>';
							foreach($years as $year){
								if ($error && $year==$_POST['birth']) $selected = 'selected="slelected"';
								else $selected = '';
								echo '<option value="' . $year . '" ' . $selected . '>' . $year . '</option>';
							}
						echo '</select>';
					?>
				</p><!-- .form-birth -->
				
				<p class="form-hobbies">
					<label for="hobbies"><?php _e('What are your hobbies?', 'frontendprofile'); ?></label>
					<?php
						$hobbies = get_the_author_meta( 'hobbies', $current_user->id );
					?>
					<ul class="hobbies-type-list">
						<li><input value="videogames"           name="hobbies[]" <?php if (is_array($_POST['hobbies'])) { if ($error && in_array("videogames",           $_POST['hobbies'])) { ?>checked="checked"<?php } }?> type="checkbox" /> <?php _e('Video Games',           'frontendprofile'); ?></li>
						<li><input value="sabotagingcapitalism" name="hobbies[]" <?php if (is_array($_POST['hobbies'])) { if ($error && in_array("sabotagingcapitalism", $_POST['hobbies'])) { ?>checked="checked"<?php } }?> type="checkbox" /> <?php _e('Sabotaging Capitalism', 'frontendprofile'); ?></li>
						<li><input value="watchingtv"           name="hobbies[]" <?php if (is_array($_POST['hobbies'])) { if ($error && in_array("watchingtv",           $_POST['hobbies'])) { ?>checked="checked"<?php } }?> type="checkbox" /> <?php _e('Watching TV',           'frontendprofile'); ?></li>
					</ul>
				</p><!-- .form-hobbies -->
				
				<p class="form-agree">
					<label for="agree"><?php _e('Do you agree that WordPress is the greatest thing since bread came sliced?', 'frontendprofile'); ?></label>
					<?php $agree = get_the_author_meta( 'agree', $current_user->ID ); ?>
					<ul>
						<li><input value="yes" name="agree" <?php if ($_POST['agree'] == 'yes' ) { ?>checked="checked"<?php }?> type="radio" /> <?php _e('Yes', 'frontendprofile'); ?></li>
						<li><input value="no"  name="agree" <?php if ($_POST['agree'] == 'no'  ) { ?>checked="checked"<?php }?> type="radio" /> <?php _e('No',  'frontendprofile'); ?></li>
					</ul>
				</p><!-- .form-agree -->

				<p class="form-submit">
					<?php echo $referer; ?>
					<input name="adduser" type="submit" id="addusersub" class="submit button" value="<?php if ( current_user_can( 'create_users' ) ) _e('Add User', 'frontendprofile'); else _e('Register', 'frontendprofile'); ?>" />
					<?php wp_nonce_field( 'add-user' ) ?>
					<input name="action" type="hidden" id="action" value="adduser" />
				</p><!-- .form-submit -->

			</form><!-- #adduser -->

			<?php endif; ?>

		<?php endif; ?>
			
<!-- REGISTER FORM ENDS HERE -->
		
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