<?php   

class Artigos{

  function __construct() {
    add_action('init', array($this, 'register_post_type'));  
    add_shortcode( 'artigos', array($this,'register_shortcode_artigos'));  

  }

  function register_post_type() {
    $args = array(
        'public' => true,
        'label'  => 'Artigos',
        'description'  => 'Artigos',
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'has_archive' => true,
        'rewrite' => array('feeds' => true, 'pages' => true),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'), 
      );
    
    register_post_type('artigos', $args);
    flush_rewrite_rules();
  } 
 
 
}