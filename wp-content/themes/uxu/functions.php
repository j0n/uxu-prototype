<?php 
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

add_theme_support( 'post-thumbnails' );
register_nav_menu( 'primary', __( 'Primary Menu') );
register_nav_menu( 'loginmenu', __( 'Login Menu') );
register_nav_menu( 'usermenu', __( 'User Menu') );

function uxu_scripts() {
  wp_enqueue_script(
    'uxu-script',
    get_template_directory_uri() . '/js/uxu.js',
    array( 'jquery' )
  );
}

add_action( 'wp_enqueue_scripts', 'uxu_scripts' );

add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );
function my_login_redirect( $redirect_to, $request, $user ) {
      return home_url( '/me' );
}


function add_login_out_item_to_menu( $items, $args ){

  if( $args->theme_location != 'usermenu' )
    return $items; 

  
  $link = '<a href="' . wp_logout_url( home_url('/')) . '" title="' .  __( 'Logout' ) .'">' . __( 'Logout' ) . '</a>';
  
  return $items.= '<li id="log-in-out-link" class="menu-item menu-type-link">'. $link . '</li>';
}
add_filter( 'wp_nav_menu_items', 'add_login_out_item_to_menu', 50, 2 );


function uxu_widgets_init() {
    register_sidebar( array(
      'name' =>       'UxU Below menu',
      'id' => 'uxu_below_menu_first',
      'before_widget' => '',
      'after_widget'  => '',
    ));

    register_sidebar( array(
      'name' =>       'UxU Frontpage First',
      'id' => 'uxu_frontpage_first',
      'class' => 'uxu-frontpage-first',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
    ));

    register_sidebar( array(
      'name' =>       'UxU Frontpage Second',
      'id' => 'uxu_frontpage_second',
      'class' => 'uxu-frontpage-second',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
    ));

    register_sidebar( array(
      'name' =>       'UxU Frontpage Third',
      'id' => 'uxu_frontpage_third',
      'class' => 'uxu-frontpage-third',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
    ));

    register_sidebar( array(
      'name' =>       'UxU Frontpage Fourth',
      'id' => 'uxu_frontpage_fourth',
      'class' => 'uxu-frontpage-fourth',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
    ));

    register_sidebar( array(
      'name' =>       'UxU Below User Page ',
      'id' => 'uxu_below_user_page',
      'class' => 'uxu-below-user_page',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
    ));

    register_sidebar( array(
      'name' =>       'UxU User Page',
      'id' => 'uxu_other_user_info',
      'class' => 'uxu-other-user_info',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
    ));
}
add_action( 'widgets_init', 'uxu_widgets_init' );



function tml_redirect_url( $url, $action ) {
  if ( 'register' == $action )
    $url = home_url('/me');
  return $url;
}
add_filter( 'tml_redirect_url', 'tml_redirect_url', 10, 2 );

function tml_new_user_registered( $user_id ) {
  wp_set_auth_cookie( $user_id );
}
add_action( 'tml_new_user_registered', 'tml_new_user_registered' );
