<?php

include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = json_decode(file_get_contents("php://input"),true);

    $username = $data['username'];
    $email = $data['email'];
    $password = $data['password'];

    if (empty($username) || empty($email) || empty($password)) {

        echo "pls fill the all  fields";
        exit;
    } elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        echo "pls enter valid e mail";
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
       
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $hashedPassword);
    
      
        if ($stmt->execute()) {
            $response = array('status' => 'success', 'message' => 'kullanıcı kaydı yapıldı');
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'message' => 'kayıt hatası');
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    } catch (PDOException $e) {
        $response = array('status' => 'error', 'message' => $e->getMessage());
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    
    
    
    
} else {
    http_response_code(405);
    echo json_encode(array("message"=> "method not allowed"));
}


?>