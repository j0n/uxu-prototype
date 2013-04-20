<?php
/**
 * The Template for displaying all single posts.
 *
 */

get_header(); ?>

        <div id="container">
            <div id="content" role="main">
                <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large'); ?>
                    <?php endif; ?>
                    <h1><?php the_title(); ?></h1>
                  <?php the_excerpt(); ?>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php comments_template( '', true ); ?>
            </div><!-- #content -->
        </div><!-- #container -->

<?php get_footer(); ?>
