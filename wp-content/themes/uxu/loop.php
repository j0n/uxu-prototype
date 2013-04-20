<?php $count = 0; ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?> 
  
  <!-- Article -->
  <?php $count++; ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(array('post', 'position-'.$count)); ?>>
    <div class="uxu-date">
      <?php // move to functions.php    ?>
        <span class="uxu-date-date"> 
          <?php echo get_the_date('d'); ?>
        </span>
        <span class="uxu-date-month">
          <?php echo get_the_date('M'); ?>
        </span>
        <span class="uxu-date-month">
          <?php echo get_the_date('Y'); ?>
        </span?
        ?>
    </div>
    <div class="inner-content">
      <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
          <?php the_post_thumbnail('large'); ?>
        </a>
      <?php endif; ?>
      <h2 class="content-header">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
      </h2>
      <?php if(is_single()): ?>
        <?php the_content(); ?>
        <div class="uxu-comments">
          <?php comments_template('true'); ?>
        </div>
      <?php else: ?>
        <?php the_excerpt(); ?>
        <a class="post-read-more" href="<?php the_permalink();?>"><?php _e('READ MORE'); ?></a>
      <?php endif; ?>
    </div>
  </article>
<?php endwhile; ?>
<?php endif; ?>
