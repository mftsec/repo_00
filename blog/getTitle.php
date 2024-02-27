<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    
    header("Location: login.php");
    
}

?>

<?php
include 'dbconfig.php'; // Veritabanı bağlantısı

// Veritabanından seçenekleri al
$sql = "SELECT post_id, title FROM posts";
$result = $conn->query($sql);

$options = ''; // Seçenekleri depolamak için bir değişken

if ($result->num_rows > 0) {
    // Veritabanından alınan seçenekleri döngüyle işleyin
    while($row = $result->fetch_assoc()) {
        // Her bir seçenek için option etiketi oluştur
        $options .= '<option value="' . $row['post_id'] . '">' . $row['title'] . '</option>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title Silme</title>
</head>
<body>
    <h2>Title Silme</h2>

    <!-- Seçenekleri ekrana yazdırın -->
    <form id="deleteForm">
        <label for="post_id">Başlık Seçin:</label>
        <select name="post_id" id="post_id">
            <?php echo $options; ?>
        </select>
        <button type="button" onclick="confirmTitleDelete()">Sil</button> <!-- Silme butonu -->
    </form>

    <script>
        function confirmTitleDelete() {
            var post_id = document.getElementById("post_id").value;
            if (confirm("Bu başlığa ait postları silmek istediğinize emin misiniz?")) {
                deleteTitle(post_id);
            }
        }

        function deleteTitle(post_id) {
            var formdata = {
                post_id: post_id
            };

            fetch('delete_title_api.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify(formdata)
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.status === 'success') {
                    alert('Başlık silindi');
                    // İşlem tamamlandığında formu sıfırla
                    document.getElementById("deleteForm").reset();
                } else {
                    alert('Hata: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Hata: ', error);
            });
        }
    </script>
</body>
</html>
