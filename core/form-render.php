<?php 
/**
 * Form render
 */
class GamaThemeFormRender
{
	
	function __construct()
	{
	}

	public function renderInputType( $type_input = 'text', $args = array() ){
		if( isset( $args['atributos']['name'] ) && $args['atributos']['name'] != '' ){
			$output = '';
			if( $type_input == 'checkbox' ){
				$output = $this->checkbox( $type_input, $args );
			}elseif( $type_input == 'radio' ){
				$output = $this->radio( $type_input, $args );
			}elseif( $type_input == 'textarea' ){
				$output = $this->textarea( $type_input, $args );
			}elseif( $type_input == 'select' ){
				$output = $this->select( $type_input, $args );
			}else{
				$output = $this->input( $type_input, $args );
			}
		}else{
			$output = 'Desculpe você deve informar o atributo name para renderizar o form';
		}
		return $output;
	}

	private function input( $type = '', $args = array() ){
		$exist_id = ( isset( $args['atributos']['id'] ) && $args['atributos']['id'] != '' ? $args['atributos']['id'] : '' );

		$output = '';
		if( isset( $args['label'] ) && $args['label'] != '' ){
			$output .= $this->label( $args['label'], $exist_id );
		}

		$output .= '<input type="' . $type . '" ';
			if( isset( $args['atributos'] ) && ! empty( $args['atributos'] ) ){
				foreach ( $args['atributos'] as $key => $value ) {
					$output .= ' ' . $key . '="' . $value . '" ';
				}
			}
		$output .= ' />';

		return $output;
	}



	private function checkbox( $type = '', $args = array() ){
		$exist_id = ( isset( $args['atributos']['id'] ) && $args['atributos']['id'] != '' ? $args['atributos']['id'] : '' );

        $selected = ( isset( $args['selected'] ) && $args['selected'] != '' ? $args['selected'] : '' );

        if( isset( $args['atributos']['value'] ) && is_array( $args['atributos']['value'] ) ){
			foreach ( $args['atributos']['value'] as $key => $value ) {
			    $checked = isset($args['selected']) && is_array($args['selected']) && in_array($key, $args['selected']) ? ' checked' : '';

				$output .= '<label>';
					$output .= '<input type="checkbox" name="' . $args['atributos']['name'] . '[]" value="' . $key . '" '. $checked .' />';
					$output .= ' <strong>' . $value . '</strong>'; 
				$output .= '</label>';
			}
		}else{
			$output = '';
            if( isset( $args['label'] ) && $args['label'] != '' ){
                $output .= $this->label( $args['label'], $exist_id );
            }

            $output .= '<input type="' . $type . '" ';
				if( isset( $args['atributos'] ) && ! empty( $args['atributos'] ) ){
					foreach ( $args['atributos'] as $key => $value ) {
						$output .= ' ' . $key . '="' . $value . '" ';
					}
				}
			if($selected){
			    $output .= ' checked';
            }
			$output .= ' />';

		}

		return $output;
	}


	private function radio( $type = '', $args = array() ){
		$exist_id = ( isset( $args['atributos']['id'] ) && $args['atributos']['id'] != '' ? $args['atributos']['id'] : '' );

        $selected = ( isset( $args['selected'] ) && $args['selected'] != '' ? $args['selected'] : '' );

        if( isset( $args['atributos']['value'] ) && is_array( $args['atributos']['value'] ) ){
			foreach ( $args['atributos']['value'] as $key => $value ) {
                $checked = isset($args['selected']) && $selected == $key ? ' checked' : '';

                $output .= '<label>';
					$output .= '<input type="radio" name="' . $args['atributos']['name'] . '" value="' . $key . '" '.$checked.' />';
					$output .= ' <strong>' . $value . '</strong>'; 
				$output .= '</label>';
			}
		}else{
			$output = '';
			$output .= '<input type="' . $type . '" ';
				if( isset( $args['atributos'] ) && ! empty( $args['atributos'] ) ){
					foreach ( $args['atributos'] as $key => $value ) {
						$output .= ' ' . $key . '="' . $value . '" ';
					}
				}
            if($selected){
                $output .= ' checked';
            }
			$output .= ' />';
			if( isset( $args['label'] ) && $args['label'] != '' ){
				$output .= $this->label( $args['label'], $exist_id );
			}

		}

		return $output;
	}


	private function select( $type = '', $args = array() ){
		$exist_id = ( isset( $args['atributos']['id'] ) && $args['atributos']['id'] != '' ? $args['atributos']['id'] : '' );

		//opções para selecionar no select
		$value_select = ( isset( $args['atributos']['value'] ) && !empty( $args['atributos']['value'] ) ? $args['atributos']['value'] : '' );

		if( $value_select != '' ){
			unset($args['atributos']['value']);
		}else{
			$value_select = ( isset( $args['atributos']['options'] ) && !empty( $args['atributos']['options'] ) ? $args['atributos']['options'] : '' );
			if( $value_select != '' ){
				unset($args['atributos']['options']);
			}else{
				$value_select = ( isset( $args['options'] ) && !empty( $args['options'] ) ? $args['options'] : '' );
				if( $value_select != '' ){
					unset($args['options']);
				}
			}
		}

		//quando houver um valor pré selecionado
		$selected = ( isset( $args['selected'] ) && $args['selected'] != '' ? $args['selected'] : '' );

		$output = '';
		
		if( isset( $args['label'] ) && $args['label'] != '' ){
			$output .= $this->label( $args['label'], $exist_id );
		}

		$output .= '<select ';
			if( isset( $args['atributos'] ) && ! empty( $args['atributos'] ) ){
				foreach ( $args['atributos'] as $key => $value ) {
					$output .= ' ' . $key . '="' . $value . '" ';
				}
			}
		$output .= '>';
			if( is_array( $value_select ) ){
				foreach ( $value_select as $key => $value ) {
					$current_option_selected = $selected == $key ? ' selected="" ' : '';
					$output .= '<option ' . $current_option_selected . ' value="' . $key . '">' . $value . '</option>';
				}
			}
		$output .= '</select>';

		return $output;
	}

	private function textarea( $type = '', $args = array() ){
		$exist_id = ( isset( $args['atributos']['id'] ) && $args['atributos']['id'] != '' ? $args['atributos']['id'] : '' );
		$value_textarea = ( isset( $args['atributos']['value'] ) && $args['atributos']['value'] != '' ? $args['atributos']['value'] : '' );

		if( $value_textarea != '' ){
			unset($args['atributos']['value']);
		}

		$output = '';
		if( isset( $args['label'] ) && $args['label'] != '' ){
			$output .= $this->label( $args['label'], $exist_id );
		}

		$output .= '<textarea ';
			if( isset( $args['atributos'] ) && ! empty( $args['atributos'] ) ){
				foreach ( $args['atributos'] as $key => $value ) {
					$output .= ' ' . $key . '="' . $value . '" ';
				}
			}
		$output .= '>';
			$output .= $value_textarea;
		$output .= '</textarea>';

		return $output;
	}

	private function label( $label, $id = '' ){
		$output = '<label ' . ( $id ? 'for="' . $id . '"' : '' ) . ' >';
			$output .= $label;
		$output .= '</label>';

		return $output;
	}
}

/*
//ISSO É UM EXEMPLO DE USO

$teste = new GamaThemeFormRender();

$args = array(
	'label' => 'aqui um label de teste',
	'atributos' => array(
		'id' => 'teste',
		'value' => 'teste',
		'placeholder' => 'digite um texto aqui',
		'name' => 'teste',
	)
);
echo $teste->renderInputType( 'text', $args );

echo '<br />';
echo '<br />';
echo '<br />';

$args = array(
	'label' => 'textarea',
	'atributos' => array(
		'id' => 'teste',
		'value' => 'teste teste teste teste',
		'placeholder' => 'digite um texto aqui',
		'name' => 'textarea'
	)
);
echo $teste->renderInputType( 'textarea', $args );

echo '<br />';
echo '<br />';
echo '<br />';

$args = array(
	'label' => 'checkbox',
	'atributos' => array(
		'value' => array(
			'banana' => 'Comprar essa banana',
			'abacate' => 'Comprar esse abacate',
			'arroz' => 'Comprar esse arroz',
		),
		'name' => 'checkboxname'
	)
);
echo $teste->renderInputType( 'checkbox', $args );

echo '<br />';
echo '<br />';
echo '<br />';

$args = array(
	'label' => 'radio',
	'atributos' => array(
		'value' => array(
			'banana' => 'Comprar essa banana',
			'abacate' => 'Comprar esse abacate',
			'arroz' => 'Comprar esse arroz',
		),
		'name' => 'radioname'
	)
);
echo $teste->renderInputType( 'radio', $args );

echo '<br />';
echo '<br />';
echo '<br />';

$args = array(
	'label' => 'select',
	'options' => array(
		'banana' => 'Comprar essa banana',
		'abacate' => 'Comprar esse abacate',
		'arroz' => 'Comprar esse arroz',
	),
	'atributos' => array(
		'id' => 'testeselect',
		'name' => 'selectfield'
	)
);
echo $teste->renderInputType( 'select', $args );
exit();
*/