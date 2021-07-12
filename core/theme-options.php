<?php

/**
 * Register theme options
 */
class GamaThemeConfigThemeOptions extends GamaThemeFormRender
{
    private $formRenderInputs = array();
    private $options;

    function __construct(){
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }


    /*
        * add options page
    */
    public function add_plugin_page(){
        add_options_page( 'Configurações do tema', 'Configurações do tema', 'manage_options', 'config-theme-options', array( $this, 'create_admin_page' ) );
    }

    /*
        * Options page callback
    */
    public function create_admin_page(){
        $this->options = get_option( 'GamaTheme_option_theme' );
        ?>
        <div class="wrap">
            <h1>Configurações do tema</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields( 'GamaTheme_group_fields' );
                do_settings_sections( 'config-theme-options' );
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init(){
        register_setting(
            'GamaTheme_group_fields', //group name
            'GamaTheme_option_theme',
            array($this, 'sanitize') // sanitize
        );

        add_settings_section(
            'section_default',
            '',
            '',
            'config-theme-options'
        );

        foreach ( $this->formRenderInputs as $key => $value ) {
            add_settings_field(
                $value['args']['atributos']['name'],
                $value['titulo'],
                array($this, 'render_field_input'),
                'config-theme-options',
                'section_default',
                array( 'valores' => $value )
            );
        }

    }

    public function render_field_input( $args ){
        $get_field = $this->options[$args['valores']['args']['atributos']['name']];

        if( $get_field ){
            if( $args['valores']['type'] != 'select' ){
                $args['valores']['args']['atributos']['value'] = $get_field;
            }else{
                $args['valores']['args']['selected'] = $get_field;
            }
        }

        $args['valores']['args']['atributos']['name'] = 'GamaTheme_option_theme[' . $args['valores']['args']['atributos']['name'] .']';

        echo '<div class="options-theme-form-fields-GamaTheme">';
        echo $this->renderInputType( $args['valores']['type'], $args['valores']['args'] );
        echo '</div>';
    }

    public function add_custom_field( $type, $titulo, $args ){
        $this->formRenderInputs[] = array(
            'titulo' => $titulo,
            'type' => $type,
            'args' => $args
        );
    }
}