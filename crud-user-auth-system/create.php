<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeni Kullanıcı Oluştur</title>
</head>
<body>
    <h2>Yeni Kullanıcı Oluştur</h2>
    <form id="userForm">  
        <label>Kullanıcı Adı: </label><br>
        <input type="text" id="username" name="username"><br>
        <label>Email: </label><br>
        <input type="email" id="email" name="email"><br>
        <label>Şifre: </label><br>
        <input type="password" id="password" name="password"><br><br>
        <button type="button" onclick="submitForm()">Kaydet</button>
    </form>
    
    <script>
        function submitForm() {
            var formdata = {
                username: document.getElementById("username").value,
                email: document.getElementById("email").value,
                password: document.getElementById("password").value
            };

            fetch('createapi.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify(formdata)
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if(data.status === 'success') {
                    alert('Kullanıcı başarıyla eklendi');
                    document.getElementById("userForm").reset();
                } else {
                    alert('Hata: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Hata:', error);
            });
        }
    </script>

<body>



    
</body>
</html>