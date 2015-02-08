<?php 

class SetupTheme{
	function __construct(){  
		add_shortcode( 'paginas-filhas', array($this,'list_my_childrens'));  
		
	}
	function list_my_childrens($atts) {
		wp_reset_postdata();
		$page_id = get_the_ID();
		$posts = new WP_Query(array('post_parent' => $page_id , 'posts_per_page' => -1, 'post_type' => 'page', 'orderby' => 'menu_order', 'order' => 'ASC'));
		ob_start(); 
		if($posts->have_posts()) while($posts->have_posts()) : $posts->the_post();
?>
    <div class="child-page col-sm-6">
      <?php the_post_thumbnail('icon'); ?>
			<h3><?php the_title(); ?></h3>  
      <a href="<?php the_permalink(); ?>" class="button-link-to center">SAIBA MAIS</a>
    </div>
<?php 
		endwhile;
		wp_reset_postdata();
		$buffer = ob_get_contents();
		ob_clean();
		return $buffer;
	}
}