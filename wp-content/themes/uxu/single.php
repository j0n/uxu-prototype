<?php
/**
 * The Template for displaying all single posts.
 *
 */

get_header(); ?>

        <div id="container">
            <div id="content" role="main">
                <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                <?php endwhile; ?>
                <?php endif; ?>
            </div><!-- #content -->
        </div><!-- #container -->

<?php get_footer(); ?>