<?php  
require_once 'metaboxs/customMetaBox.php';

class Banner{

  function __construct() {
    add_action('init', array($this, 'register_post_type')); 
    add_action('init', array($this, 'register_meta_box')); 

  }

  function register_post_type() {
  	$args = array(
        'public' => true,
        'label'  => 'Banner',
        'description'  => 'Banner',
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'has_archive' => true,
        'rewrite' => array('feeds' => true, 'pages' => true),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'),
          'show_in_nav_menus' => false
      );
    
  	register_post_type('banner', $args);
    flush_rewrite_rules();
  }


  function register_meta_box(){
    $args['banner'] = array(
      'id' => 'banner-linkto',
      'title' => 'Link destino',
      'context' => 'normal',
      'priority' => 'high',
      'fields' => array(
        array(
          'name' => 'Link Banner',
          'desc' => 'Url destino.',
          'id' => 'link_to',
          'type' => 'text',
          'default' => ''
        )
      )
    );
    new CustomMetaBox($args);
  }
 
}