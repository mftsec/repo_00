<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    try {
        $sql = "DELETE FROM users WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo "Kullanıcı başarıyla silindi.";
        } else {
            echo "Kullanıcı silinirken bir hata oluştu.";
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
    <title>Kullanıcı Sil</title>
    <script>
        function confirmDelete() {
            return confirm("Bu kullanıcıyı silmek istediğinize emin misiniz?");
        }
    </script>
</head>
<body>
    <h2>Kullanıcıyı Sil</h2>
    <form method="post" action="delete.php" onsubmit="return confirmDelete()">
        ID: <input type="text" name="id"><br>
        <input type="submit" name="submit" value="Sil">
    </form>
</body>
</html>

<?php
$conn = null;
?>
