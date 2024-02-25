<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'dbconfig.php';

    //session id alma
    session_start();

    // JSON verisini alın
    $data = json_decode(file_get_contents("php://input"), true);

    // Yorumu alın
    $comment = $data['comment'];
    
    // title alma
    $title = $data['title'];
    
    $user_id = $_SESSION['user_id'];

    // Yorum boş olmamalıdır
    if (!empty($comment) && !empty($title)) {
        try {
            // Yorum eklemek için SQL sorgusu
            $sql = "INSERT INTO posts (content,title,user_id) VALUES (?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $comment, $title, $user_id);

            // Sorguyu çalıştırın
            if ($stmt->execute()) {
                $response = array('status' => 'success', 'message' => 'Yorum eklendi');
            } else {
                $response = array('status' => 'error', 'message' => 'Yorum eklenirken bir hata oluştu');
            }
        } catch (PDOException $e) {
            $response = array('status' => 'error', 'message' => $e->getMessage());
        }
    } else {
        $response = array('status' => 'error', 'message' => 'Yorum ve title boş olamaz');
    }

    // Sonucu JSON formatında gönderin
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Yanlış yöntem hatası
    http_response_code(405);
    echo json_encode(array("message" => "Yanlış yöntem kullanıldı"));
}
?>
