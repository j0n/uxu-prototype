<?php $count = 0; ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?> 
  
  <!-- Article -->
  <?php $count++; ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(array('my-product', 'post', 'position-'.$count)); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('thumbnail'); ?>
    <?php else: ?>
      <img src="http://placehold.it/50x50/ff8369/ffffff" />
    <?php endif; ?>
    <h2>
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
    </h2>
    <a class="button buy-product-button"  href="<?php the_field('product_link'); ?>"><?php _e('Köp'); ?></a>
  </article>
<?php endwhile; ?>
<?php endif; ?>
