<?php
/**
 * La interface de usuarios contiene dos tipos de controles de entrada.
 * TextInput, acepta todos los tipos
 * NumericInput que solo acepta dígitos.
 * Implemente la clase TextInput que contenga:
 * - Un método add($text) que agrega el texto dado al actual valor
 * - Un método getValue() que devuelva el actual valor
 *
 * Implemente la clase NumericInput que contenga:
 * - Hereda de TextInput
 * - El método add ignorará todo parámetro $text que no sea numérico
 */

class TextInput
{
    //almacene el valor actual del valor dado en la entrada
    private $value = '';

    //agregue el texto al valor dado
    public function add($text){
        $this->value .= $text;
    }

    public function getValue(){
        return $this->value;
    }
}

class NumericInput extends TextInput
{
    public function add($text){
        // solo se agregan los caracteres numéricos
        $numericText = preg_replace('/\D/', '', $text);
        parent::add($numericText); // llamar al método add de la clase base (TextInput)
    }
}

$textInput = new TextInput();
$textInput->add('Hello');
$textInput->add('123');
echo "TextInput Value: " . $textInput->getValue() . "\n"; // Salida esperada: Hello123

$numericInput = new NumericInput();
$numericInput->add('Hello');
$numericInput->add('abc456');
echo "NumericInput Value: " . $numericInput->getValue() . "\n"; // Salida esperada: 456

// El siguiente código de prueba (comentado) es correcto y funcionaría como se espera
//$input = new NumericInput();
//$input->add('1');
//$input->add('a');
//$input->add('532');
//echo $input->getValue(); // Salida esperada: 1532
