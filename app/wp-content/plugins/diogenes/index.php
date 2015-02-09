<?php
/*
Plugin Name: Diogenes Estrutura Site
Description: Conteudo necessário para funcionamento site
Version: 1.0
Author: Estevão Moraes de Andrade
*/ 

require_once 'banner.php'; 
require_once 'artigos.php'; 
require_once 'casa_de_apostas.php'; 
require_once 'setup_theme.php'; 
require_once 'configuracoes_adicionais.php'; 

class Diogenes {

  function __construct() {
    new Banner();
    new Artigos();
    new CasaDeApostas();
    new SetupTheme();
 
    $this->register_styles();
    add_action( 'init', array($this, 'styles') );

  }

  function styles() {
    wp_enqueue_script('idangerous-swiper-script', plugins_url( '/js/idangerous.swiper.min.js' , __FILE__ ), array('jquery'), '1.0.0', false ); 
    wp_enqueue_script('slider-script', plugins_url( '/js/slider.js' , __FILE__ ), array('jquery', 'idangerous-swiper-script'), '1.0.0', true ); 
    wp_enqueue_style('plugin-elo-config'); 
    wp_enqueue_style('idangerous-swiper-script', plugins_url( '/js/idangerous.swiper.css' , __FILE__ ),array(), '1.0.0', false ); 
  }

  function register_styles() {
    wp_register_style( 'plugin-elo-config', plugins_url('style/layout.css', __FILE__) );
  } 
}

new Diogenes();
