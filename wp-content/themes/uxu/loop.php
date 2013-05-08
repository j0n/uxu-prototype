<sidebar class="sidebar">
  <?php if ( dynamic_sidebar('uxu_blogg_sidebar') ) : ?> <?php endif; ?>
</sidebar>
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
      <div class="inner-text-content">
        <h2 class="content-header">
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
        </h2>
        <?php if(is_single()): ?>
          <?php the_content(); ?>
          <div class="uxu-comments">
            [Kommentarer]
          </div>
        <?php else: ?>
          <?php the_excerpt('Read more', 50); ?>
        <?php endif; ?>
        <div class="uxu-post-comment">
          <span>
          <?php comments_number( __('Inga kommentarer än'), __('en kommentar'), __('% kommentarer')); ?> 
          </span>
          <div>
            Skriven av 
            <?php the_author_posts_link(); ?>
          </div>
        </div>
     </div>
    </div>
  </article>
<?php endwhile; ?>
<?php endif; ?>
