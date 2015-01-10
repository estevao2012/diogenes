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
			<div class="destaque-item">
				<h3>Destaque 1</h3>
				<img>
				<p>Loren ipsum Loren ipsum Loren ipsum Loren ipsum Loren ipsum Loren ipsum Loren ipsum Loren ipsum </p>
				<a class="leia-mais">Leia Mais</a>
			</div>
			<div class="destaque-item">
				<h3>Destaque 2</h3>
				<img>
				<p>Loren ipsum Loren ipsum Loren ipsum Loren ipsum Loren ipsum Loren ipsum Loren ipsum Loren ipsum </p>
				<a class="leia-mais">Leia Mais</a>
			</div>
			<div class="destaque-item">
				<h3>Destaque 3</h3>
				<img>
				<p>Loren ipsum Loren ipsum Loren ipsum Loren ipsum Loren ipsum Loren ipsum Loren ipsum Loren ipsum </p>
				<a class="leia-mais">Leia Mais</a>
			</div>
		</div>

		<div class="anuncio"></div>

		<div class="">	
	</div>

<?php get_footer(); ?>