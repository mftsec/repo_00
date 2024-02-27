<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    
    header("Location: login.php");
    
}

?>



<?php

include 'dbconfig.php';

if ($conn->connect_error) {
    die("bağlantı hatası" . $conn->connect_error) ;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"),true);
    

    if(isset($data['post_id'])) {
        
        $post_id = $data['post_id'];


        try {
            $sql = "DELETE FROM posts WHERE post_id = $post_id";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $response = array('status' => 'success', 'message' => 'title başarıyla silindi');
            echo json_encode($response);
        } catch(PDOException $e) {
            
            http_response_code(500);
            $response = array('status' => 'success', 'message' => 'title silme başarısız');
            header('Content-Type: application/json');
            echo json_encode($response);
            
        }   


    }else {
        http_response_code(400);
        $response = array('status' => 'hata', 'message' => 'title girilmesi lazım');
        header('Content-Type: application/json');
        echo json_encode($response);
    }

} else {
    http_response_code(405);
    $response = array('status' => 'error', 'message' => 'method not allowed');
    header('Content-Type: application/json');
    echo json_encode($response);
}











?>