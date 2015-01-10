<?php
require_once( 'wp-less/wp-less.php' ); 
if (!is_admin()) {  
  wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array('diogenes-style') ); 
  wp_enqueue_style('base', get_stylesheet_directory_uri() . '/less/all.less', array('diogenes-style','bootstrap') );  

  wp_enqueue_script('jquery');  
} 