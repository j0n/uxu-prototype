<?php
/**
 *
 */
get_header();
 ?>
        <div id="primary">
            <div id="content" role="main">
                <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header><!-- .entry-header -->
                    <?php if (has_post_thumbnail()) : ?>
                      <div class="page-image-holder">
                        <?php the_post_thumbnail('large'); ?>
                      </div>
                    <?php endif; ?>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->
                </article><!-- #post-<?php the_ID(); ?> -->
                <?php endwhile; // end of the loop. ?>

            </div><!-- #content -->
        </div><!-- #primary -->

<?php get_footer(); ?>
