<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeni Kullanıcı Oluştur</title>
</head>
<body>
    <h2>Yeni Kullanıcı Oluştur</h2>
    <form method="post" action="create.php">
        Kullanıcı Adı: <input type="text" name="username"><br>
        E-posta: <input type="text" name="email"><br>
        Şifre: <input type="password" name="password"><br>
        <input type="submit" name="submit" value="Kaydet">
    </form>


<?php

include 'conn.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Geçersiz e-posta adresi formatı.";
        exit;
    }


    try {
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);

        if ($stmt->execute()) {
            echo "Yeni kullanıcı başarıyla oluşturuldu.";
        } else {
            echo "Kullanıcı oluşturulurken bir hata oluştu.";
        }
    } catch(PDOException $e) {
        echo "Hata: " . $e->getMessage();
    }
}

$conn = null;

?>