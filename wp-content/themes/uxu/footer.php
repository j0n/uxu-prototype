
  <footer class="main footer">
        <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
          <img src="<?php echo get_template_directory_uri();  ?>/images/logo.jpg" alt="logo" />
        </a>
        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
 </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
