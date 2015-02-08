<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package diogenes
 */ 
?>

<div id="secondary" class="widget-area col-sm-4" role="complementary">

  <?php get_template_part('partials/list', 'forum'); ?> 
  <?php get_template_part('partials/destaque', 'newsletter'); ?>

	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->