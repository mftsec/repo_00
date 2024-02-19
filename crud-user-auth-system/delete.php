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
        ID: <input type="number" name = "id" id="id">
        <button type="button" onclick="deleteForm()">delete</button>
    </form>

    <script>
         function confirmDelete() {
             if (confirm("Bu kullanıcıyı silmek istediğinize emin misiniz?")) {
                 deleteForm();
             }
         }

        function deleteForm() {
            var formdata = {
                id: document.getElementById("id").value
            };

            fetch('deleteapi.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(formdata)
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.status === 'success') {
                    alert('Kullanıcı silindi');
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



