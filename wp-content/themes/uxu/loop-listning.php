<?php $count = 0; ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?> 
  <!-- Article -->
  <?php $count++; ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(array('post', 'position-'.$count, 'uxu-listning-item')); ?>>
    <?php if (has_post_thumbnail()) : ?>
      <a class="uxu-listning-image" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <?php the_post_thumbnail('medium'); ?>
      </a>
    <?php endif; ?>
    <div class="uxu-listning-content">
      <h2>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
      </h2>
      <?php the_excerpt('Läs mer'); ?>
    </div>
  </article>
<?php endwhile; ?>
<?php endif; ?>
