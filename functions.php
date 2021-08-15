<?php 
require_once 'core/index.php';

function gama_theme_settings_theme(){
	add_theme_support( 'post-thumbnails' ); 	
	//exemplo de como criar tamanhos personalizados de imagens
	//add_image_size( 'primeiroteste', '350', '50', true );

  	register_nav_menu( 'header', 'Header' );
  	register_nav_menu( 'footer', 'Footer' );

  	add_theme_support('custom-logo');
}
add_action( 'after_setup_theme', 'gama_theme_settings_theme' );

$slider_home = new GamaThemeRegisterCustomPostType('sliders', 'Slider', array( 'supports' => array( 'title', 'thumbnail') ));
$slider_metabox = new GamaThemeRegisterMetaBox('slider-metabox', 'Slider Options', array('sliders'));
$slider_metabox->add_field_form('text', array(
    'label' => 'link',
    'atributos' => array(
        'id' => 'slider-link',
        'placeholder' => 'ex http://meu-link-aqui.com.br',
        'name' => 'slider-link'
    )
));
$slider_metabox->add_field_form('checkbox', array(
    'label' => 'Abrir em novaaba',
    'atributos' => array(
        'name' => 'slider-link-blank',
        'id' => 'slider-link-blank',
        'value' => 'true'
    )
));

if( is_admin() ){
    $GamaTheme_theme_options = new GamaThemeConfigThemeOptions();

    $args = array(
        'atributos' => array(
            'name' => 'facebook_site'
        )
    );
    $GamaTheme_theme_options->add_custom_field( 'input', 'Facebook', $args );

    $args = array(
        'atributos' => array(
            'name' => 'instagram_site'
        )
    );
    $GamaTheme_theme_options->add_custom_field( 'input', 'Instagram', $args );

}

//
//$varteste = new GamaThemeRegisterMetaBox('idtestemp', 'Teste de metabox', array('post', 'page', 'sliders'));
//
//$args = array(
//	'label' => 'Qual é a fruta: <br />',
//	'options' => array(
//		'banana' => 'Banana',
//		'maca' => 'Maça',
//		'morango' => 'Morango',
//	),
//	'atributos' => array(
//		'id' => 'post_fruta',
//		'placeholder' => 'digite um texto aqui',
//		'name' => 'post_fruta',
//	)
//);
//$varteste->add_field_form( 'select', $args );
//
//
//$args = array(
//	'label' => 'Descrição adicional da fruta selecionada: <br />',
//	'atributos' => array(
//		'id' => 'post_fruta_description',
//		'placeholder' => 'digite uma descrição da fruta aqui',
//		'name' => 'post_fruta_description',
//	)
//);
//$varteste->add_field_form( 'input', $args );
//
//$args = array(
//	'label' => 'teste de textarea: <br />',
//	'atributos' => array(
//		'id' => 'post_fruta_textarea',
//		'placeholder' => 'digite uma descrição da fruta aqui',
//		'name' => 'post_fruta_textarea',
//	)
//);
//$varteste->add_field_form( 'textarea', $args );