<?php get_header(); ?>
  <?php if (is_active_sidebar('uxu_frontpage_first')) : ?>
    <div class="uxu-frontpage-first">
      <?php if ( dynamic_sidebar('uxu_frontpage_first') ) : ?> <?php endif; ?>
    </div>
  <?php endif; ?>

  <?php if (is_active_sidebar('uxu_frontpage_second')) : ?>
    <div class="uxu-frontpage-second">
      <?php if ( dynamic_sidebar('uxu_frontpage_second') ) : ?> <?php endif; ?>
    </div>
  <?php endif; ?>

  <?php if (is_active_sidebar('uxu_frontpage_third')) : ?>
    <div class="uxu-frontpage-third">
      <?php if ( dynamic_sidebar('uxu_frontpage_third') ) : ?> <?php endif; ?>
    </div>
  <?php endif; ?>

  <?php if (is_active_sidebar('uxu_frontpage_fourth')) : ?>
    <div class="uxu-frontpage-fourth">
      <?php if ( dynamic_sidebar('uxu_frontpage_fourth') ) : ?> <?php endif; ?>
    </div>
  <?php endif; ?>

<?php get_footer(); ?>
