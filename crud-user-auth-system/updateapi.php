<?php
session_start();
include 'conn.php';


if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası: " . $conn->connect_error);
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $data = json_decode(file_get_contents("php://input"),true);
    $id = $_SESSION['user_id'];
    $username = $data['username'];
    $email = $data['email'];
    $password = $data['password'];


    try {


        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "UPDATE users SET username='$username', email='$email', password='$hashed_password' WHERE id='$id'";
        $stmt = $conn->prepare($sql);
     
      
        if ($stmt->execute()) {
         
            $response = array('status' => 'success', 'message' => 'Kullanıcı başarıyla güncellendi.');
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            
            $response = array('status' => 'error', 'message' => 'Kullanıcı güncellenirken bir hata oluştu.');
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    } catch(PDOException $e) {
        
        $response = array('status' => 'error', 'message' => 'Hata: ' . $e->getMessage());
        header('Content-Type: application/json');
        echo json_encode($response);
    }
} else {
    
    http_response_code(405);
    echo json_encode(array("message" => "Method Not Allowed"));
}


?>


