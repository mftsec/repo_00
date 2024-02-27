<?php
session_start();

// Admin oturumu kontrolü
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    // Admin oturumu yoksa veya admin değilse, giriş sayfasına yönlendir
    header('Location: login.php');
    exit;
}

// Admin sayfa içeriği buraya gelir
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sayfası</title>
</head>
<body>
    <h1>Admin Sayfası</h1>
    <p>Hoş geldiniz, admin!</p>
    <!-- Admin içeriği buraya eklenebilir -->
</body>
</html>