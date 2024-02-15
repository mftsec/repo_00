<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $sql = "UPDATE users SET username=:username, email=:email, password=:password WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            echo "Kullanıcı başarıyla güncellendi.";
        } else {
            echo "Kullanıcı güncellenirken bir hata oluştu.";
        }
    } catch(PDOException $e) {
        echo "Hata: " . $e->getMessage();
    }
}


?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Düzenle</title>
</head>
<body>
    <h2>Kullanıcıyı Düzenle</h2>
    <form method="post" action="update.php">
        ID: <input type="text" name="id"><br>
        Kullanıcı Adı: <input type="text" name="username"><br>
        E-posta: <input type="text" name="email"><br>
        Şifre: <input type="password" name="password"><br>
        <input type="submit" name="submit" value="Güncelle">
    </form>
</body>
</html>

<?php
$conn = null;
?>
