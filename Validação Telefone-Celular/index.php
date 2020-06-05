<?php

function validateTel($t, $a = false) {

    $n = !!$a ? 11 : 10;
    
    $t= trim(str_replace('/', '', str_replace(' ', '', str_replace('-', '', str_replace(')', '', str_replace('(', '', $t))))));

    $validate = "/^[0-9]{".$n."}$/";

    return !!preg_match($validate, $t) ? true : false;

}

function validateCel($c) {

    $c= trim(str_replace('/', '', str_replace(' ', '', str_replace('-', '', str_replace(')', '', str_replace('(', '', $c))))));

    $validate = '/\(?\d{2}\)?\s?\d{5}\-?\d{4}/';

    return !!preg_match($validate, $c) ? true : false;

}

var_dump(validateTel('3533334444')); //true
var_dump(validateTel('03533334444', true)); //true

var_dump(validateCel('3599994444')); //false
var_dump(validateCel('35999994444')); //true