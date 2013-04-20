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

function uxu_widgets_init() {
    register_sidebar( array(
      'name' =>       'UxU Frontpage First',
      'id' => 'uxu_frontpage_first',
      'class' => array('uxu-frontpage-first'),
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
