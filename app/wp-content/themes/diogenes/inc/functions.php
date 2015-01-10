<?php
function the_month($stringmoth){
  $strings = array("janeiro","fevereiro","março","abril","maio","junho","julho","agosto","setembro","outubro","novembro","dezembro");
  $numeros = array(1,2,3,4,5,6,7,8,9,10,11,12);
  return str_replace($strings, $numeros, $stringmoth);
}

function get_name_page(){
  global $post;
  $page = $post->post_name;  if (is_category() || is_single()) {
    $page .= ' '.get_post_type_object(get_post_type($post->ID))->name;
  }
  return $page;
}

function get_slug($str){
  $str = sanitize_title($str);
  $str = (strpos($str,"-")>-1) ? substr($str,0,strpos($str,"-")) : $str;
  return $str;
} 

function get_content_cut($chars) {
  $titulo = get_the_content();
  $titulo = mb_substr($titulo, 0, $chars);
  if($titulo != get_the_title()) $titulo .= "...";
  return $titulo;
}
function get_excerpt_cut($chars) {
  $titulo = get_the_excerpt();
  $titulo = mb_substr($titulo, 0, $chars); 
  if($titulo != get_the_title()) $titulo .= "&hellip;"; 
  return $titulo;
}

function get_title_cut($chars) {
  $titulo = get_the_title();
  $titulo = mb_substr($titulo, 0, $chars);
  if($titulo != get_the_title()) $titulo .= "...";
  return $titulo;
}

function get_title_cutx($cut = 20) {
  return '<a href="' . get_permalink() . '" title="' . get_the_title() . '">' . get_title_cut($cut) . '</a>';
}


function break_text($text){
  $length = 150;
  if(strlen($text)<$length+10) return $text;//don't cut if too short

  $break_pos = strpos($text, ' ', $length);//find next space after desired length
  $visible = substr($text, 0, $break_pos);
  return balanceTags($visible) . ' <a href="' . get_permalink() . '" class="more-link">[ler tudo]</a>';
}

function get_title() {
  if (is_front_page()) $title = get_simple_title() . ' | ' . get_bloginfo('description');
  else $title = get_simple_title() . ' | ' . get_bloginfo('name');
  return $title;
}

function get_img ($src, $desc, $id='', $class='', $map='',$style='') {
  if (substr($src, 0, 4) == 'http') $link = $src;
  else $link = get_bloginfo('template_url') . "/images/${src}";
  $meta = '';
  if ($id) $meta .= "id=\"${id}\"";
  if ($class) $meta .= " class='${class}'";
  if ($map) $meta .= " usemap=\"#${map}\"";
  return "<img ${meta} src=\"${link}\" alt=\"${desc}\" style=\"${style}\"/>";
}
function get_img_src ($src, $desc, $id='', $class='', $map='',$style='') {
  if (substr($src, 0, 4) == 'http') $link = $src;
  else $link = get_bloginfo('template_url') . "/images/${src}";
  return $link;
}

function get_linkx ($src, $text, $desc, $class='') {
  if (substr($src, 0, 4) == 'http') $link = $src;
  else $link = get_bloginfo('url') . "/${src}";
  $meta = '';
  if ($class) $meta = "class=\"${class}\"";
  return "<a ${meta} href=\"${link}\" title=\"${desc}\">${text}</a>";
}

function get_parent () {
  global $wp_query;
  if ($wp_query->post->post_parent) return $wp_query->post->post_parent;
  else return $id = $wp_query->post->ID;
}

function get_childrenx ($id='', $post_type='page') {
  $parent = $id ? $id : get_parent();
  $params = array('posts_per_page' => -1,
   'post_parent' => $parent,
   'post_type' => $post_type,
   'orderby' => 'menu_order',
   'order' => 'DESC');
  return new WP_Query($params);
}

function get_custom($key, $id='') {
 global $post;
 $custom = get_post_custom($id);
 $value = $custom[$key];
 if ($value) return $value[0];
 else return '';
}

function get_data_retroativa(){
  $string = human_time_diff(get_the_time('U'), current_time('timestamp'));
  $ingles = array("day", "week","weeks", "month","months","year","years");
  $pt   = array("dia", "semana","semanas", "mÃªs","meses","ano","anos");

  $novafrase = str_replace($ingles, $pt, $string);
  return $novafrase;
}


function parents($id) {
  $str = '';
  while ($id != 0) {
    $p = get_post(get_post($id)->post_parent);
    $id = $p->ID;

    if ($id == get_the_ID()) {
      break;
    }

    $str = '<li><a href="'.get_permalink($id).'">'.$p->post_title.'</a></li>'.$str;
  }
  return $str;
}

function is_child($page_id_or_slug) { 
  if(!is_int($page_id_or_slug)) {
    $page = get_page_by_path($page_id_or_slug);
    $page_id_or_slug = $page->ID;
  }
  if(is_page() && $post->post_parent == $page_id_or_slug ) {
    return true;
  } else {
    return false;
  }
}

function add_excerpts_to_pages() {
  add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'add_excerpts_to_pages' );

function redirect($url) {
  $baseUri = get_site_url().'/';

  if(headers_sent()) {
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $baseUri.$url . '"';
    $string .= '</script>';

    echo $string;
  }
  else {
    if (isset($_SERVER['HTTP_REFERER']) AND ($url == $_SERVER['HTTP_REFERER']))
      header('Location: '.$_SERVER['HTTP_REFERER']);
    else
      header('Location: '.$baseUri.$url);
  }
  exit;
}

function get_thumbnail_url($id, $post_size = 'full'){
  $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($id), $post_size);
  $url = $thumb['0'];
  return $url;
}

function is_landing_page(){ 
  global $post;
  return $post->post_parent == 0 && $post->post_type == 'page' && !is_front_page();
}

function get_page_by_slug($page_slug, $output = OBJECT, $post_type = 'page' ) { 
  global $wpdb; 
  $page = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_name = %s AND post_type= %s AND post_status = 'publish'", $page_slug, $post_type ) ); 
    if ( $page ) 
      return get_post($page, $output); 
  
  return null; 
}

function get_the_permalink_by_slug($slug){
  $page = get_page_by_slug($slug);
  return get_the_permalink($page->ID);
}

function get_my_categories($post_type = 'post'){
  $terms = get_object_taxonomies($post_type);
  $args = array();
  if(!empty($terms)){
    $args['taxonomy'] = $terms[0]; 
    return get_categories($args); 
  }else
    return array();
}

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function get_page_by_template_name($template_name) {
  $pages = get_pages(array(
  'meta_key' => '_wp_page_template',
  'meta_value' => $template_name
  ));
  return $pages[0];
}