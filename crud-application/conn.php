<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "web_dev_crud";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "bağlanti başarili";
} catch(PDOException $e) {
    echo "Bağlanti hatasi: " . $e->getMessage();
}
?>
