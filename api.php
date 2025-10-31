<?php
header ('Content-Type: application/json');

$savedTokenData = json_decode(file_get_contents('token.json'), true);
$savedToken = $savedTokenData['token'];
$savedTime = $savedTokenData['fecha'];

$receivedToken = $_POST['token'];
$timeNow = time();
$demora = 300;


if (($receivedToken !== $savedToken) ) { // se fija si el toke ingresado no es correcto
    $respuesta=[
        "status" => "error",
        "message" => "Token inválido. Acceso denegado."
    ];
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    exit;    
}
if ($timeNow > $savedTime + $demora) { // se fija si el tiempo del token se paso de 5 mintutos
    $respuesta=[
    "status" => "error",
    "message" => "Token EXPIRADO. Acceso denegado."
];
echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
exit;
}

    $name = isset($_POST['name']) ? $_POST['name']:"Padawan";
    $role = isset($_POST['role']) ? $_POST['role']:"sith";
    $response =[
        "status" => "ok",
        "message" => "Hola  $name el $role, $receivedToken y $savedToken el web service está vivo! TIEMPO AHORA: $timeNow TIEMPO TOKEN: $savedTime"
    ];
    echo json_encode($response, JSON_UNESCAPED_UNICODE);


?>