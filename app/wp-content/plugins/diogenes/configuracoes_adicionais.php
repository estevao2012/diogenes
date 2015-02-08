<?php
class ConfiguracoesAdicionais{
    public function __construct(){
      if(is_admin()){
        add_action('admin_menu', array($this, 'add_plugin_page'));
        add_action('admin_init', array($this, 'page_init'));
      }
    }
  
    public function add_plugin_page(){ 
        add_options_page('Informações Adicionais', 'Informações Adicionais', 'manage_options', 'test-setting-admin', array($this, 'create_admin_page'));
    }

    public function create_admin_page(){
?>
    <div class="wrap">
      <?php screen_icon(); ?>
      <h2>Informações Adicionais</h2>     
      <form method="post" action="options.php">
          <?php 
            settings_fields('test_option_group'); 
            do_settings_sections('test-setting-admin');
          ?>
          <?php submit_button(); ?>
      </form>
    </div>
<?php 
    }
  
    public function page_init(){    
      register_setting('test_option_group', 'array_key', array($this, 'update_settings'));
      add_settings_section(
        'setting_section_id',
        'Informações Adicionais',
        array($this, 'print_section_info'),
        'test-setting-admin'
      );        
 

      add_settings_field(
        'facebook_text', 
        'Link Facebook', 
        array($this, 'create_an_field'), 
        'test-setting-admin',
        'setting_section_id',
        array('field' => 'facebook_text', 'id' => 'facebook_text')    
      );


      add_settings_field(
        'linkedin_text', 
        'Link LinkedIn', 
        array($this, 'create_an_field'), 
        'test-setting-admin',
        'setting_section_id',
        array('field' => 'linkedin_text', 'id' => 'linkedin_text')    
      );

      add_settings_field(
        'tweeter_text', 
        'Login Twitter', 
        array($this, 'create_an_field'), 
        'test-setting-admin',
        'setting_section_id',
        array('field' => 'tweeter_text', 'id' => 'tweeter_text')    
      );

      add_settings_field(
        'youtube_text', 
        'Link Youtube', 
        array($this, 'create_an_field'), 
        'test-setting-admin',
        'setting_section_id',
        array('field' => 'youtube_text', 'id' => 'youtube_text')     
      );

      add_settings_field(
        'slideshare_text', 
        'Link SlideShare', 
        array($this, 'create_an_field'), 
        'test-setting-admin',
        'setting_section_id',
        array('field' => 'slideshare_text', 'id' => 'slideshare_text')     
      );

      add_settings_field(
        'telefone_text', 
        'Telefones', 
        array($this, 'create_an_textarea'), 
        'test-setting-admin',
        'setting_section_id',
        array('field' => 'telefone_text', 'id' => 'telefone_text')     
      ); 

      
    }
  
    public function update_settings($input){
      foreach ($input as $key => $value) { 
        if(get_option($key) === FALSE){
         add_option($key, $value);
        }else{
         update_option($key, $value);
        }  
      } 
      return $input; 
    }
  
    public function print_section_info(){
      print 'Coloque abaixo suas informações:';
    }
  
    public function create_an_field($args){ 
      echo "<input type='text' id='".$args['id']."' name='array_key[".$args['field']."]' style='width:300px;' value='".get_option($args['field'])."'/>";
    } 
  
    public function create_an_textarea($args){ 
      echo "<textarea id='".$args['id']."' name='array_key[".$args['field']."]'  style='width:300px;height: 100px'>".get_option($args['field'])."</textarea>";
    } 
} 