<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "todo";

try {
    $conn = new PDO("mysql:host=$servername;dbname=company",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connection başarili!!!!!!!" . "<br>";
    
} catch(PDOException $e) {
    echo "connection failed: " . $e->getMessage() . "<br>";
}

$sql = "SELECT * FROM todo.todos";
$result = $conn->query($sql);

if ($result->rowCount() > 0) {
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "userID: " . $row["user_id"] . "ID: " . $row["id"] . "- yapilacak: " . $row["content"] . "<br>";
    }
} else {
    echo "yapilacak bişey yok";
}

?>