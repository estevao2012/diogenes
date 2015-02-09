<div class="destaque-item col-sm-4">
  <h4 class="card-font"><?php the_title(); ?></h4>
  <?php the_post_thumbnail('destaque-home'); ?>
  <div >
    <div class="destaque-content">  
      <?php the_excerpt(); ?>
      <a class="leia-mais" href="<?php the_permalink(); ?>">Leia Mais</a>
    </div>
    <div class="blue-arrow-down"></div>
  </div>
</div>