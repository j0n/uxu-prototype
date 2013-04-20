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
      <header>
        <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
          <img src="<?php echo get_template_directory_uri();  ?>/images/logo.jpg" alt="logo" />
        </a>
        <a class="uxu-mobile-menu" href="#"><?php _e('Menu'); ?></a>
        <nav class="header-menu">     
          <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
          <?php if ( is_user_logged_in() ) : ?>
            <?php wp_nav_menu( array(
              'theme_location' => 'usermenu',
              'container_class' => 'usermenu',
            ) ); ?>
          <?php else: ?>
            <?php wp_nav_menu( array( 'theme_location' => 'loginmenu' ) ); ?>
          <?php endif; ?>
        </nav>
        <?php if( function_exists('uxu_tickets_info')): ?>
          <?php uxu_tickets_info(); ?>
        <?php endif ?>
      </header>
