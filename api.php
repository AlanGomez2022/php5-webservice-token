<?php
header ('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $name = isset($_POST['name']) ? $_POST['name']:"Padawan";
    $role = isset($_POST['role']) ? $_POST['role']:"sith";
    $response =[
        "status" => "ok",
        "message" => "Hola  $name el $role, el web service está vivo!"
    ];
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
}

?>