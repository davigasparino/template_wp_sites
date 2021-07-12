<?php
//Plugins
require 'plugins/wp-bootstrap-navwalker.php';

//carrega os css do tema
require 'load-css.php';
//carrega os JS do tema
require 'load-js.php';

require 'functions-filters.php';

require 'functions-actions.php';

require 'functions-general.php';

//funções principais do tema
require 'form-render.php';

//register custom post type
require 'register-custom-post-type.php';

//register custom taxonomy
require 'register-custom-taxonomy.php';

//register custom meta box
require 'register-custom-metabox.php';

//theme options
require 'theme-options.php';
