<?php
/**
 * diogenes functions and definitions
 *
 * @package diogenes
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'diogenes_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function diogenes_setup() {
 
	load_theme_textdomain( 'diogenes', get_template_directory() . '/languages' );
 
	add_theme_support( 'automatic-feed-links' );
 
	add_theme_support( 'title-tag' );
  
	register_nav_menus( array(
		'primary-left' => __( 'Primary Left Menu', 'diogenes' ),
		'primary-right' => __( 'Primary Right Menu', 'diogenes' ),
	) ); 
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
 
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );
 
	add_theme_support( 'custom-background', apply_filters( 'diogenes_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	add_filter('show_admin_bar', '__return_false');
}
endif; // diogenes_setup
add_action( 'after_setup_theme', 'diogenes_setup' ); 

function diogenes_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'diogenes' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'diogenes_widgets_init' );
 
function diogenes_scripts() {
	wp_enqueue_style( 'diogenes-style', get_stylesheet_uri() );

	wp_enqueue_script( 'diogenes-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'diogenes-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'diogenes_scripts' );
 
require get_template_directory() . '/inc/template-tags.php'; 
require get_template_directory() . '/inc/extras.php'; 
require get_template_directory() . '/inc/customizer.php'; 
require get_template_directory() . '/inc/jetpack.php';
require get_template_directory() . '/inc/diogenes-extras.php';
require get_template_directory() . '/inc/functions.php';
