<?php
require_once( 'wp-less/wp-less.php' ); 
if (!is_admin()) {  
  wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array('diogenes-style') ); 
  wp_enqueue_style('base', get_stylesheet_directory_uri() . '/less/all.less', array('diogenes-style','bootstrap') );  

  wp_enqueue_script('jquery');  
  wp_enqueue_script('all', get_stylesheet_directory_uri() . '/js/all.js',array('jquery', ) );  
} 

add_image_size('destaque-home', 250, 140); 
add_image_size('icon', 70, 70);
add_image_size('thumbnail', 120, 120, true);