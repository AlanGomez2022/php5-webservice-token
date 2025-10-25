<?php
header ('Content_Type: application/jsonn');

$name = isset($_GET['name']) ? $_GET['name']:"Padawan";


$response =[
    'satus' => 'ok',
    'message' => 'Hola $name, el web service está vivo, MI QUERIDO LORD SITH!'
];

echo json_encode($response);

?>