<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    
    header("Location: login.php");
    
}

?>



<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Sil</title>
   
</head>
<body>
    <h2>Kullanıcıyı Sil</h2>
    
    <form id="deleteForm">
        <label for="user_id">Kullanıcı Seçin:</label>
        <select name="user_id" id="user_id">
            <?php
            
            include 'dbconfig.php'; 

            $sql = "SELECT user_id, username FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['user_id'] . '">' . $row['username'] . '</option>';
                }
            }
            ?>
        </select>
        <button type="button" onclick="confirmUserDelete()">Sil</button>
    </form>

    <script>
        function confirmUserDelete() {
            if (confirm("Bu kullanıcıyı silmek istediğinize emin misiniz?")) {
                deleteUser();
            }
        }

        function deleteUser() {
            var user_id = document.getElementById("user_id").value;

            var formdata = {
                user_id: user_id
            };

            fetch('delete_user_api.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify(formdata)
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.status === 'success') {
                    alert('Kullanıcı başarıyla silindi');
                    
                    
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
