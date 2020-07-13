<?php

function JWTGenerate() {

    $uniqKey = 'JWT Auth para proteger APIs RestFUL'; // Altere para alguma key segura
    $contentJWT = base64_encode(json_encode(['typ' => 'JWT', 'alg' => 'HS256']));
    $data = base64_encode(json_encode([
        'name' => 'Nícollas da Silva', // Nome do "consumidor" da API
        'email' => 'nicollas@email.com' // Email do mesmo
    ]));
    $sign = base64_encode(hash_hmac('sha256', $contentJWT . "_" . $data, $uniqKey, true));
    echo $contentJWT . '_' . $data . '_' . $sign;

}

function JWTValidate($key) {

    $key = explode("_", $key);
    $validate = base64_encode(hash_hmac('sha256', $key[0] . '_' . $key[1], 'JWT Auth para proteger APIs RestFUL', true));
    return $key[2] == $validate ? true : false;

}

//JWTGenerate();
$value = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9_eyJuYW1lIjoiTlx1MDBlZGNvbGxhcyBkYSBTaWx2YSIsImVtYWlsIjoibmljb2xsYXNAZW1haWwuY29tIn0=_SlhKOiMTfNXqhB1Lhy4r3v7TxPebOYveJbm3GDoFnI8=';

var_dump(JWTValidate($value));

?>