<div class="item-list">
  <?php the_post_thumbnail('thumbnail'); ?>
  <h4  class="card-font"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4> 
  <h6><?php the_date('d/m/Y'); ?></h6>
  <br>
  <?php the_excerpt(); ?>
  <a href="<?php the_permalink(); ?>" class="button-link-to">LEIA MAIS</a>
  <br clear="all">
  <hr>
</div>