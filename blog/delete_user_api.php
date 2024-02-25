<?php
include 'dbconfig.php';

if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gelen verinin JSON formatında olduğunu kontrol etmek önemlidir.
    $data = json_decode(file_get_contents("php://input"), true);

    if(isset($data['id'])) {
        
        $id = $data['id'];

        try {
            $sql = "DELETE FROM users WHERE user_id = $id";
            $stmt = $conn->prepare($sql);
            
            $stmt->execute();

            // Başlık bilgisi set edilmeli ve çıktıya JSON dönüşümü yapılmalıdır.
            $response = array('status' => 'success', 'message' => 'Kullanıcı başarıyla silindi');
            header('Content-Type: application/json');
            echo json_encode($response);
        } catch(PDOException $e) {
            // Hata oluştuğunda uygun bir JSON yanıtı döndürülmelidir.
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
