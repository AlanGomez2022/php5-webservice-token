<?php
header ('Content-Type: application/json');

$savedTokenData = json_decode(file_get_contents('token.json'), true);
$savedToken = $savedTokenData['token'];

$receivedToken = $_POST['token'];

// 3️⃣ Verificar si coincide
if ($receivedToken !== $savedToken) {
    $respuesta=[
        "status" => "error",
        "message" => "Token inválido. Acceso denegado."
    ];
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    exit;
}

    $name = isset($_POST['name']) ? $_POST['name']:"Padawan";
    $role = isset($_POST['role']) ? $_POST['role']:"sith";
    $response =[
        "status" => "ok",
        "message" => "Hola  $name el $role, el web service está vivo!"
    ];
    echo json_encode($response, JSON_UNESCAPED_UNICODE);


?>