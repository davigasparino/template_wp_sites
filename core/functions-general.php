<?php
    function GamaTheme_get_title_page(){
        $output = '';
        if( is_page() || is_single() ){
            $output .= get_the_title();
        }else if(is_category() ){
            $output .= single_cat_title();
        }else if( is_tag() ){
            echo single_tag_title();
        }else if( is_404() ){
            $output .= 'Página não encontrada';
        }else if( is_tax() ){
            $get_tax = get_query_var('taxonomy');
            $get_term_slug = get_query_var($get_tax);
            $get_taxonomy = get_term_by('slug', $get_term_slug, $get_tax);

            $output .= $get_taxonomy->name;
        }else if( is_archive() ){
            $output .= post_type_archive_title();
        }else if( is_search() ){
            $output .= 'Resultados encotrados para: '.sanitize_text_field( get_search_query() );
        }

        return $output;
    }


    function get_bootstrap_menu($menu_name = 'header', $args = array()){
        $args_options = array(
            'echo'              => false,
            'theme_location'    => $menu_name,
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'bs-example-navbar-collapse-1',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
        );

        $args_options = array_merge($args_options, $args);

        $logo = get_bloginfo();

        if(!empty(get_custom_logo())){
            $logo = get_custom_logo();
        }


        $output = '<nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" 
            data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" 
            aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">'.$logo.'</a>';
               $output .= wp_nav_menu( $args_options );
        $output .= '        
            </div>
        </nav>';

        return $output;
    }
