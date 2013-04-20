<?php $count = 0; ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?> 
  <!-- Article -->
  <?php $count++; ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(array('post', 'position-'.$count)); ?>>
    <?php if(is_single()): ?>
      <h1>
    <?php else: ?>
      <h2>
    <?php endif; ?>
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
    <?php if(is_single()): ?>
      </h1>
    <?php else: ?>
      </h2>
    <?php endif; ?>
    <?php if (has_post_thumbnail()) : ?>
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <?php the_post_thumbnail('large'); ?>
      </a>
    <?php endif; ?>
    <?php the_excerpt(); ?>
  </article>
<?php endwhile; ?>
<?php endif; ?>
