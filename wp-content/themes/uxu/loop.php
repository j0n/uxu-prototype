<?php $count = 0; ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?> 
  
  <!-- Article -->
  <?php $count++; ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(array('post', 'position-'.$count)); ?>>
    <h2>
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
    </h2>
    <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail(array(200,200)); ?>
    <?php endif; ?>
  </article>
<?php endwhile; ?>
<?php else: ?>
  <article>
    <h2><?php _e( 'Sorry, not_found_in_trashhing to display.'); ?></h2>
  </article>
<?php endif; ?>
