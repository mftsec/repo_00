
<?php
include 'conn.php';

if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $data = json_decode(file_get_contents("php://input"),true);
    $id = $data['id'];


    
    try {
        $sql = "DELETE FROM users WHERE id='$id'";
        $stmt = $conn->prepare($sql);
        
            if ($stmt->execute()) {
                $response = array('status' => 'succes', 'message' => 'başarıyla silindi');
                header('Content-Type: application/json');
                echo json_encode($response);
            } else {
                $response = array('status' => 'error', 'message' => 'hata');
                header('Content_Type: application/json');
                echo json_encode($response);
            } 

    } catch( PDOException $e) {
        $response = array('status' => 'error', 'message' => 'Hata: ' . $e->getMessage());
        header('Content-Type: application/json');
        echo json_encode($response);
    }


} else {
    http_response_code(405);
    echo json_decode(array("message" => "method not allowed"));
}

?>