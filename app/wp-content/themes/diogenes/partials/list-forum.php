<div class="forum-home col-sm-7">
    <?php echo get_img('estrela-big.png',''); ?>
    <div>
      <h4 class="card-font">ÚLTIMAS DO FORUM</h4>
      <ul>
        <?php

        $results = new WP_Query('post_type=topic&posts_per_page=3');
        if($results->have_posts())
          while($results->have_posts()) : $results-> the_post();
            echo "<li><a href='".get_the_permalink()."'>".get_the_title()."</a></li>";
        endwhile;
        ?>

      </ul>
      <a href="/forums" class="button-link-to">Entrar no forum</a>
    </div>
  </div>