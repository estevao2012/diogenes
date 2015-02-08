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
    <h3><span><?php echo get_img('icon-artigos.png', ''); ?></span>
    Artigos</h3>

    <?php while ( have_posts() ) : the_post(); ?>   
      
      
      <?php get_template_part('partials/item', 'list'); ?>

    <?php endwhile; ?>
    <div class="list-pages"><?php echo paginate_links(array('prev_text' => '<', 'next_text' => '>'));?></div>

    </div> 
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
