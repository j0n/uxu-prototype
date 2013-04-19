<?php 
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 80, 55, true ); // W x H, hard crop


register_nav_menu( 'primary', __( 'Primary Menu') );

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
}
add_action( 'widgets_init', 'uxu_widgets_init' );
