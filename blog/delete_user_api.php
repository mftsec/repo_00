<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    
    header("Location: login.php");
    
}

?>


<?php
include 'dbconfig.php';

if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $data = json_decode(file_get_contents("php://input"), true);

    if(isset($data['user_id'])) {
        
        $user_id = $data['user_id'];

        try {
            // Kullanıcının başlık (title) ile ilişkili olup olmadığını kontrol et
            $check_sql = "SELECT * FROM posts WHERE user_id = $user_id LIMIT 1";
            $check_result = $conn->query($check_sql);

            if ($check_result->num_rows > 0) {
                // Kullanıcıya tanımlı bir başlık (title) olduğu için silme işlemi yapılamaz
                $response = array('status' => 'error', 'message' => 'Bu kullanıcıya tanımlı bir başlık bulunduğu için silme işlemi yapılamaz.');
                header('Content-Type: application/json');
                echo json_encode($response);
            } else {
                // Kullanıcıya tanımlı bir başlık (title) yoksa silme işlemi yap
                $sql = "DELETE FROM users WHERE user_id = $user_id";
                $stmt = $conn->prepare($sql);
                
                $stmt->execute();

                $response = array('status' => 'success', 'message' => 'Kullanıcı başarıyla silindi');
                header('Content-Type: application/json');
                echo json_encode($response);
            }
        } catch(PDOException $e) {
            http_response_code(500);
            $response = array('status' => 'error', 'message' => 'Hata: ' . $e->getMessage());
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    } else {
        http_response_code(400);
        $response = array('status' => 'error', 'message' => 'Kullanıcı ID belirtilmedi');
        header('Content-Type: application/json');
        echo json_encode($response);
    }
} else {
    http_response_code(405);
    $response = array('status' => 'error', 'message' => 'Method not allowed');
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>