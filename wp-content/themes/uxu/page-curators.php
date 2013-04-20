<?php
/**
 * Template Name: Curators page
 *
 */ ?>
 
<?php get_header(); ?>
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
                    </div>
                </article>
                <?php endwhile; // end of the loop. ?>
            </div>
            <div class="uxu-curators-list">
              <?php query_posts( 'post_type=curators' ) ?>
              <?php get_template_part( 'loop'); ?>
              <?php wp_reset_query(); ?>
            </div>
        </div><!-- #primary -->

<?php get_footer(); ?>
