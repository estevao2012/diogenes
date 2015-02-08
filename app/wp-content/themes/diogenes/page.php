<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package diogenes
 */

get_header(); ?> 
<div class="wrapper content-page">
  <div class="col-sm-8">
    <?php while ( have_posts() ) : the_post(); ?>  
      <h3>
        <span><?php the_post_thumbnail('icon'); ?></span>
        <?php the_title() ?>
      </h3>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
    </div> 
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
