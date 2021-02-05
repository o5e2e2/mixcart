<?php

try {
    $postData = file_get_contents('php://input');

    // валидируем и нормализуем
    $message = json_encode(json_decode($postData, false), JSON_UNESCAPED_UNICODE);

    $db = new Pdo('mysql:host=mysql;dbname=mixcart;charset=utf8','mixcart');
    $db->prepare('INSERT INTO queque SET message = ?')->execute([$message]);

    http_response_code(200);
    header('Content-type:application/json;charset=utf-8');
    echo $message;
}
catch(Error $e) {
    http_response_code(500);
    header('Content-type:text/plain;charset=utf-8');
    echo $e->getMessage();
}
catch(Exception $e) {
    http_response_code(500);
    header('Content-type:text/plain;charset=utf-8');
    echo $e->getMessage();
}
