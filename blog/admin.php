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
        ID: <input type="number" name="user_id" id="user_id">
        <button type="button" onclick="confirmDelete()">Sil</button>
    </form>

    <script>
        function confirmDelete() {
            if (confirm("Bu kullanıcıyı silmek istediğinize emin misiniz?")) {
                deleteForm();
            }
        }

        function deleteForm() {
            var id = document.getElementById("user_id").value; // Kullanıcı ID'sini doğru bir şekilde almak için gerekli olan HTML elementini belirtin

            var formdata = {
                id: id
            };

            fetch('delete_user_api.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formdata)
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.status === 'success') {
                    alert('Kullanıcı başarıyla silindi');
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
