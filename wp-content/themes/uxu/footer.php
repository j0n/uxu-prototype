
  <footer class="main footer">
        <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
          <img src="<?php echo get_template_directory_uri();  ?>/images/logo.jpg" alt="logo" />
        </a>
        <div class="mockup">
          <img src="<?php echo get_template_directory_uri();  ?>/images/mockup-social.png" alt="hejhej" />
        </div>
        <div class="mockup">
          <img src="<?php echo get_template_directory_uri();  ?>/images/mockup-newsletter.png" alt="hejdå" />
        </div>
 </footer>
</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/sv_SE/all.js#xfbml=1&appId=266189353437674";
      fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>
<?php wp_footer(); ?>
</body>
</html>
