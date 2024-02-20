<?php

include 'conn.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {



    $data = json_decode(file_get_contents("php://input"),true);

    $username = $data['username'];
    $email = $data['email'];
    $password = $data['password'];

    
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    
    if ($conn->query($sql) === TRUE) {
        
        $response = array('status' => 'success', 'message' => 'Kullanıcı başarıyla eklendi');
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
       
        $response = array('status' => 'error', 'message' => 'Hata: ' . $sql . '<br>' . $conn->error);
        header('Content-Type: application/json');
        echo json_encode($response);
    }
} else {
    
    $response = array('status' => 'error', 'message' => 'Geçersiz istek');
    header('Content-Type: application/json');
    echo json_encode($response);
}


$conn->close();

?>
