<?php   
require_once 'metaboxs/customMetaBox.php';

class CasaDeApostas{

  function __construct() {
    add_action('init', array($this, 'register_post_type'));  
    add_shortcode('casas-de-apostas', array($this, 'register_shortcode'));
    add_image_size('thumbnail-casa-aposta', 110, 110);
    add_action('init', array($this, 'register_meta_box')); 
  }

  function register_post_type() {
    $args = array(
        'public' => true,
        'label'  => 'Casas de Apostas',
        'description'  => 'Casas de Apostas',
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'has_archive' => false,
        'rewrite' => array('feeds' => true, 'pages' => true),
        'supports' => array('title', 'thumbnail', 'page-attributes'),
        'show_in_nav_menus' => false
      );
    
    register_post_type('casas-de-apostas', $args);
    flush_rewrite_rules();
  } 

  function register_shortcode(){
    wp_reset_postdata();
    $page_id = get_the_ID();
    $posts = new WP_Query(array('post_type'=> 'casas-de-apostas'));
    ob_start(); 
    if($posts->have_posts()) while($posts->have_posts()) : $posts->the_post();
    $pontuacao = get_post_meta(get_the_ID(), 'classificacao', true);
    $pontuacao = str_replace(',', '.', $pontuacao); 
?>
    <div class="casa-aposta">
      <div class="col-sm-3">
        <div class="moldura">
          <?php the_post_thumbnail('thumbnail-casa-aposta'); ?>
        </div> 
        <a href="<?php echo get_post_meta(get_the_ID(), 'link', true) ?>" class="button-link-to center">SAIBA MAIS</a>
      </div>
      <div class="col-sm-9">
        <h4><?php the_title(); ?></h4>
        <div>
          <span>Tipo de bônus: <?php echo get_post_meta(get_the_ID(), 'bonus', true) ?></span>
          <span>Depósito: <?php echo get_post_meta(get_the_ID(), 'deposito', true) ?></span>
          <span>
            <strong>Classificação:</strong> 
            <div class="estrelas-classificacao" style="width: <?php echo 16.3 * $pontuacao ?>px" alt="Pontuação: <?php echo $pontuacao ?>"></div>
          </span>
          <span>Observações: <?php echo get_post_meta(get_the_ID(), 'observacao', true) ?></span>
        </div>  
      </div>
      
    </div>
<?php 
    endwhile;
    wp_reset_postdata();
    $buffer = ob_get_contents();
    ob_clean();
    return $buffer;
  }

  function register_meta_box(){
    $args['casas-de-apostas'] = array(
      'id' => 'banner-linkto',
      'title' => 'Link destino',
      'context' => 'normal',
      'priority' => 'high',
      'fields' => array(
        array(
          'name' => 'Link Banner',
          'desc' => 'Url destino.',
          'id' => 'link',
          'type' => 'text',
          'default' => ''
        ),
        array(
          'name' => 'Tipo de Bônus',
          'desc' => '',
          'id' => 'bonus',
          'type' => 'text',
          'default' => ''
        ),
        array(
          'name' => 'Depósito',
          'desc' => '',
          'id' => 'deposito',
          'type' => 'text',
          'default' => ''
        ),
        array(
          'name' => 'Classificação',
          'desc' => 'Digite apenas o número da classificação.',
          'id' => 'classificacao',
          'type' => 'text',
          'default' => '0'
        ),
        array(
          'name' => 'Observações',
          'desc' => '.',
          'id' => 'observacao',
          'type' => 'textarea',
          'default' => ''
        ),
      )
    );
    new CustomMetaBox($args);
  }
}