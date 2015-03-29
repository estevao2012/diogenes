
<?php
/**
* Template Name: Full Width Page
*/  
 get_header('full'); ?> 
<div class="full-width content-page">
  <div class="col-sm-12">
    <?php while ( have_posts() ) : the_post(); ?>  
      
      <h3 class="card-font"> 
        <?php the_title() ?>
      </h3>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
    </div> 
</div>
<?php get_footer(); ?>