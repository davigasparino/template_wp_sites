<?php 

function gama_theme_load_css(){
	wp_enqueue_style( 'bootstrapprimeirotema', get_template_directory_uri().'/assets/css/bootstrap.min.css', array() );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri().'/assets/css/fontawesome.css', array());
	wp_enqueue_style( 'owlcarousel', get_template_directory_uri().'/assets/css/owl.carousel.min.css', array());
	wp_enqueue_style( 'style_theme', get_template_directory_uri().'/assets/css/style.css', array() );
}
add_action( 'wp_enqueue_scripts', 'gama_theme_load_css' );


function gama_theme_load_admin_css(){
	wp_enqueue_style( 'gama_theme_style_admin', get_template_directory_uri().'/assets/css/style-admin.css', array() );
}
add_action( 'admin_enqueue_scripts', 'gama_theme_load_admin_css' );