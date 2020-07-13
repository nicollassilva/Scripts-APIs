<?php

function JWTGenerate() {

    $uniqKey = 'JWT Auth para proteger APIs RestFUL'; // Altere para alguma key segura
    $contentJWT = base64_encode(json_encode(['typ' => 'JWT', 'alg' => 'HS256']));
    $data = base64_encode(json_encode([
        'name' => 'Nícollas da Silva', // Nome do "consumidor" da API
        'email' => 'nicollas@email.com' // Email do mesmo
    ]));
    $sign = base64_encode(hash_hmac('sha256', $contentJWT . "." . $data, $uniqKey, true));
    echo $contentJWT . '.' . $data . '.' . $sign;

}

function JWTValidate($key) {

    $key = explode(".", $key);
    $validate = base64_encode(hash_hmac('sha256', $key[0] . '.' . $key[1], 'JWT Auth para proteger APIs RestFUL', true));
    return $key[2] == $validate ? true : false;

}

?>