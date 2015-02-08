<?php
/**
* Template Name: Home Page
*/  
get_header(); ?>

<div class="slider-home">

	<div class="slider-container">
		<div class="swiper-wrapper">
			<?php 
			$query = new WP_Query(array('post_type' => 'banner'));
			if($query->have_posts()) while ($query->have_posts()) : $query->the_post();
			get_template_part('partials/destaque','banner');
			endwhile; 
			?>

		</div> 
	</div>

	<div class="paginacao wrapper">
		<ul>
		</ul>
	</div>

</div>

<div class="wrapper content">

	<div class="destaque">
		<?php 
		$query = new WP_Query(array('post_type' => 'post', 'category_name' => 'destaque'));
		if($query->have_posts()) while ($query->have_posts()) : $query->the_post();
		get_template_part('partials/destaque','home');
		endwhile; 
		?>
	</div>

	<br clear="all">

	<div class="anuncio col-sm-12 linha">
		<div>
			ANUNCIO
		</div>
	</div>

	<br clear="all">

	<div class="linha"> 
		<?php get_template_part('partials/list', 'forum'); ?>
		<?php get_template_part('partials/destaque', 'newsletter'); ?>
	</div>

	<br clear="all">
</div> 

<?php get_footer(); ?>