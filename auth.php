<?php
    header('Content-Type: application/json');
    //genera un token de 32 digitos
    function generateToken($length = 32) {
        return bin2hex(random_bytes($length / 2));
    }

    $token = generateToken(); //genera el token aleatorio
    $fecha = time();

    file_put_contents('token.json', json_encode(['token' => $token, 'fecha'=>$fecha]));//genera un .json y guarda ahi el token generado

    $response = [
        "status" => "ok",
        "token" => $token,
        "fecha" =>$fecha,
        "message" => "Token generado correctamente."
    ];

    echo json_encode($response);
?>