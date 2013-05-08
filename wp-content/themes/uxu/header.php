<head>
  <meta charset="UTF-8">
  <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0;">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.gif">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();  ?>/style.css" />
  <link href="<?php bloginfo('template_directory'); ?>/stylesheets/screen.css" media="screen" rel="stylesheet" type="text/css" /

  <!-- CSS + jQuery + JavaScript -->
  <?php wp_head(); ?>
        
</head> 
<body <?php body_class(); ?>>  
        
  <!-- Wrapper -->
  <div class="wrapper">      
      <header class="page-header">
        <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
          <img src="<?php echo get_template_directory_uri();  ?>/images/logo.jpg" alt="logo" />
        </a>
        <div class="uxu-facebook-like">
          <div class="fb-like" data-href="https://www.facebook.com/festival2014" data-send="false" data-width="250" data-show-faces="true"></div>
        </div>
        <a class="uxu-mobile-menu" href="#"><?php _e('Menu'); ?></a>
        <div class="uxu-sticky-tmp-dev"></div>
        <div class="uxu-sticky-top">
          <div class="uxu-sticky-wrapper">
            <nav class="header-menu">
              <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
              <?php if ( is_user_logged_in() ) : ?>
                <ul>
                  <li><a href="<?php echo home_url('/me'); ?>">Min sida</a>
                </ul>
              <?php else: ?>
                <?php wp_nav_menu( array( 'theme_location' => 'loginmenu' ) ); ?>
              <?php endif; ?>
              <a class="uxu-change-lang" href="#">In english</a>
            </nav>
            <?php if ( dynamic_sidebar('uxu_below_menu_first') ) : ?> <?php endif; ?>
          </div>
        </div>
      </header>
