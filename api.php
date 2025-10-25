<?php
header ('Content_Type: application/jsonn');

$response =[
    'satus' => 'ok',
    'message' => 'Hola, el web service está vivo'
];

echo json_encode($response);

?>