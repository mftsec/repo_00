<?php
// Veritabanı bağlantısı
include 'dbconfig.php';

// Yorumları çekme sorgusu
$sql = "SELECT posts.title, posts.content, users.username 
FROM posts 
INNER JOIN users ON posts.user_id = users.user_id 
ORDER BY posts.post_created_at DESC";
$result = $conn->query($sql);

// Sorgudan gelen verileri dizi olarak saklayalım
$comments = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }
}

// JSON formatına dönüştürüp yazdıralım
header('Content-Type: application/json');
echo json_encode($comments);
?>
