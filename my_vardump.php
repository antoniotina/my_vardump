<?php

$integer = 1;
$float = 1.5;
$string = "string";
$array = ['1','2','3'];
$multidimension_array = [[['1'],[2], 4.5], ['4'], ['5'], '6'];

// var_dump($integer, $float, $string, $array, $multidimension_array);

// $variable = 1;
// $variable = 1.5;
// $variable = "string";
// $variable = ['1','2','3'];
// $variable = [[['1'],[2], 4.5], ['4'], ['5'], '6'];

my_vardump($integer, $float, $string, $array, $multidimension_array);

function my_vardump()
{
    foreach (func_get_args() as $variable) {
        echo is_int($variable) ? "int(" . $variable . ")\n" : null;
        echo is_float($variable) ? "float(" . $variable . ")\n" : null; 
        echo is_string($variable) ? "string(" . strlen($variable) . ") \"$variable\"\n" : null; 
        is_array($variable) ? go_in_array($variable) : null;
    }
}

function go_in_array($array, $dimension = 1)
{
    $number_of_spaces = str_repeat(" ", $dimension*2);
    echo substr($number_of_spaces,2) . "array(" . count($array)  . ") {\n";
    foreach($array as $key => $value)
    {
        if(is_array($value))
        {
            echo $number_of_spaces . "[$key]=>\n";
            go_in_array($value, $dimension + 1);
        }
        echo is_int($value) ? $number_of_spaces . "[$key]=>\n" . $number_of_spaces . "int(" . $value . ")\n" : null;
        echo is_float($value) ? $number_of_spaces . "[$key]=>\n" . $number_of_spaces . "float(" . $value . ")\n" : null; 
        echo is_string($value) ? $number_of_spaces . "[$key]=>\n" . $number_of_spaces . "string(" . strlen($value) . ") \"$value\"\n" : null; 
    }
    echo substr($number_of_spaces,2) . "}\n";
}