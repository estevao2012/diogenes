<?php
/**
* Template Name: Home Page
*/  
get_header(); ?>

	<div class="slider-home">
		
		<div class="slider-container">
			<div class="slider-wrapper">
				<div class="slider-image">
					<div class="wrapper">
						<h1>10 dicas<br> para apostar com segurança</h1>
					</div>
					<?php echo get_img('slider.jpg', '') ?>
				</div>
			</div>
		</div>

		<div class="paginacao wrapper">
			<ul>
				<li class="ativo"></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>

	</div>

	<div class="wrapper content">
		
		<div class="destaque">
			<?php 
				$query = new WP_Query(array('post_type' => 'post', 'category_name' => 'destaque'));
				if($query->have_posts()) while ($query->have_posts()) : 
					$query->the_post();
					get_template_part('partials/destaque','home');
				endwhile; 
			?>
		</div>

		<br clear="all">

		<div class="anuncio"></div>

		<br clear="all">

		<div class="forum-home col-sm-7">
			<?php echo get_img('estrela-big.png',''); ?>
			<div>
				<h4>ÚLTIMAS DO FORUM</h4>
			</div>
		</div> 

		<div class="newsletter-home col-sm-4">
			<h4>Newsletter</h4>
		</div>

	</div> 

<?php get_footer(); ?>