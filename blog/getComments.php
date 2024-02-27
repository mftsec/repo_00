<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    
    header("Location: login.php");
    
}

?>

<?php
include 'dbconfig.php';


// Sayfa numarasını alalım
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 10; // Her sayfada gösterilecek öğe sayısı

// Veritabanından yorumları çekme sorgusu
$offset = ($page - 1) * $items_per_page;
$sql = "SELECT posts.title, posts.content, users.username 
        FROM posts 
        INNER JOIN users ON posts.user_id = users.user_id 
        ORDER BY posts.post_created_at DESC
        LIMIT $items_per_page OFFSET $offset";
$result = $conn->query($sql);

// Sorgudan gelen verileri dizi olarak saklayalım
$comments = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }
}

// JSON formatında yanıt verelim
header('Content-Type: application/json');
echo json_encode($comments);

?>
