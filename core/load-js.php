<?php 
function gama_theme_load_js(){
	wp_enqueue_script( 'bootstrapjsprimeirotemapopper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array('jquery'), 1, true );
	wp_enqueue_script( 'bootstrapjsprimeirotema', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), 1, true );
	wp_enqueue_script( 'owlcarouselprimeirotema', get_template_directory_uri().'/assets/js/owl.carousel.min.js', array('jquery'), 1, true );
	wp_enqueue_script( 'common_theme', get_template_directory_uri().'/assets/js/common.js', array( 'jquery' ), 2, true );
}
add_action( 'wp_enqueue_scripts', 'gama_theme_load_js' );