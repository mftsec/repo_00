<?php
include 'conn.php';

if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userController = new UserController($conn);


    $data = json_decode(file_get_contents("php://input"),true);
    $response = $userController->updateUser($data);

    header('Content-Type: application/json');



} else {
    http_response_code(405);
    echo json_encode(array("message" => "method not allowed"));
}



?>